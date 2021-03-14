<?php
session_start();
    include __DIR__ . "./database/db.config.php";

    if(isset($_POST['codigo'])){
      $cod = addslashes($_POST['codigo']);
      $query = "SELECT * FROM aluno WHERE codigo_aluno = :cod";
      $stmt = $pdo->prepare($query);
      $stmt->bindValue(':cod', $cod);
      $stmt->execute();

      $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

      if($aluno == false){
        $_SESSION['error_msg'] = "O código do aluno não foi encontrado";
        echo "<script>window.location.href = 'http://localhost/SGN'</script>";
      }
    }

    $query = "SELECT * FROM boletim_preserv WHERE id_aluno = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $aluno['id']);
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    function nota($data){
        if($data >= 10){
            echo '<span class="text-blue">'.$data.'</span>';
        }else{
            echo '<span class="text-danger">'.$data.'</span>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/estilo2.css">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="./assets/css/apple/app.min.css" rel="stylesheet" />
    <link href="./assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="./assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="./assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="./assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

</head>

<body>

    <div class="container" style="height: 700px;">
        <!-- begin tabs -->
        <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
            <li class="nav-item"><a href="#latest-post" data-toggle="tab" class="nav-link active"><i
                class="fa fa-user fa-lg m-r-5"></i> <span class="d-none d-md-inline">Boletim</span></a>
            </li>
            <li class="nav-item"><a href="#purchase" data-toggle="tab" class="nav-link"><i
                class="fa fa-users fa-lg m-r-5"></i> <span class="d-none d-md-inline">Pauta</span></a></li>
        </ul>
        <div class="tab-content" data-sortable-id="index-3">
            <div class="tab-pane fade active show" id="latest-post">

                <div class="" data-scrollbar="true">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-12 ficha-content-col-12 ficha-heade">
                                <div class="text-center ficha-top-content">
                                    <img width="70" src="./assets/img/logo/smartBits-logo.jpg">
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
                                        <img src="./view/admin/foto/aluno/<?= $aluno['foto'] ?>" width="150" height="180" alt="">
                                        <?php    
                                    }else{?>
                                        <img src="./assets/img/logo/default.jpg" width="150" height="180" alt="">
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
            </div>
            <div class="tab-pane fade" id="purchase">
                <div class="" data-scrollbar="true">
                    <h1>Purchase</h1>
                </div>
            </div>
        </div>
        <!-- end tabs -->

    </div>


    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/js/theme/apple.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="./assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="./assets/plugins/flot/jquery.flot.js"></script>
    <script src="./assets/plugins/flot/jquery.flot.time.js"></script>
    <script src="./assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="./assets/plugins/flot/jquery.flot.pie.js"></script>
    <script src="./assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="./assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="./assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
    <script src="./assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
</body>

</html>