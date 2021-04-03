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
      $_SESSION['id_aluno'] = $aluno['id'];
      $id = $_SESSION['id_aluno'];

      if($aluno == false){
        $_SESSION['error_msg'] = "O código do aluno não foi encontrado";
        echo "<script>window.location.href = 'http://localhost/SGN'</script>";
      }

      $_SESSION['aluno'] = $cod;
      $_SESSION['aluno_data'] = $aluno;
      $_SESSION['classe'] = $aluno['classe'];
      $_SESSION['foto'] = $aluno['foto'];
    }

    if(!isset($_SESSION['aluno'])){
        echo "<script>window.location.href = 'http://localhost/SGN'</script>";
        exit;
    }

    $query = "SELECT * FROM boletim_preserv WHERE id_aluno = :id AND trimestre = 'I-trimestre'";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $_SESSION['id_aluno']);
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'I-trimestre' AND id_aluno = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $_SESSION['id_aluno']);
    $stmt->execute();

    $tri1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'II-trimestre' AND id_aluno = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $_SESSION['id_aluno']);
    $stmt->execute();
    $tri2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $resCount2 = count($tri2);

    $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'III-trimestre' AND id_aluno = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $_SESSION['id_aluno']);
    $stmt->execute();

    $tri3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $resCount = count($tri3);

    $stmt = $pdo->prepare("SELECT * FROM tipo_disciplina WHERE classe = :classe
    AND curso = 'informatica'");
    $stmt->bindValue(':classe', $_SESSION['classe']);
    $stmt->execute();
    $resData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $countDisciplina = count($resData); 

    if($resCount2 >= $countDisciplina) $displayTrimestres2 = '';
    else $displayTrimestres2 = 'd-none';

    if($resCount >= $countDisciplina) $displayTrimestres3 = '';
    else $displayTrimestres3= 'd-none';

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
        <nav class="nav mb-3">
            <li class="nav-item">
                <a class="nav-link active text-white bg-red border-circle" href="logout.php">Sair</a>
            </li>
        </nav>

        <!-- begin tabs -->
        <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
            <li class="nav-item"><a href="#latest-post" data-toggle="tab" class="nav-link active bg-black text-white"><i
                        class="fa fa-user fa-lg m-r-5"></i> <span class="d-none d-md-inline">Boletim</span></a>
            </li>
            <li class="nav-item <?= $displayTrimestres3?>"><a href="#purchase" data-toggle="tab" class="nav-link"><i
                        class="fa fa-users fa-lg m-r-5"></i> <span class="d-none d-md-inline">Pauta</span></a></li>
        </ul>
        <div class="tab-content" data-sortable-id="index-3">
        
            <div class="tab-pane fade active show" id="latest-post">

                    <!-- <form action="info_aluno.php" method="POST">
                        <div class="form-group">
                            <select name="trimestre" id="" class="form-control">
                                <option value="I-trimestre">I-Trimestre</option>
                                <option value="II-trimestre">II-Trimestre</option>
                                <option value="III-trimestre">III-Trimestre</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" name="tr" type="submit">Filtrar</button>
                    </form> -->
                <div class="row text-center mr-3 mb-5">
                    <div class="col-lg-12">
                        <div class="w-100">
                            <form method="post" class="float-right form-inline" style="margin-right:-20px">

                                <!-- <div class="form group mr-1">
                                    <input type="number" name="data" class="form-control" placeholder="ano">
                                </div> -->
                                <div class="form group mr-1">
                                    <select class="form-control" name="trimestre">
                                        <option value="I-Trimestre">I-Trimestre</option>
                                        <option class="<?= $displayTrimestres2 ?>" value="II-Trimestre">II-Trimestre</option>
                                        <option class="<?= $displayTrimestres3 ?>" value="III-Trimestre">III-Trimestre</option>
                                    </select>
                                </div>
                                <!-- <div class="form group mr-1">
                                                    <input type="date" name="dataInicio" class="form-control">
                                                </div> -->
                                <div class="form group mr-1">
                                    <button name="filter-trimestre" class="btn btn-primary btn-destaque" type="submit">
                                        Filtrar <i class="fa fa-filter"></i>
                                    </button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

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
                            if($_SESSION['foto'] != null){ ?>
                        <img src="./view/admin/foto/aluno/<?= $_SESSION['foto'] ?>" width="150" height="180"
                            alt="">
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
                            <span class="ml-4"><?= $_SESSION['aluno_data']['nome_aluno'] ?></span>
                        </h6>
                        <h6 class="ficha-text-container row">
                            <!-- <span class="">Identificação Nº:</span> -->
                            <span class="ml-4"><?= $_SESSION['aluno_data']['classe'] ?></span>
                        </h6>
                        <h6 class="ficha-text-container row">
                            <!-- <span class="">Género:</span> -->
                            <span class="ml-4"><?= $_SESSION['aluno_data']['turma'] ?></span>
                        </h6>
                        <h6 class="ficha-text-container row">
                            <!-- <span class="">Data Nascimento:</span> -->
                            <span class="ml-4"><?= $_SESSION['aluno_data']['turno'] ?></span>
                        </h6>
                        <h6 class="ficha-text-container row">
                            <!-- <span class="">Nº Telefone:</span> -->
                            <span class="ml-4"><?= $_SESSION['aluno_data']['curso'] ?></span>
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
                            <!-- <?php
                                foreach($res as $row){ ?>
                                <tr>
                                    <th scope="row"><?= $row['disciplina'] ?></th>
                                    <td><?php nota($row['nota1']) ?></td>
                                    <td><?php nota($row['nota2']) ?></td>
                                    <td><?php nota($row['nota3']) ?></td>
                                    <td><?php nota($row['media']) ?></td>
                                    <td><?php echo $_SESSION['id_aluno']; ?></td>
                                </tr>
                            <?php 
                                }
                            ?> -->

                            <?php
                        
                                if(isset($_POST['filter-trimestre'])){

                                    

                                    $trimestre = addslashes($_POST['trimestre']);
                                    // $date = addslashes($_POST['data']) ? addslashes($_POST['data']) : date('Y');

                                    $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = :trimestre AND id_aluno = :id"; //AND YEAR(data) = :data
                                    $stmt = $pdo->prepare($query);
                                    $stmt->bindValue(':id', $_SESSION['id_aluno']);
                                    $stmt->bindValue(':trimestre', $trimestre);
                                    // $stmt->bindValue(':data', $date);
                                    $stmt->execute();
                                    $filtro = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if($stmt->rowCount()){
                                        foreach($filtro as $row){ ?>
                                            <tr>
                                                <th scope="row"><?= $row['disciplina'] ?></th>
                                                <td><?php nota($row['nota1']) ?></td>
                                                <td><?php nota($row['nota2']) ?></td>
                                                <td><?php nota($row['nota3']) ?></td>
                                                <td><?php nota($row['media']) ?></td>
                                            </tr>
                                        <?php 
                                        }
                                    }
                                }else{
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
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            
            

            <div class="tab-pane fade" id="purchase">
                <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
                    <li class="nav-item"><a href="#itrimestre" data-toggle="tab" class="nav-link active"><i
                        class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">I-Trimestre</span></a>
                    </li>
                    <li class="nav-item"><a href="#iitrimestre" data-toggle="tab" class="nav-link"><i
                        class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">II-Trimestre</span></a>
                    </li>
                    <li class="nav-item"><a href="#iiitrimestre" data-toggle="tab" class="nav-link"><i
                        class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">III-Trimestre</span></a>
                    </li>
                    <li class="nav-item"><a href="#res" data-toggle="tab" class="nav-link"><i
                        class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">Resultado Final</span></a></li>
                </ul>
                

                <div class="tab-content" data-sortable-id="index-3">

                
                    <div class="tab-pane fade active show" id="itrimestre">
                        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                            <h3 class="text-center">I-Trimestre</h3>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Disciplina</th>
                                    <!-- <th>Trimestre</th> -->
                                    <th>Nota 1</th>
                                    <th>Nota 2</th>
                                    <th>Nota 3</th>
                                    <th>Media</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    foreach ($tri1 as $row) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $row['nome_aluno']?></td>
                                            <td><?= $row['disciplina']?></td>
                                            <!-- <td><?= $row['trimestre']?></td> -->
                                            <td><?= nota($row['nota1'])?></td>
                                            <td><?= nota($row['nota2'])?></td>
                                            <td><?= nota($row['nota3'])?></td>
                                            <td><?= nota($row['media'])?></td>

                                        </tr>
                                    <?php
                                        
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="iitrimestre">
                        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                            <h3 class="text-center">II-Trimestre</h3>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Disciplina</th>
                                    <!-- <th>Trimestre</th> -->
                                    <th>Nota 1</th>
                                    <th>Nota 2</th>
                                    <th>Nota 3</th>
                                    <th>Media</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    foreach ($tri2 as $row) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $row['nome_aluno']?></td>
                                            <td><?= $row['disciplina']?></td>
                                            <!-- <td><?= $row['trimestre']?></td> -->
                                            <td><?= nota($row['nota1'])?></td>
                                            <td><?= nota($row['nota2'])?></td>
                                            <td><?= nota($row['nota3'])?></td>
                                            <td><?= nota($row['media'])?></td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="iiitrimestre">
                        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                            <h3 class="text-center">III-Trimestre</h3>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Disciplina</th>
                                    <!-- <th>Trimestre</th> -->
                                    <th>Nota 1</th>
                                    <th>Nota 2</th>
                                    <th>Nota 3</th>
                                    <th>Media</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    foreach ($tri3 as $row) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $row['nome_aluno']?></td>
                                            <td><?= $row['disciplina']?></td>
                                            <!-- <td><?= $row['trimestre']?></td> -->
                                            <td><?= nota($row['nota1'])?></td>
                                            <td><?= nota($row['nota2'])?></td>
                                            <td><?= nota($row['nota3'])?></td>
                                            <td><?= nota($row['media'])?></td>

                                        </tr>
                                    <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="res">
                        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                            <h3 class="text-center">Resultado final</h3>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Disciplina</th>
                                    <th>Resultado Final</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    foreach($resData as $row){
                                        $disc = $row['nome'];
                                        $query = "SELECT AVG(media) as media, disciplina, aluno.nome_aluno FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE id_aluno = :id AND disciplina = '$disc'";
                                        $stmt = $pdo->prepare($query);
                                        $stmt->bindValue(':id', $_SESSION['id_aluno']);
                                        $stmt->execute();
                            
                                        $media = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                                        foreach($media as $md){
                                            $val = $md['media'];
                                            $val_format = number_format($val, '2', '.', ',');
                                            echo "<tr>";
                                            echo "<td>". $md['nome_aluno'] ."</td>";
                                            echo "<td>". $md['disciplina'] ."</td>";
                                            echo "<td>". $val_format ."</td>";
                                            echo "</tr>";
                                            if($val < 10){
                                                if(count($md) >= 9){
                                                    echo "<div class='alert alert-danger'>Reprovado</div>";
                                                }else{
                                                    echo "<div class='alert alert-success'>Aprovado</div>";
                                                }
                                            }
                                        };
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
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