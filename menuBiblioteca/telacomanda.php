<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Tela Funcionário</title>
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
	          <span class="sr-only">Menu</span>
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
            <h1 id="login">Comanda</h1><hr/>
        </header>
        <section id="usuario">
            <form action="phpcomanda.php" method="POST">
                <h1>Pendências Cliente</h1>
            <p>Código do Cliente:</p>
            <input type="number" name="txtcodigo" id="txtcodigo" placeholder="Código do Cliente" class="input"><br/>
            </br><p>Multa: (0 ou 1)</p>
            <input type="number" name="txtmulta" id="txtmulta" placeholder="Multa" class="input"><br/>
            </br><p>Descrição:</p>
            <input type="text" name="txtdescricao" id="txtdescricao" placeholder="Descricao" class="input"><br/>
            </br><p>Valor da multa (R$):</p>
            <input type="number" name="numvalor" id="numvalor" placeholder="R$" class="input" step="0.01"><br/>
            </br><input type="submit" name="btnpesquisar" class="input btn btn1" value="Pesquisar">
            <input type="submit" name="btnremover" class="input btn btn1" value="Atualizar">
            <input type="submit" name="btnmultar" class="input btn btn1" value="Multar"> 
            <input type="submit" name="btnlimpar" class="input btn btn1" value="Limpar"><br/> <br/> <br/>
        </form>
        <hr>
        <form action="phpcomanda.php" method="POST">
            <h1>Empréstimo Livro</h1>
            <p>Código do Cliente:</p>
            <input type="number" name="txtcodcli" id="txtcodcli" placeholder="Código do Cliente" class="input"><br/>
            </br><p>Código do Livro:</p>
            <input type="number" name="txtcodlivro" id="txtcodlivro" placeholder="Código do Livro" class="input"><br/>
            </br><p>Data da Saida:</p>
            <input type="date" name="txtsaida" id="txtsaida" placeholder="Data da Saída" class="input"><br/>
            </br><p>Data da Entrada:</p>
            <input type="date" name="txtentrada" id="txtentrada" placeholder="Data da Entrada" class="input"><br/>
            </br><label for="status">Status:</label>
            </br><input type="radio" id="emprestado" name="status" value="Emprestado" class="input" checked>
            <label for="emprestado">Emprestado</label>
            <input type="radio" id="devolvido" name="status" class="input" value="Devolvido">
            <label for="devolvido">Devolvido</label></br>

            </br><input type="submit" name="btnadicionar" class="input btn btn1" value="Adicionar">
            <input type="submit" name="btn_emp_pesquisar" class="input btn btn1" value="Pesquisar">
            <input type="submit" name="btnatualizar_emp" class="input btn btn1" value="Atualizar">
            <input type="submit" name="btnremover_emp" class="input btn btn1" value="Remover">
            <input type="submit" name="btnlimpar_emp" class="input btn btn1" value="Limpar">
            
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