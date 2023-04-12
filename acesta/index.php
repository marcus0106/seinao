<?php
require_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $nome_sistema ?></title>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

  <!----======== FAVICON ======== -->
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="CSS/style.css" />

  <!----======== SCRIPT ======== -->
  <script src="./js/validation.js"></script>
</head>

<body>

  <!-- Section: Design Block -->
  <section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
      }

      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>

    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
            <div class="card-body p-5 shadow-5 text-center">
              <img src="img/logo-cesta.png" class="mb-5" width="45%">
              <h2 class="fw-bold mb-4">ATUALIZAÇÃO CADASTRAL</h2>

              <br>
              <br>

              <form action="autenticar.php" method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row g-3 align-items-center">
                  <div class="form-outline col-auto">
                    <input type="cpf" class="form-control" name="cpf" id="cpf" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );" required />
                    <label class="form-label" for="formTextExample2">INSIRA SEU CPF AQUI</label>
                  </div>

                  <div class="col-auto">
                    <span id="cpfResponse" class="form-text">Não coloque pontos e traço.</span>
                  </div>

                </div>

                <br>
                <br>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Entrar
                </button>

                <hr>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>conheça nossas redes sociais</p>
                  <a href="https://www.facebook.com/govroraima" type="button" class="btn btn-link btn-floating mx-2">
                    <i class="fab fa-facebook-f"></i>
                  </a>

                  <a href="https://www.instagram.com/govroraima/" type="button" class="btn btn-link btn-floating mx-2">
                    <i class="fab fa-instagram"></i>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="img/cesta1.jpg" class="w-100 rounded-4 shadow-4" alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
    <div id="rodape" class="flex-column d-fixed flex-md-row text-center justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Secretaria do Trabalho e Bem-Estar Social - <strong>UGAM/NTI</strong>
      </div>
      <!-- Copyright -->
    </div>


  </section>
  <!-- Section: Design Block -->

  <script src="./js/validation.js"></script>

</body>

</html>