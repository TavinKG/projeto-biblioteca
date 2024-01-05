<?php

  session_start();

  function cadastrar()
  {
    if($_POST['txtnome'] != "")
    {
        include_once "../telalogin/../telalogin/conexao.php";
        
        $nome = $_POST['txtnome'];
        $genero = $_POST['txtgenero'];
        $autor = $_POST['txtautor'];
        $editora = $_POST['txteditora'];
        $pagina = $_POST['txtpagina'];
        $data = $_POST['txtdata'];


        $query = "INSERT INTO cadlivros (livro, genero, autor, editora, paginas, data) VALUES (:nome, :genero, :autor, :editora, :pagina, :data)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':editora', $editora);
        $stmt->bindParam(':pagina', $pagina);
        $stmt->bindParam(':data', $data);
        $stmt->execute();

        header('Location: telacadlivro.php');

    }
  }
if(isset($_POST['btnCadastrar']))
{
  cadastrar();
}

  function pesquisar()
  {
    include_once "../telalogin/conexao.php";
     $codigo = $_POST['txtcodigo'];
    if($_POST['txtcodigo'] != "")
    {
      $query = "SELECT * FROM cadlivros WHERE codlivro = :codigo";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
      $stmt->execute();
      
      $linha = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Cadastro Livro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Cadastro livro</span>
	        </button>
        </div>
	  		<h1><a href="telacadcli.php" class="logo">Biblioteca</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="telacadcli.php"><span class="fa fa-user mr-3"></span> Cadastrar Cliente</a>
          </li>
          <li>
              <a href="telacadlivro.php"><span class="fa fa-book mr-3"></span> Cadastrar Livro</a>
          </li>
          <li>
            <a href="telaestoque.php"><span class="fa fa-archive mr-3"></span> Estoque</a>
          </li>
          <li>
            <a href="telacomanda.php"><span class="fa fa-sticky-note mr-3"></span> Comanda</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <div id="usuariosenha">
        <header id="dados">
            <h1 id="login">Cadastro Livros</h1><hr/>
        </header>
        <section id="usuario">
            <form action="phpcadlivro.php" method="POST">
            <p>Código:</p>
            <input type="text" name="txtcodigo" id="txtcodigo" value="<?php echo $linha['codlivro']; ?>" class="input">
            </br></br><p>Nome:</p>
            <input type="text" name="txtnome" id="txtnome" value="<?php echo $linha['livro']; ?>" class="input">
            </br></br><p>Gênero:</p>
            <input type="text" name="txtgenero" id="txtgenero" value="<?php echo $linha['genero']; ?>" class="input">
            </br></br><p>Autor:</p>
            <input type="text" name="txtautor" id="txtautor" value="<?php echo $linha['autor']; ?>" class="input">
            </br></br><p>Editora:</p>
            <input type="text" name="txteditora" id="txteditora" value="<?php echo $linha['editora']; ?>" class="input">
            </br></br><p>Páginas:</p>
            <input type="number" name="txtpagina" id="txtpagina" value="<?php echo $linha['paginas']; ?>" class="input">
            </br></br><p>Data Lançamento:</p>
            <input type="date" name="txtdata" id="txtdata" value="<?php echo $linha['data']; ?>" class="input"><br/>

            
            </br><input type="submit" name="btnCadastrar" class="input btn btn1" value="Cadastrar" onclick="">
            <input type="submit" name="btnAtualizar" class="input btn btn1" value="Atualizar" onclick="">
            <input type="submit" name="btnPesquisar" class="input btn btn1" value="Pesquisar" onclick="">
            <input type="submit" name="btnRemover" class="input btn btn1" value="Remover" onclick="">
            <input type="submit" name="btnLimpar" class="input btn btn1" value="Limpar" onclick="">
            </form>
        </section>
    </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
        
      <?php
    } 
  }
  if(isset($_POST['btnPesquisar']))
  {
    pesquisar();
  }
    
  function atualizar()
  {
    include_once "../telalogin/conexao.php";
        
        $nome = $_POST['txtnome'];
        $genero = $_POST['txtgenero'];
        $autor = $_POST['txtautor'];
        $editora = $_POST['txteditora'];
        $pagina = $_POST['txtpagina'];
        $data = $_POST['txtdata'];
        $codigo = $_POST['txtcodigo'];


        $query = "UPDATE cadlivros SET livro = :nome, genero = :genero, autor = :autor, editora = :editora, paginas = :pagina, data = :data WHERE codlivro = :codigo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':editora', $editora);
        $stmt->bindParam(':pagina', $pagina, PDO::PARAM_INT);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $stmt->execute();
  }

  if(isset($_POST['btnAtualizar']))
  {
    atualizar();
    
    header('Location: telacadlivro.php');
  }

  function remover(){
    include_once "../telalogin/conexao.php";
    $codigo = $_POST['txtcodigo'];
    if($_POST['txtcodigo'] != ""){
      $query = "SELECT nivel FROM usersistema WHERE codigo = :codigo";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':codigo', $_SESSION['codigo'], PDO::PARAM_INT);
      $stmt->execute();
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      $nivel = $resultado['nivel'];
      if($nivel == "adm"){
        $query = "DELETE FROM cadlivros WHERE codlivro = :codigo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    }
  }

  if(isset($_POST['btnRemover'])){
    remover();
    header('Location: telacadlivro.php');
  }

  if(isset($_POST['btnLimpar'])){
    header('Location: telacadlivro.php');
  }
    
?>

