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
            <input type="text" name="txtcodigo" id="txtcodigo" placeholder="Código" >
            </br></br><p>Nome:</p>
            <input type="text" name="txtnome" id="txtnome" placeholder="Nome" >
            </br></br><p>Gênero:</p>
            <input type="text" name="txtgenero" id="txtgenero" placeholder="Gênero" >
            </br></br><p>Autor:</p>
            <input type="text" name="txtautor" id="txtautor" placeholder="Autor" >
            </br></br><p>Editora:</p>
            <input type="text" name="txteditora" id="txteditora" placeholder="Editora" >
            </br></br><p>Páginas:</p>
            <input type="number" name="txtpagina" id="txtpagina" placeholder="Número de páginas" >
            </br></br><p>Data Lançamento:</p>
            <input type="date" name="txtdata" id="txtdata" placeholder="Data Lançamento" ><br/>

            
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