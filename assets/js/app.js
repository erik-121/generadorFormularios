define([
       "jquery", 
       "collections/snippets",
       "collections/my-form-snippets", 
       "views/tab",
       "views/my-form",
       "text!data/input.json", "text!data/radio.json", "text!data/select.json", "text!data/button.json",
       "text!templates/app/render.html",  
], function(
  $, 
  SnippetsCollection, 
  MyFormSnippetsCollection,
  TabView,
  MyFormView,
  inputJSON, radioJSON, selectJSON, buttonJSON,
  renderTab
){
  return {
    initialize: function(){ 
    	new TabView({
    		title: "Entrada",
    		collection: new SnippetsCollection(JSON.parse(inputJSON)),
    	});
    	
    	new TabView({
        	title: "Botón de opción / Casilla verificación",
        	collection: new SnippetsCollection(JSON.parse(radioJSON)),
      	});
      	
      	new TabView({
        	title: "Selección",
        	collection: new SnippetsCollection(JSON.parse(selectJSON)),
      	});
      	
      	new TabView({
        	title: "Botones",
        	collection: new SnippetsCollection(JSON.parse(buttonJSON)),
      	});
      	
      	new TabView({
	        title: "Renderizado", 
	        content: renderTab
	    });
    	
    		//Make the first tab active!
	    $("#components .tab-pane").first().addClass("active");
	    $("#formtabs li").first().addClass("active");
	    
	    var layout_number_of_columns = 1;
	     	     
	    myform_view = new MyFormView({
        	title: "Original", 
        	columns: layout_number_of_columns,
        	collection: new MyFormSnippetsCollection([
		          { "title" : "Form Name", 
		            "fields": {
		              "name" : {
		                "label"   : "Nombre formulario", 
		                "type"  : "input", 
		                "value" : "Nombre formulario"
		              }
		            }
		          }
		        ])
		});
		
		//Deal with the layout column selector
	    $('#form-layout li').on('click', function(){
	    
	    	var output_tpl = _.template("Columnas formulario: <%= number %> columna(s)");	    
		    $('#form-layout-text').val(output_tpl({number: $(this).attr("value")}));
		    layout_number_of_columns = $(this).attr("value");
		    myform_view.setLayoutNumberOfColumns(layout_number_of_columns);
		    myform_view.render()
		});
	    
	    
	    $("#saveForm").click(function(){
		    	var data = { 
		    			layout_number_of_columns: layout_number_of_columns,
		    		    data: myform_view.collection.data,
		    		}
		        blob = new Blob([JSON.stringify(data)], { type: 'text/plain' }),
		        anchor = document.createElement('a');
		    		formName = $.trim(data.data[0]['fields']['name']['value']).replace(/\s/g, "_");
		    	
	
		    anchor.download = "form_layout_" + formName + ".txt";
		    anchor.href = (window.webkitURL || window.URL).createObjectURL(blob);
				anchor.dataset.downloadurl = ['text/plain', anchor.download, anchor.href].join(':');
				
				console.log(anchor); 
				anchor.dispatchEvent(new MouseEvent(`click`, {bubbles: true, cancelable: true, view: window})); 
				
				var rendered = document.getElementById("render").value;
				document.getElementById("generado").value = rendered;
	    });
	    
	    
	    $("#loadForm").on('change', function(event) {
	    		if (typeof window.FileReader !== 'function')
	            throw ("The file API isn't supported on this browser.");
	    		let input = event.target;
	    		if (!input)
	    	        throw ("The browser does not properly implement the event object");
	    	    if (!input.files)
	    	        throw ("This browser does not support the `files` property of the file input.");
	    	    if (!input.files[0])
	    	        return undefined;
	    	    let file = input.files[0];
	    	    let fr = new FileReader();
	    	    fr.onload = function(evt){
	    	    		try {
	    	    		  let form_layout_json = JSON.parse(evt.target.result);
	    	    		  // myform_view.collection = new MyFormSnippetsCollection([]);
	    	    		  myform_view.setLayoutNumberOfColumns(form_layout_json.layout_number_of_columns);
	    	    		  myform_view.collection = new MyFormSnippetsCollection(form_layout_json.data);
	    	    		  myform_view.bindCollectionEvents();
	    	    		  myform_view.render();
	    	    		 
	    	    		  
	    	    		  output_tpl = _.template("Columnas formulario: <%= number %> columna(s)");	    
	    	    		  $('#form-layout-text').val(output_tpl({number: form_layout_json.layout_number_of_columns}));
	    	    		}
	    	    		catch(error) {
	    	    			alert("Parsing form layout file error:" + error)
	    	    		}
	    	    };
	    	    fr.readAsText(file);
	    });
	    
  	}
 }
});