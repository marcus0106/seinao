<?php 
@session_start();
require_once('../conexao.php');
if(@$_SESSION['id_beneficiario'] == ""){
	echo "<script>window.location='../index.php'</script>";
	exit();
}

$id = $_SESSION['id_beneficiario'];
//recuperar os dados do usuário logado
$query = $pdo->query("SELECT * FROM beneficiarios where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0){
	$nome_ben = $res[0]['nome'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10; ../index.php">
    <title><?= $nome_sistema?></title>

      <!----======== FAVICON ======== -->
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">

  <script type="text/javascript" src="./DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="./js/api.js"></script>


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./css/final.css">


</head>
<body>

<header>

    <!-- Carousel wrapper -->
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
      <!-- Inner -->
      <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
          <div class="mask" style="background-color: rgba(50, 115, 220, 0.8);;">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white text-center">
                <h2 class="mb-4">PARABÉNS</h2>
                <h1 class="mb-3"> <?= $nome_ben ?> </h1>
                <h5 class="mb-4">Atualização cadastral realizada com sucesso!  <i class="far fa-thumbs-up"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Inner -->
    </div>
    <!-- Carousel wrapper -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mt-5">
    <div class="container">

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>FIQUE POR DENTRO DAS AÇÕES DO GOVERNO DE RORAIMA</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="https://scontent.fpll6-1.fna.fbcdn.net/v/t39.30808-6/333504942_6597701830240132_712574069717491088_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeF5K6l98x0yG4BuYIzb4tsNgNcveXsKxPyA1y95ewrE_DMP3liWuXDNb9bOfgeuZL-iX7Ns5MpTOrPbCOGkrOCA&_nc_ohc=y7mpzeGPqpAAX_yBLtu&_nc_ht=scontent.fpll6-1.fna&oh=00_AfCw_ZhdDTLbdYAydX7GKC4MyXgDJNmQkgrUpKwfDWV34w&oe=6414814D" class="img-fluid"  width="70%"/>
                <a>
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">EDUCAÇÃO</h5>
                <p class="card-text">
                Uma parceria do Governo de Roraima com a UFRR (Universidade Federal de Roraima) e a Cooperrsui (Cooperativa Roraimense de Suinocultores) promoveu uma aula prática na última quinta-feira, 9, para estudantes do 2º ano da Eagro (Escola Agrotécnica), lidando com a criação de porcos.
                </p>
                <a href="https://www.facebook.com/photo/?fbid=810878463727925&set=a.556957045786736" class="btn btn-primary">ver mais</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="https://scontent.fpll6-1.fna.fbcdn.net/v/t39.30808-6/335501992_749415773463962_6902747800983029331_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeGyNf65VTtEwSbHYyqou56dspdqAQMDADeyl2oBAwMAN1v_dkauvnSA5KGiw6rRvS08qU51SGpF-ZLjoZERVq7B&_nc_ohc=zO6ul0WRLbgAX_ei4Gc&_nc_ht=scontent.fpll6-1.fna&oh=00_AfBg3tv7RGpSAJ7LSBxJHCgHsiGzpvMqZghXnOYU-OEfiA&oe=641562AA" class="img-fluid"  width="70%"/>
                <a>
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Segurança Pública</h5>
                <p class="card-text">
                Para aperfeiçoar as técnicas e meios utilizados nas investigações policiais, dez agentes da PCRR (Polícia Civil de Roraima) participam, de segunda, 13, até sexta-feira, 17, do curso de operador de aeronave remotamente pilotada para o manuseio de drones.
                </p>
                <a href="https://www.facebook.com/photo/?fbid=811982496950855&set=a.556957042453403" class="btn btn-primary">ver mais</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="https://scontent.fpll6-1.fna.fbcdn.net/v/t39.30808-6/335415770_1186172662037652_5437160808487092583_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeEpY9cKf7i9KhWsHElvTclkmjOiNGMsikSaM6I0YyyKRG0rXoSMnLtt7J4jtWEHc4jxMLHNGAe4o6xevqqqNjfK&_nc_ohc=NMmSNpzJ8VUAX_ptDu_&_nc_ht=scontent.fpll6-1.fna&oh=00_AfBM0J7CS-wWYAi72kAAemJu0OCBWNpb_QhalUdCYuzVRw&oe=64163B8F" class="img-fluid"  width="70%"/>
                <a>
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">MARÇO MULHER</h5>
                <p class="card-text">
                O mês de março continua rendendo diversas homenagens às mulheres que tanto colaboram com a gestão do Governo de Roraima, e no próximo dia 14, terça-feira, será a vez das servidoras desfrutarem de momentos especiais dedicados à elas.
                </p>
                <a href="https://www.facebook.com/govroraima/posts/pfbid0F7yUB5s3VF2vVpFNBeo8HV2UvBNkD6FMrT6s6wfakXDLgCvPM3q2MkExmwau8A3Ll" class="btn btn-primary">ver mais</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->


    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">

    <div class="text-center py-4 align-items-center">
      <p>Siga-nos em nossas redes sociais</p>
      <a href="https://www.youtube.com/@Govrr" class="btn btn-primary m-1" role="button"
        rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://www.facebook.com/govroraima" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://www.instagram.com/govroraima/" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      Secretaria do Trabalho e Bem-Estar Social - <strong>UGAM/NTI</strong>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->

    
</body>
</html>









