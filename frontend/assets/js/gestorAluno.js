
var imagem ="";

$("#subirFoto").change(function(){

	imagem = this.files[0];

	imagemSize = imagem.size;

	if (Number(imagemSize) < 2000000 ){

		$("#mensagem").before('<div class="alert alert-warning  text-center alerta" >excedeu o peso permitido</div>');

    }
    else{
		$(".alerta").remove();
	}
	imagemType = imagem.type;

	if (imagemType == "image/jpeg" || imagemType =="png") {
		$(".alerta").remove();


	}
	else{

	$("#mensagem").before('<div class="alert alert-warning text-center alerta">Formato invalido png ou jpeg</div>')


	} 

	if (Number(imagemSize) < 2000000  && imagemType =="image/jpeg" || imagemType =="png") {


		Dados = new Formdata();
		Dados.append("imagem",imagem);


		$.ajax({
			url:"views/ajax/gestorAluno.php",
			method:"POST",
			data:Dados,
			cache:false,
			processData:false,
			contentType:false,
			beforeSend:function(){
		$("#mensagem").before('<img src="views/images/status.gif" id="status" class="text-center">');

				

                 
			},
			sucess:function(resposta){
	if (resposta ==0) {
		$("#mensagem").before('<div class="alert alert-warning  text-center alerta" >imagem ingerior a 1920px a 2880px</div>');

				}
				else{
					     $("#photo").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail " style="width: 50px;border: none;"></div>');

				}

			}
		})

	}





})