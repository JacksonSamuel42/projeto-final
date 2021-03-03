<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/css/font-awesome.min.css">


  <!-- Estilo customizado -->
  <link rel="stylesheet" type="text/css" href="./assets/css/estilo.css">

</head>

<body>

  <section id="home">
    <!-- Início seção home -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex">
          <!-- Textos da seção -->
          <div class="align-self-center">
            <h2 class="display-4 slight"> Instituto Médio Politécnico SmartBits </h2>
            <p>
              Melhor escolha para o seu filho!
              Venha conhecer nosso instituto SmartBits e vem fazer parte dessa familia incrível
              .
            </p>

            <div>
              <?php
                session_start();
                
                if(isset($_SESSION['error_msg'])){
                  echo "<div class='alert alert-danger'>".$_SESSION['error_msg']."</div>";
                  session_destroy();
                }
              ?>
            </div>

            <form class="mt-4 mb-4" action="info_aluno.php" method="POST">
              <div class="input-group input-group-lg">
                <input type="text" name="codigo" placeholder="Seu código de acesso" class="form-control">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary ">Acessar</button>
                </div>
              </div>
            </form>

            <hr>
            <p>se não é aluno clique em <a href="login.php">Entrar</a></p>

          </div>
        </div>
        <!--/fim textos da seção -->
        <div class="col-md-6 d-none d-md-block">
          <img src="./assets/img/undraw_Online_learning_re_qw08.svg" width="400">
        </div>
      </div>
    </div>

  </section>




  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>