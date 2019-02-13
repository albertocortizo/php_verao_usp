<?php 
//Cancela apresentação dos erros:
error_reporting(0);

//Nomeia a página e a imagem:
$nomePagina = "> Cadastro de Produtos";
$imagem = "img/produtos.jpg";   

//Declaração das variáveis utilizadas no formulário:
$produto = $_POST['produto'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];

// Caminhos para upload de arquivos:
$dir_alvo = "img/prod/";
$nome_arquivo = $dir_alvo . basename($_FILES["imagem_produto"]["name"]);

//Estabelece a conexão com o servidor - contém usuário, senha e banco de dados a ser utilizado:
$conn = new mysqli("127.0.0.1:3306", "root", "mysql", "db_ecommerce");

//Verifica se houve erro de conexão:
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Comando SQL para inserção de dados do cliente na tabela correspondente:

if (isset($produto) && isset($descricao) && isset($preco) && isset($categoria) && isset($nome_arquivo)) 
{
	$sql = "INSERT INTO tb_produtos (id, nome_produto, desc_produto, cadastrado_em, imagem_produto, preco_produto, categoria_produto) 
			VALUES('%','$produto', '$descricao', NOW() ,'$nome_arquivo' ,'$preco', '$categoria')";
	$erro_sem_dados = 0;
} else
{
	$erro_sem_dados = 1;
}

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
<?php 
	if ($erro_sem_dados == 1) {
		echo "<div class='alert alert-warning fade in alert-dismissible'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close title='close'>×</a>
				<strong>Atenção: </strong> Preencha os dados do produto.
			 </div>";
	}else{
		echo "<div class='alert alert-success' fade in alert-dismissible>
				<a href='#' class='close' data-dismiss='alert' aria-label='close title='close'>×</a>
				<strong>Successo!</strong> O produto foi cadastrado.
			 </div>";
	}
?>	
<form  method = "post" enctype="multipart/form-data"/>
<fieldset>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3"><legend>Informações do Produto:</legend></div>
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
			<div class="col-md-2"></div>
		</div>
  		<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-3">
					<b style="color:grey;">Nome do Produto: </b><br><br>
					<b style="color:grey;">Descrição do Produto: </b><br><br><br>
					<b style="color:grey;">Preço do Produto: </b><br><br>
				</div>
				<div class="col-md-3">
					<input type="text" name="produto"><br><br>
					<textarea name = "descricao" rows="2" cols="23"></textarea><br><br>
					<input type = "text" name = "preco"><br><br>
				</div>
				<div class="col-md-3">
					<b style="color:grey;">Categoria do Produto: </b>
						<br>
							<b style="color:grey;"> > </b>  <input type = "radio" name = "categoria" value="AVI"> Aviônico<br>
							<b style="color:grey;"> > </b> <input type = "radio" name = "categoria" value="CEL"> Célula<br>
					 		<b style="color:grey;"> > </b> <input type = "radio" name = "categoria" value="GMP"> Motor<br><br>
					<b style="color:grey;">Imagem do Produto: </b>
						<br>
							<input type="file" name="imagem_produto" id="imagem_produto">
						<br>
						<input type="submit" value="Cadastrar">
					<br>
				</div>
				<div class="col-md-1"></div>
		</div>
 </fieldset>
</form>
</body>
</html>
