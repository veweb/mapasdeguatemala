
$("#vermapa").prop( "disabled", true );
$("#posicion_mapa").prop( "disabled", true )

    
   $("#mapa").click(function(e) {
      console.log("click");
      var offset = $(this).offset();
      var relativeX = (e.pageX - offset.left);
      var relativeY = (e.pageY - offset.top);
      
      $("#posicion_mapa").val(relativeX+','+relativeY);
  
    });

    // $('.myModal').css('width', '1025px');


   $("#nombre").change(function(e){
        var mapa = e.target.value;
        $.get("/mapas/"+e.target.value+"",function(response,lugares){
          
            $("#mapa").attr("src","/images/upload/mapas/"+response[0].imagen);
            //$("#zoom_container").html("<img id=mapa  src=/images/upload/mapas/"+response[0].imagen+" />");
           // $(".modal-body").css("background-image","url(/upload/mapas/antigua-2016-map-01.jpg");
             $('#mapa').smoothZoom({
                width: '800',
                height: 500,
                initial_ZOOM: 100, 
                button_MARGIN:80,   
                pan_BUTTONS_SHOW: "YES",
                pan_LIMIT_BOUNDARY: "NO",
                button_SIZE: 24,
                button_ALIGN: "top left", 
                zoom_MIN: 100, 
                zoom_MAX: 700,
                border_TRANSPARENCY: 0,
                container: 'zoom_container',
                
                /******************************************
                Enable Responsive settings below if needed.
                Max width and height values are optional.
                ******************************************/
                responsive: false,
                responsive_maintain_ratio: true,
                max_WIDTH: '',
                max_HEIGHT: ''  

                  });        
            $("#vermapa").prop( "disabled", false )
            $("#posicion_mapa").prop( "disabled", false )
            
        
         
        });
        
   });


