<?php

$query = "SELECT * FROM turma";
$stmt = $pdo->prepare($query);
$stmt->execute();
$turma = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query2 = "SELECT * FROM disciplina";
$stmt2 = $pdo->prepare($query2);
$stmt2->execute();
$disciplina = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$query3 = "SELECT * FROM turno";
$stmt3 = $pdo->prepare($query3);
$stmt3->execute();
$turno = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$query4 = "SELECT * FROM classes";
$stmt4 = $pdo->prepare($query4);
$stmt4->execute();
$classe = $stmt4->fetchAll(PDO::FETCH_ASSOC);

$query5 = "SELECT * FROM salas";
$stmt5 = $pdo->prepare($query5);
$stmt5->execute();
$sala = $stmt5->fetchAll(PDO::FETCH_ASSOC);