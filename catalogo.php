<?php 

//Cancela apresentação dos erros:
error_reporting(0);

//Nomeia a página e a imagem:
$nomePagina = "> Catálogo de Produtos";  
$imagem = "img/produtos.jpg"; 
//Estabelece uma conexão com o banco de dados:
$conn = mysqli_connect("127.0.0.1", "root", "mysql", "db_ecommerce");
//Query a ser realizada:
$sql = mysqli_query($conn, "select id, imagem_produto, nome_produto, categoria_produto, desc_produto, preco_produto from tb_produtos");
$busca = mysqli_fetch_all($sql, MYSQLI_NUM);
//Fecha a conexão:
mysqli_close($conn);
?>
<html>

<head>
	<title><?php echo $nomePagina ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<style>
h4 {
  color: grey;
  text-align: center;
}
</style>

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
<br>
<div class='row'>
	<p >
	<div class='col-md-1'></div>
	<div class='col-md-2'><h4>Imagem ilustrativa</h4></div>
	<div class='col-md-2'><h4>Produto</h4></div>
	<div class='col-md-1'><h4>Categoria</h4></div>
	<div class='col-md-3'><h4>Preço</h4></div>
	<div class='col-md-2'><h4>Finalizar</h4></div>
	<div class='col-md-1'></div>
	</p>
</div>
<br>

<?php

if(!!$busca){
    foreach($busca as list($id, $imagem_produto, $nome_produto, $categoria_produto, $desc_produto, $preco_produto)){
      //$compra_produto = $_GET['id'];
	  echo "<div class='row'>
		        <div class='col-md-1'></div>
				<div class='col-md-2'><img src = ".$imagem_produto." style='width:200px;height:150px;'></div>
		        <div class='col-md-2' class='container'><h3>".$nome_produto."</h3><br>".$desc_produto."</div>
		        <div class='col-md-1'>".$categoria_produto."</div>
		        <div class='col-md-3'><h4>US$ ".$preco_produto."</h4></div>
		        <div class='col-md-1' align='center'></div><br>
				<div class='col-md-1'>
				<form action = 'pedidos.php' method='get'>
					<input type = 'radio' name = 'id' value='".$id."'> Selecionar<br><br>
					<input type = 'submit' name = 'comprar' value='Comprar!'><br><br>
				</form></div>
	        </div><hr><br>";
    }
}
?>	

</body>

</html>
