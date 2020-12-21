<?php

class InsertConroller{

	public function insertController(){

		if (isset($_POST["nome_turno"])){

		$DadosController = array("turno"=>$_POST["nome_turno"]);

		$resposta = Inserir::insertModels($DadosController,"turno");

		    if ($resposta == "ok"){


		    	echo '<script>
                     swal({
						title: "¡OK!",
						text: "¡La imagen se subió correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "turno";
							}
						});
 

		    	</script>';
		    	# code...
		    }
		    else{
		    	 echo $resposta;

		    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                


		 }

		# code...
	}
	public function selecionarControllers(){

		$resposta = Inserir::selecionarModels("turno");

          	foreach ($resposta as $key => $value) {
				echo '<tr class="odd gradeX">
				<td width="1%">'.$value["nome_turno"].'</td>
				<td width="10%">'.$value["created_at"].'</td>
				
				
				<td>
					<!-- <a class="updatebtn btn btn-primary text-white" href="">Editar</a> -->
					<button type="button" class="updatebtn btn btn-primary" >Editar</button>
					<button type="button" class="deletebtn btn btn-danger" >Deletar</button>
					<!-- <a data-toggle="modal" data-target="#delete" class="text-white btn btn-danger" href="">Eliminar</a> -->
				</td>
			</tr>';
          	# code...
        }

	}
	

	
}
