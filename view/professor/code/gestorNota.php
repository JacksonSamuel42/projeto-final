<?php

include('../../../database/db.config.php');

$res = $_POST["data"];

if(isset($res)){
    // echo'<div class="alert alert-danger">funcionou</div>';
        
    $res = json_decode($res);
    
    foreach($res as $data){
        (object)$data;


        $disciplina = $data->disciplina;
        $nota1 = $data->nota1;
        $nota2 = $data->nota2;
        $nota3 = $data->nota3;
        $data_nota = $data->data;
        $trimestre = $data->trimestre;
        $id_aluno = $data->id;
        $media = $data->media;

        $stmt = $pdo->prepare("INSERT INTO boletim( nota1, nota2, nota3,disciplina, data, trimestre, media, id_aluno) 
        VALUES(:nota1,:nota2,:nota3,:disciplina,:data, :trimestre, :media, :id_aluno)");

        $stmt->bindParam(":nota1",$nota1);
        $stmt->bindParam(":nota2",$nota2);
        $stmt->bindParam(":nota3",$nota3);
        $stmt->bindParam(":disciplina",$disciplina);
        $stmt->bindParam(":trimestre",$trimestre);
        $stmt->bindParam(":media",$media);
        $stmt->bindParam(":id_aluno",$id_aluno);
        $stmt->bindParam(":data",$data_nota);  // $stmt->bindValue(':cand_id', $candidato_id);

     
        if($stmt->execute()){
            $stmt = $pdo->prepare("INSERT INTO boletim_preserv( nota1, nota2, nota3,disciplina, data, trimestre, media, id_aluno) 
            VALUES(:nota1,:nota2,:nota3,:disciplina,:data, :trimestre, :media, :id_aluno)");

            $stmt->bindParam(":nota1",$nota1);
            $stmt->bindParam(":nota2",$nota2);
            $stmt->bindParam(":nota3",$nota3);
            $stmt->bindParam(":disciplina",$disciplina);
            $stmt->bindParam(":trimestre",$trimestre);
            $stmt->bindParam(":media",$media);
            $stmt->bindParam(":id_aluno",$id_aluno);
            $stmt->bindParam(":data",$data_nota); 

            if($stmt->execute()){
                echo "<div class='text-center alert alert-success'>Nota adicionada com sucesso</div>";
            }else{
                echo "<div class='text-center alert alert-warning'>Erro ao adicionar nota</div>";
            }
        }

        header('refresh: 1');

    }
}
