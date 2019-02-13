<?php 
//Cancela apresentação dos erros:
error_reporting(0);

//Nomeia a página e a imagem:
$nomePagina = "> Cadastro de Pedidos";
$imagem = "img/pedidos.jpg";  


//Declaração das variáveis utilizadas no formulário:
$cod_cliente = $_POST['cliente'];
$cod_produto = $_GET['id'];
$qtd_produto = $_POST['quantidade_produto'];

//Estabelece a conexão com o servidor - contém usuário, senha e banco de dados a ser utilizado:
$conn = new mysqli("127.0.0.1:3306", "root", "mysql", "db_ecommerce");

//Insere a query no banco de dados, de acordo com as especificações:

$sql = "insert into tb_pedidos (data_pedido, id_cliente, id_produto, qtd_produto, vlr_produto, vlr_final)
		values (NOW(), '$cod_cliente', '$cod_produto', '$qtd_produto', 
			(select preco_produto from tb_produtos where id = '$cod_produto'),
			(select preco_produto from tb_produtos where id = '$cod_produto')*'$qtd_produto')";
//NOTA: esse escalonamento de queries precisa ser revisto.

//Estabelece a query no BD:
$conn->query($sql);

//Encerra a conexão com o servidor:
$conn->close();
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
<br>
<form method = "post">
<fieldset>
	<div class="row">
		<div class="col-md-1" style="background-color:lavenderblush;">
		</div>
		<div class="col-md-10">
			<legend>Cadastro de Pedidos:</legend>
					Documento do Cliente: <input type="text" name="cliente"><br><br>
					Código do Produto: <?php echo $cod_produto; ?><br><br>
					Quantidade do Produto: <input type = "number" name = "quantidade_produto" min = "1" max = "10"><br>
			<br>
				<input type="submit" value="Salvar">
			<br>
		</div>
			
	</div>	
	
</fieldset>
</form>
</body>
</html>
