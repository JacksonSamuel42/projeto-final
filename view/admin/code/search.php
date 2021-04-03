<?php
    include('../../../database/db.config.php');

	if ($_GET['s']) {
		$item_buscado = $_GET['s'];

		$sql = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON( boletim_preserv.id_aluno = aluno.id ) WHERE trimestre = 'I-trimestre' AND nome_aluno LIKE :busc";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':busc', '%'.$item_buscado.'%', PDO::PARAM_STR);
		$sql->execute();

		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			$resultado[] = $row['nome_aluno'];
			// $resultado[] = $row['nota1'];
			// $resultado[] = $row['nota2'];
			// $resultado[] = $row['nota3'];
			// $resultado[] = $row['disciplina'];
			// $resultado[] = $row['trimestre'];
			// $resultado[] = $row['media'];
		}

		echo json_encode($resultado);
	}