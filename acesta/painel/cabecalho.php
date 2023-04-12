<?php
require_once("../conexao.php");
?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo $nome_sistema ?></title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!----======== FAVICON ======== -->
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">


  <!-- jQery -->
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

  <!-- Ajax para funcionar Mascaras JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script type="text/javascript" src="./js/ajax.js"></script>

  <!-- Máscaras -->
  <script type="text/javascript" src="./js/mascaras.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="./css/style.css">


  <link rel="stylesheet" type="text/css" href="./DataTables/datatables.min.css" />

  <script type="text/javascript" src="./DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="./js/api.js"></script>
  <script type="text/javascript" src="./js/conjuge.js"></script>

</head>

<body>

  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white container">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">

          <a class="navbar-brand me-2" href="index.php">
            <img src="../img/logo.png" height="35" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
          </a>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page">Socioeconômicos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page">Cônjuge</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page">Dependentes</a>
            </li>
          </ul>

          <a class="nav-link" href="logout.php">
            <button type="button" class="btn btn-primary me-3">Sair</button>
          </a>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
    <!-- Jumbotron -->
  </header>



  <div class="container" style="margin-top: 20px">
    <script type="text/javascript" src="./js/api.js"></script>
    <script type="text/javascript" src="./js/conjuge.js"></script>