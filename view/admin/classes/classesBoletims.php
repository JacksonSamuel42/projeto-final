<?php

class Boletim{
    private $inserirBoletim,$buscar,$atualizar,$apagar,$calculo;
    
    public function buscarDados(){

        include('../../database/db.config.php');
        $query = "SELECT * FROM aluno";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_POST['filter-aluno'])){
            $sala = addslashes($_POST['sala']);
            $curso = addslashes($_POST['curso']);
            $turma = addslashes($_POST['turma']);
            $classe = addslashes($_POST['classe']);
            $date = addslashes($_POST['data']);
            $query = "SELECT * FROM aluno WHERE (classe = '$classe' OR turma = '$turma'
             OR curso = '$curso' OR sala = '$sala' OR YEAR(created_at) = '$date') OR
            (classe = '$classe' AND turma = '$turma' AND curso = '$curso' AND sala = '$sala')";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $filtro = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount()){
                foreach ($filtro as $row) {?>
                    <tr class="odd gradeX">
                        <td><?= $row['id']?></td>
                        <td><?= $row['nome_aluno']?></td>
                        <td><?= $row['sala']?></td>
                        <td>
                            <button type="button" data-toggle="modal"
                             data-target="#boletim-modal" class="imprimir btn btn-primary" >
                             <i class="fa fa-eye"></i></button>
                            <a href="boletim-1?id=<?= $row['id']?>" class="btn btn-success" >
                            <i class="fa fa-hand-pointer"></i></a>
                        </td>
                    </tr>
                <?php
                }
            }else{
                echo "<div class='alert alert-warning'>Nenhum aluno encontrado</div>";
            }
        }else{
            foreach($data as $row){?>
                <tr class="odd gradeX">
                    <td><?= $row['id']?></td>
                    <td><?= $row['nome_aluno']?></td>
                    <td><?= $row['sala']?></td>
                    <td>
                        <button type="button" data-toggle="modal"
                         data-target="#boletim-modal" class="imprimir btn btn-primary" 
                         ><i class="fa fa-eye"></i></button>
                        <a href="boletim-1?id=<?= $row['id']?>" 
                        class="btn btn-secondary" ><i class="fa fa-hand-pointer"></i></a>
                    </td>
                </tr>
            <?php
                }
        }

    }

    public function calculoPautasAnual(){

        include('../../database/db.config.php');
        $id = filter_input(INPUT_GET, 'aluno', FILTER_SANITIZE_NUMBER_INT);
        $classe = filter_input(INPUT_GET, 'classe', FILTER_SANITIZE_STRING);
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
                
        $query = "SELECT * FROM `boletim_preserv` 
        INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id)
        WHERE trimestre = 'I-trimestre' AND id_aluno = $id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $tri1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $query = "SELECT * FROM `boletim_preserv`
        INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) 
        WHERE trimestre = 'II-trimestre' AND id_aluno = $id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $tri2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $query = "SELECT * FROM `boletim_preserv` 
        INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id)
        WHERE trimestre = 'III-trimestre' AND id_aluno = $id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $tri3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $pdo->prepare("SELECT * FROM tipo_disciplina WHERE classe = '$classe'AND curso = 'informatica'");
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $row){
            $disc = $row['nome'];
            $query = "SELECT AVG(media) as media, disciplina, aluno.nome_aluno
            FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id)
            WHERE id_aluno = 1 AND disciplina = '$disc'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $media = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($media as $row) {
                echo'<tr class="odd gradeX">
                        <td> '.$row['nome_aluno'].'</td>
                        <td> '.$row['disciplina'].'</td>
                    
                        <td> '.nota($row['nota1']).'</td>
                        <td> '.nota($row['nota2']).'</td>
                        <td> '.nota($row['nota3']).'</td>
                        <td> '.nota($row['media']).'</td>
                    </tr>';
            }

        }
    }

}