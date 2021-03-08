<?php

$query = 'SELECT COUNT(*) AS numrows FROM `aluno`'; 
$stmt = $pdo->prepare($query);
$stmt->execute();
$countAlunos = $stmt->fetch(PDO::FETCH_ASSOC);


$query = 'SELECT COUNT(*) AS numrows FROM `professores`'; 
$stmt = $pdo->prepare($query);
$stmt->execute();
$countProfessores = $stmt->fetch(PDO::FETCH_ASSOC);

$query = 'SELECT COUNT(*) AS numrows FROM `salas`'; 
$stmt = $pdo->prepare($query);
$stmt->execute();
$countSalas = $stmt->fetch(PDO::FETCH_ASSOC);

$query = 'SELECT COUNT(*) AS numrows FROM `users`'; 
$stmt = $pdo->prepare($query);
$stmt->execute();
$countUsers = $stmt->fetch(PDO::FETCH_ASSOC);