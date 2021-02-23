<?php

include('../../database/db.config.php');


if(isset($_POST['delete'])){
    
    $id = filter_input(INPUT_GET ,'bl', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM boletim WHERE id_boletim = $id ";
    $stmt = $pdo->prepare($query);
    if($stmt->execute()){
        echo "<div class='alert alert-success'>Nota eliminada com sucesso</div>";
    }else{
        echo "<div class='alert alert-danger'>Erro ao eliminar</div>";
    }
}

