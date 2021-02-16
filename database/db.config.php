<?php 

    $dbname ='sgn';
    $host = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $pdo = new PDO('mysql:dbname='.$dbname.";host=".$host,$user,$password);
        $pdo->exec("SET CHARACTER SET utf8"); 
        // echo "connectado";
    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>