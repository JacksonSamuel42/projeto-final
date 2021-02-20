<?php

include('../../database/db.config.php');

$idA = filter_input(INPUT_GET ,'id', FILTER_SANITIZE_NUMBER_INT);
$aluno = filter_input(INPUT_GET ,'aluno', FILTER_SANITIZE_STRING);

if(isset($_POST['delete'])){

    $id = addslashes($_POST['id']);
    $query = "DELETE FROM boletim WHERE id_aluno = $id ";
    $stmt = $pdo->prepare($query);
    if($stmt->execute()){
        echo "<div class='alert alert-success'>Nota eliminada com sucesso</div>";
    }else{
        echo "<div class='alert alert-danger'>Erro ao eliminar</div>";
    }
}

