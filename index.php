<?php 
//Cancela apresentação dos erros:
error_reporting(0);

//Nomeia a página e a imagem:
$nomePagina = "Home - Aero-Parts";
$imagem = "img/home.bmp";  

?>

<html>

<body>
<head>
	<title><?php echo $nomePagina ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<style>
		h3 {
			color: "#FFFFFF";
		}
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
		width: 30%;
		margin: auto;
		}
  </style>
</head>
<body>
<img src= <?php echo '"' . $imagem . '"'?>>
<br>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">AERO-PARTS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="cadastro.php">Clientes</a></li>
	  <li><a href="catalogo.php">Catálogo</a></li>
      <li><a href="produtos.php">Produtos</a></li>
    </ul>
  </div>
</nav>


	<h3><?php echo $nomePagina ?></h3>

<!-- -->

<div class="container">
  <br>
  <div id="produtos" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#produtos" data-slide-to="0" class="active"></li>
      <li data-target="#produtos" data-slide-to="1"></li>
      <li data-target="#produtos" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" >

      <div class="item active">
        <img src="img/prod/avi_doppler_radar_01.png" alt="Pulso-Doppler" width="200" height="200">
        <div class="carousel-caption"><br>
          <h3>Pulso-Doppler</h3><br>
          <p>Radares meteorológicos de alta precisão.</p>
        </div>
      </div>

      <div class="item">
        <img src="img/prod/str_fus_01.png" alt="Fuselagem" width="460" height="345">
        <div class="carousel-caption"><br>
          <h3>Fuselagem</h3><br>
          <p>Estrutura recém-fabricada.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="img/prod/str_trem_pouso_01.png" alt="TDP" width="460" height="345">
        <div class="carousel-caption"><br>
          <h3>Trem de Pouso</h3><br>
          <p>Confiabilidade em todos os tipos de operações.</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#produtos" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#produtos" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="false"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!-- -->

</body>
</html>
