$("#pais").change(function(event){
	$.get("/mdepartamentos/"+event.target.value+"",function(response,departamento){
		$("#departamento").empty();
		$("#departamento").append("<option value=''>Seleccione departamento</option>");
		for(i=0;i<response.length;i++){
			$("#departamento").append("<option value='"+response[i].id+"'> "+response[i].nombre + "</option>");
		}
	});
});

$("#departamento").change(function(event){
	$.get("/mmunicipios/"+event.target.value+"",function(response,municipio){
		$("#municipio").empty();
		$("#municipio").append("<option value=''>Seleccione municipio</option>");
		for(i=0;i<response.length;i++){
			$("#municipio").append("<option value='"+response[i].id+"'> "+response[i].nombre + "</option>");
		}
	});
});

$("#departamento_id").change(function(event){
	$.get("/mmunicipios/"+event.target.value+"",function(response,municipio){
		$("#municipio").empty();
		$("#municipio").append("<option value=''>Seleccione municipio</option>");
		for(i=0;i<response.length;i++){
			$("#municipio").append("<option value='"+response[i].id+"'> "+response[i].nombre + "</option>");
		}
	});
});

$("#municipio").change(function(event){
	$.get("/lugares/"+event.target.value+"",function(response,lugar){
		$("#lugar").empty();
		$("#lugar").append("<option value=''>Seleccione lugar</option>");
		for(i=0;i<response.length;i++){
			$("#lugar").append("<option value='"+response[i].id+"'> "+response[i].nombre + "</option>");
		}
	});
	
});

$("#municipio").change(function(event){
	$.get("/lugares/"+event.target.value+"",function(response,mapa_id){
		$("#nombre").empty();
		$("#nombre").append("<option value=''>Seleccione Lugar</option>");
		for(i=0;i<response.length;i++){
			$("#nombre").append("<option value='"+response[i].id+"'> "+response[i].nombre + "</option>");
		}
	});
	
});
$(".icono").css('cursor', 'hand');
$(".icono").on("tap",function(){
	var id = $(this).attr("id");

	var mostrar = $("#text-"+id).css('display');
	if(mostrar == 'none'){
		$(".text").css("display","none");
		$("#text-"+id).css("display","block");
		
	}
	else
	{
		$("#text-"+id).css("display","none");
	}
  
});
$(".icono").click(function(){
	var id = $(this).attr("id");

	var mostrar = $("#text-"+id).css('display');
	if(mostrar == 'none'){
		$(".text").css("display","none");
		$("#text-"+id).css("display","block");
		
	}
	else
	{
		$("#text-"+id).css("display","none");
	}
});

$("#lugar").change(function(event){
	
    $.get("/categorias/"+event.target.value+"",function(response,categoria){
		$("#categoria").empty();
		$("#categoria").append("<option value=''>Seleccione categoria</option>");
		for(i=0;i<response.length;i++){
			$("#categoria").append("<option value='"+response[i].id+"'> "+response[i].nombre + "</option>");
		}
	});	
	$.get("/mapas/"+event.target.value+"",function(response,mapas){

		 $('#zoom_container').html("<img id=yourImageID src=/images/upload/mapas/"+response[0].imagen + " width=1024px height=768px />");
   
		 $('#yourImageID').smoothZoom({
    			width: '100%',
	            height: 580,
	            initial_ZOOM: 110, 
	            button_MARGIN:80,   
	            pan_BUTTONS_SHOW: "YES",
	            pan_LIMIT_BOUNDARY: "NO",
	            button_SIZE: 24,
	            button_ALIGN: "top left", 
	            zoom_MIN: 40, 
	            zoom_MAX: 700,
	            border_TRANSPARENCY: 0,
	            container: 'zoom_container',
	            
	            /******************************************
	            Enable Responsive settings below if needed.
	            Max width and height values are optional.
	            ******************************************/
	            responsive: true,
	            responsive_maintain_ratio: true,
	            max_WIDTH: '',
	            max_HEIGHT: ''	

    	});  

    	  $.get( "/manuncios/"+event.target.value+"", function(data,lugar_id ) {
  				console.info("holA INGRESO ");
  				$(".landmarks").html("dasfsadfsdaf dfasdfsdfadsfdasfasdfdsafsadfas");
			});
  
        $('#yourImageID').smoothZoom({
    			width: '100%',
	            height: 580,
	            initial_ZOOM: 110, 
	            button_MARGIN:80,   
	            pan_BUTTONS_SHOW: "YES",
	            pan_LIMIT_BOUNDARY: "NO",
	            button_SIZE: 24,
	            button_ALIGN: "top left", 
	            zoom_MIN: 40, 
	            zoom_MAX: 700,
	            border_TRANSPARENCY: 0,
	            container: 'zoom_container',
	            
	            /******************************************
	            Enable Responsive settings below if needed.
	            Max width and height values are optional.
	            ******************************************/
	            responsive: true,
	            responsive_maintain_ratio: true,
	            max_WIDTH: '',
	            max_HEIGHT: ''	

    			  });        
	});


     

	

});