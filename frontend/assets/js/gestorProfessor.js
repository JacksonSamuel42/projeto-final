
var imagen ="";

$("#subirFoto").change(function(){

	imagen = this.files[0];

	imagemSize = imagen.size;

	if (Number(imagemSize) < 2000000 ){

		$("#mensagem").before('<div class="alert alert-warning  text-center alerta" >excedeu o peso permitido</div>');

    }
    else{
    	$(".alerta").remove();
    }
    imagemType = imagen.type;

    if (imagemType == "image/jpeg" || imagemType=="image/png") {

    	$(".alerta").remove();
    }
    else{

    $("#mensagem").before('<div class="alert alert-warning  text-center alerta" >tem que ser formato png ou jpeg</div>');

    }
    if (Number(imagemSize) < 2000000 && imagemType=="image/jpeg" || imagemType=="image/png" ){

    	var datos = new FormData();

        datos.append("imagen", imagen);

        $.ajax({
            url:"views/ajax/gestorProfessor.php",
            method: "POST",
            data: datos,
            cache: false,         
            contentType: false,
            processData: false,
            beforeSend: function(){
                


                    $("#mensagem").before('<img src="views/images/status.gif" id="status" class="text-center">');

                },
            success: function(respuesta){
                $("#status").remove();
                if (respuesta == 0) {
                    $("#mensagem").before('<div class="alert alert-warning  text-center alerta" >imagem ingerior a 1920px a 2880px</div>');

                }else{
                    //$(".alerta").remove();
         $("#photo").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail " style="width: 50px;border: none;"></div>');
                }
            
                
                 }

    	 });



    }


  
});

