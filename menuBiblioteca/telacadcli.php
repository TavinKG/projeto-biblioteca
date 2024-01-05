<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Cadastro Cliente</title>
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
	          <span class="sr-only">Cadastrar Cliente</span>
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
            <h1 id="login">Cadastro Cliente</h1><hr/>
        </header>
        <section id="usuario">
            <form action="phpcadcli.php" method="POST">
            <p>Código:</p>
            <input type="text" name="txtcodigo" id="txtcodigo" placeholder="Código">
            </br></br><p>Cliente:</p>
            <input type="text" name="txtnome" id="txtnome" placeholder="Cliente">
            </br></br><p>Endereço:</p>
            <input type="text" name="txtendereco" id="txtendereco" placeholder="Endereço">
            </br></br><p>Email:</p>
            <input type="text" name="txtemail" id="txtemail" placeholder="Email">
            </br></br><p>Telefone:</p>
            <input type="text" name="txttelefone" id="txttelefone" placeholder="Telefone"></br>
            
            </br><input type="submit" name="btnLogin" class="input btn btn1" value="Cadastrar" onclick="">
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