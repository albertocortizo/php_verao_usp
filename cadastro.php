<?php 
//Cancela apresentação dos erros:
error_reporting(0);

//Nomeia a página e a imagem:
$nomePagina = "> Cadastro de Clientes";  
$imagem = "img/clientes.jpg"; 

//Declaração das variáveis utilizadas no formulário:
$login = $_POST['login'];
$p = $_POST['snh'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$pj = $_POST['pj'];
$doc_cliente = $_POST['documento'];

//Estabelece a conexão com o servidor - contém usuário, senha e banco de dados a ser utilizado:
$conn = new mysqli("127.0.0.1:3306", "root", "mysql", "db_ecommerce");

//Verifica se houve erro de conexão:
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($nome) && isset($email) && isset($endereco) && isset($telefone) && isset($pj) && isset($doc_cliente)) 
{
	//Comando SQL para inserção de dados do cliente na tabela correspondente:
	$sql = 
	"INSERT INTO tb_clientes (id, nome_cliente, email_cliente, end_cobranca, tel_principal, cliente_pj, doc_cliente, login_cliente, s_cliente) 
	VALUES('%','$nome', '$email', '$endereco', '$telefone', '$pj', '$doc_cliente', '$login', '$p')";
	$erro_sem_dados = 0;
} else
{
	$erro_sem_dados = 1;
}

//teste
$conn->query($sql);
//teste

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
				<strong>Atenção: </strong> Preencha os dados do cliente.
			 </div>";
	}else{
		echo "<div class='alert alert-success' fade in alert-dismissible>
				<a href='#' class='close' data-dismiss='alert' aria-label='close title='close'>×</a>
				<strong>Successo!</strong> O cliente foi cadastrado.
			 </div>";
	}
?>	
<form method = "post">
		<div class="row">
			<div class="col-md-1"  style="background-color:lavenderblush;"></div>
				<div class="col-md-10">
					<legend>Informações Pessoais:</legend>
					Login:
						<input type="text" name="login" size="10"><br><br>
					Senha:
						<input type="password" name="snh" size="10"><br><br>
					Nome:
						<input type="text" name="nome" size="70"><br><br>
					E-mail: 
						<input type = "email" name = "email" size="30"><br><br>
					Endereço: 
						<input type = "text" name = "endereco" size="30"><br><br>
					Telefone: 
						<input type = "number" name = "telefone"><br><br>
					Pessoa Física ou Jurídica: <br><br>
						<input type = "radio" name = "pj" value="n">Física<br>
						<input type = "radio" name = "pj" value="s">Jurídica<br><br>
					CPF/CNPJ nº: <input type = 'text' name = 'documento' size='15'><br>
					<br>
						<input type="submit" value="Salvar">
					<br>
				</div>
			</div>
				<div class="col-md-1" style="background-color:lavenderblush;"> </div>
		</div>
	<br>
</form>
</body>
</html>
