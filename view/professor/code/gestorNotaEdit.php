<?php

include('../../../database/db.config.php');

$resEdit = $_POST["data"];

if(isset($resEdit)){
    
    $resE = json_decode($resEdit);
    
    foreach($resE as $data){
        (object)$data;

        $disciplina = $data->disciplina;
        $nota1 = $data->nota1;
        $nota2 = $data->nota2;
        $nota3 = $data->nota3;
        $data_nota = $data->data;
        $trimestre = $data->trimestre;
        $id_aluno = $data->id;
        $media = $data->media;
        $boletim_id = $data->id_boletim;

        $stmt = $pdo->prepare("UPDATE boletim set nota1 = :nota1, nota2 = :nota2, nota3 = :nota3, 
            media = :media, disciplina = :disciplina, data = :data,
            trimestre = :trimestre, id_aluno = :id_aluno WHERE id_boletim = $boletim_id");

        $stmt->bindParam(":nota1",$nota1);
        $stmt->bindParam(":nota2",$nota2);
        $stmt->bindParam(":nota3",$nota3);
        $stmt->bindParam(":disciplina",$disciplina);
        $stmt->bindParam(":trimestre",$trimestre);
        $stmt->bindParam(":media",$media);
        $stmt->bindParam(":id_aluno",$id_aluno);
        $stmt->bindParam(":data",$data_nota);

     
        if($stmt->execute()){
            echo '<div class="text-center alert alert-success">Nota editada com sucesso</div>';
        }else{
            echo '<div class="text-center alert alert-warning">Erro ao editar Nota</div>';
        }

    }
}