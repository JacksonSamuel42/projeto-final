
<div class="container p-5">
    <!-- <h1 class="page-header">PDF Licença</h1> -->
<?php

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM boletim WHERE id_aluno = :id AND trimestre = 'III-trimestre'";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 

    $query = "SELECT * FROM aluno WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
    
    function nota($data){
        if($data >= 10){
            echo '<span class="text-blue">'.$data.'</span>';
        }else{
            echo '<span class="text-danger">'.$data.'</span>';
        }
    }

?>
    <div class="modal fade" id="boletim-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Boletim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="boletim-card bg-white border p-5 print row justify-content-center align-items-center">
                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12 ficha-content-col-12 ficha-heade">
                                    <div class="text-center ficha-top-content">
                                        <img width="70" src="../../assets/img/logo/smartBits-logo.jpg">
                                        <p class="ficha-heade-top">
                                            <br>
                                            <b>Instituto Médio Politécnico SmartBits</b>
                                        </p>
                                        <p class="heade-top-data">
                                            Boletim escolar/<?= date('Y')?>
                                        </p>
                                        <p class="heade-top-data">
                                            I-Trimestre
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Dados do candidato -->

                            <div class="col-lg-12 bg-gray mt-5 d-flex align-items-center justify-content-center">
                                <p class="ficha-heade-top text-white">
                                    DADOS DO ALUNO
                                </p>
                            </div>

                            <div class="col-lg-12 ficha-content-col-12 d-flex border p-3">

                                <div class="col-lg-2">
                                    <?php
                                        if($aluno['foto'] != null){ ?>
                                            <img src="../admin/foto/aluno/<?= $aluno['foto'] ?>" width="150" height="180" alt="">
                                    <?php    
                                        }else{?>
                                            <img src="../../assets/img/logo/default.jpg" width="150" height="180" alt="">
                                    <?php    
                                        }
                                    ?>
                                </div>
                                <div class="ml-5 mt-3 col-lg-2 float-right">
                                    <h6 class="ficha-text-container text-bold  row">
                                        <span class="">Nome Completo:</span>
                                        <!-- <span class="ml-4">Adilson Maria Futa</span> -->
                                    </h6>
                                    <h6 class="ficha-text-container text-bold row">
                                        <span class="">Classe:</span>
                                        <!-- <span class="ml-4">0034947LGT43S</span> -->
                                    </h6>
                                    <h6 class="ficha-text-container text-bold row">
                                        <span class="">Turma:</span>
                                        <!-- <span class="ml-4">Masculino</span> -->
                                    </h6>
                                    <h6 class="ficha-text-container text-bold row">
                                        <span class="">Turno:</span>
                                        <!-- <span class="ml-4">12/04/1995</span> -->
                                    </h6>
                                    <h6 class="ficha-text-container text-bold row">
                                        <span class="">Curso:</span>
                                        <!-- <span class="ml-4">94323658733</span> -->
                                    </h6>

                                </div>

                                <div class="mt-3 col-lg-6 float-right">
                                    <h6 class="ficha-text-container row">
                                        <!-- <span class="">Nome Completo:</span> -->
                                        <span class="ml-4"><?= $aluno['nome_aluno'] ?></span>
                                    </h6>
                                    <h6 class="ficha-text-container row">
                                        <!-- <span class="">Identificação Nº:</span> -->
                                        <span class="ml-4"><?= $aluno['classe'] ?></span>
                                    </h6>
                                    <h6 class="ficha-text-container row">
                                        <!-- <span class="">Género:</span> -->
                                        <span class="ml-4"><?= $aluno['turma'] ?></span>
                                    </h6>
                                    <h6 class="ficha-text-container row">
                                        <!-- <span class="">Data Nascimento:</span> -->
                                        <span class="ml-4"><?= $aluno['turno'] ?></span>
                                    </h6>
                                    <h6 class="ficha-text-container row">
                                        <!-- <span class="">Nº Telefone:</span> -->
                                        <span class="ml-4"><?= $aluno['curso'] ?></span>
                                    </h6>
                                </div>

                            </div>

                            <!-- Fim dado candidato -->

                            <div class="col-lg-12 bg-gray mt-5 d-flex align-items-center justify-content-center">
                                <p class="ficha-heade-top text-white">
                                    INFORMAÇÕES DAS NOTAS
                                </p>
                            </div>

                            <div class="col-lg-12 ficha-content-col-12 d-flex border p-3">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Disciplina</th>
                                        <th scope="col">Nota 1</th>
                                        <th scope="col">Nota 2</th>
                                        <th scope="col">Nota 3</th>
                                        <th scope="col">Media</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($res as $row){ ?>
                                                <tr>
                                                    <th scope="row"><?= $row['disciplina'] ?></th>
                                                    <td><?php nota($row['nota1']) ?></td>
                                                    <td><?php nota($row['nota2']) ?></td>
                                                    <td><?php nota($row['nota3']) ?></td>
                                                    <td><?php nota($row['media']) ?></td>
                                                </tr>
                                        <?php 
                                           }
                                        ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                    <button class="btn btn-primary mt-5 ml-1 mb-5 w-100" onclick="PrintPanel();">Imprimir</button>
                </div>
            </div>
        </div>
    </div>



</div>
