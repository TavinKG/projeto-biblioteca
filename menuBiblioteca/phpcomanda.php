<?php

    function multar()
    {
        include_once "../telalogin/conexao.php";
        $codigo = $_POST['txtcodigo'];
        $multa = $_POST['txtmulta'];
        $descricao = $_POST['txtdescricao'];
        $valor = $_POST['numvalor'];
        $queryselect = "SELECT * FROM registrocliente WHERE codcliente_fk = :codigo";
        $stmtselect = $conn->prepare($queryselect);
        $stmtselect->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $stmtselect->execute();

        $linhasqlselect = $stmtselect->fetch(PDO::FETCH_ASSOC);

        if (!$linhasqlselect) {
            $query = "INSERT INTO registroCliente (codcliente_fk, multa, descricao, valor) VALUES (:codigo, :multa, :descricao, :valor)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
            $stmt->bindParam(':multa', $multa, PDO::PARAM_INT);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':valor', $valor, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: telacomanda.php');
        } else {
            echo "Esse cliente já está multado";
        }      
    }

    if(isset($_POST['btnmultar']))
    {
        multar();
    }


    function pesquisar()
    {
        include_once "../telalogin/conexao.php";
        $codigo = $_POST['txtcodigo'];
        $multa = $_POST['txtmulta'];
        $descricao = $_POST['txtdescricao'];
        $valor = $_POST['numvalor'];

        $query = "SELECT codcliente_fk, multa, descricao, valor FROM registroCliente WHERE codcliente_fk = :codigo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $stmt->execute();

        $linha = $stmt->fetch(PDO::FETCH_ASSOC);
        if($linha != 0){
        ?>
        <!DOCTYPE html>
    <html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecomanda.css">
    <title>Comanda</title>
</head>
<body>
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
            <input type="number" name="txtcodigo" id="txtcodigo" value="<?php echo $linha['codcliente_fk'];?>" autofocus><br/>
            </br><p>Multa:   (0 ou 1)</p>
            <input type="number" name="txtmulta" id="txtmulta" value="<?php echo $linha['multa'];?>"><br/>
            </br><p>Descrição:</p>
            <input type="text" name="txtdescricao" id="txtdescricao" value="<?php echo $linha['descricao'];?>"><br/>
            </br><p>Valor da multa (R$):</p>
            <input type="number" name="numvalor" id="numvalor" value="<?php echo $linha['valor'];?>" placeholder="R$" class="input" step="0.01"><br/>
            </br><input type="submit" name="btnpesquisar" class="input btn btn1" value="Pesquisar">
            <input type="submit" name="btnremover" class="input btn btn1" value="Atualizar">
            <input type="submit" name="btnmultar" class="input btn btn1" value="Multar">
            <input type="submit" name="btnlimpar" class="input btn btn1" value="Limpar"><br/><br/><br/>
            <hr>
        <form action="phpcomanda.php" method="POST">
            <h1>Empréstimo Livro</h1>
            <p>Código do Cliente:</p>
            <input type="number" name="txtcodcli" id="txtcodcli" placeholder="Código do Cliente" ><br/>
            </br><p>Código do Livro:</p>
            <input type="number" name="txtcodlivro" id="txtcodlivro" placeholder="Código do Livro"><br/>
            </br><p>Data da Saida:</p>
            <input type="date" name="txtsaida" id="txtsaida" placeholder="Data da Saída"><br/>
            </br><p>Data da Entrada:</p>
            <input type="date" name="txtentrada" id="txtentrada" placeholder="Data da Entrada"><br/>
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
        </form>
        </section>
    </div>
  </body>
</html>


        <?php
        }else{
            echo "Cliente não possui pendências";
        }
    }

    if(isset($_POST['btnpesquisar']))
    {
        pesquisar();
    }

    function removerMulta()
    {
        include_once "../telalogin/conexao.php";
        $codigo = $_POST['txtcodigo'];
        $multa = $_POST['txtmulta'];
        $descricao = $_POST['txtdescricao'];
        $valor = $_POST['numvalor'];
        $queryselect = "SELECT multa FROM registrocliente WHERE multa = 1";
        $stmtselect = $conn->query($queryselect);
        $linhasqlselect = $stmtselect->fetch(PDO::FETCH_ASSOC);


        if($linhasqlselect != 0)
        {
            $query = "DELETE FROM registrocliente WHERE codcliente_fk = :codigo";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: telacomanda.php');
        }
    }

    if(isset($_POST['btnremover']))
    {
        removerMulta();
    }
    if(isset($_POST['btnlimpar'])){
        header('location: telacomanda.php');
    }
    
    /*------------------------------------------------------------------------------------------------*/

    function adicionar()
    {
        include_once "../telalogin/conexao.php";
        $codigocli = $_POST['txtcodcli'];
        $codigolivro = $_POST['txtcodlivro'];
        $data_entrada = $_POST['txtentrada'];
        $data_saida = $_POST['txtsaida'];
        $status = $_POST['status'];

        $query = "INSERT INTO emprestimolivro (codcliente, codlivro, datasaida, dataentrada, status) VALUES (:codigocli, :codigolivro, :data_saida, :data_entrada, :status)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':codigocli', $codigocli, PDO::PARAM_INT);
        $stmt->bindParam(':codigolivro', $codigolivro, PDO::PARAM_INT);
        $stmt->bindParam(':data_saida', $data_saida);
        $stmt->bindParam(':data_entrada', $data_entrada);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        if($status == "Emprestado"){
            $query = "SELECT codlivro FROM emprestimolivro WHERE codcliente = :cod";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':cod', $codigocli, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $codlivro = $resultado['codlivro'];

            $queryest = "SELECT qtde_atual FROM estoquelivro WHERE codlivro_fk = :cod";
            $stmtest = $conn->prepare($queryest);
            $stmtest->bindParam(':cod', $codlivro, PDO::PARAM_INT);
            $stmtest->execute();
            $resultadoest = $stmtest->fetch(PDO::FETCH_ASSOC);
            $qtde = $resultadoest['qtde_atual'];
            $qtde--;

            $updateest = "UPDATE estoquelivro SET qtde_atual = :qtde WHERE codlivro_fk = :cod";
            $stmtup = $conn->prepare($updateest);
            $stmtup->bindParam(':qtde', $qtde, PDO::PARAM_INT);
            $stmtup->bindParam(':cod', $codlivro, PDO::PARAM_INT);
            $stmtup->execute();
        }

        header('Location: telacomanda.php');
    }

    if(isset($_POST['btnadicionar']))
    {
        adicionar();
    }

    function pesquisaremp()
    {
        include_once "../telalogin/conexao.php";
        $codigocli = $_POST['txtcodcli'];
        $codigolivro = $_POST['txtcodlivro'];
        $data_entrada = $_POST['txtentrada'];
        $data_saida = $_POST['txtsaida'];
        $status = $_POST['status'];

        $queryselect = "SELECT * FROM emprestimolivro WHERE codcliente = :codigocli";
        $stmtselect = $conn->prepare($queryselect);
        $stmtselect->bindParam(':codigocli', $codigocli, PDO::PARAM_INT);
        $stmtselect->execute();

        $linha = $stmtselect->fetch(PDO::FETCH_ASSOC);

        $status = $linha['status'];

        if($linha == 0)
        {
            echo "Cliente não possui livros pendentes";
        }else{
            if($status == "Emprestado"){
                ?>
            <!doctype html>
            <html lang="pt-br">
            <head>
                <title>Comanda</title>
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
                        <span class="sr-only">Comanda</span>
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
                            <input type="number" name="txtcodigo" id="txtcodigo" placeholder="Código do Cliente"><br/>
                            </br><p>Multa:   (0 ou 1)</p>
                            <input type="number" name="txtmulta" id="txtmulta" placeholder="Multa"><br/>
                            </br><p>Descrição:</p>
                            <input type="text" name="txtdescricao" id="txtdescricao" placeholder="Descricao"><br/>
                            </br><p>Valor da multa (R$):</p>
                            <input type="number" name="numvalor" id="numvalor" placeholder="R$" class="input" step="0.01"><br/>
                            </br><input type="submit" name="btnpesquisar" class="input btn btn1" value="Pesquisar">
                            <input type="submit" name="btnatualizar" class="input btn btn1" value="Atualizar">
                            <input type="submit" name="btnmultar" class="input btn btn1" value="Multar">
                            <input type="submit" name="btnlimpar" class="input btn btn1" value="Limpar"><br/> <br/> <br/>
                        </form>
                        <hr>
                        <form action="phpcomanda.php" method="POST">
                            <h1>Empréstimo Livro</h1>
                            <p>Código do Cliente:</p>
                            <input type="number" name="txtcodcli" id="txtcodcli" value="<?php echo $linha['codcliente'];?>" autofocus><br/>
                            </br><p>Código do Livro:</p>
                            <input type="number" name="txtcodlivro" id="txtcodlivro" value="<?php echo $linha['codlivro'];?>"><br/>
                            </br><p>Data da Saida:</p>
                            <input type="date" name="txtsaida" id="txtsaida" value="<?php echo $linha['datasaida'];?>"><br/>
                            </br><p>Data da Entrada:</p>
                            <input type="date" name="txtentrada" id="txtentrada" value="<?php echo $linha['dataentrada'];?>"><br/>
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
                        <?php
            }else{
                ?>
            <!doctype html>
<html lang="pt-br">
  <head>
  	<title>Comanda</title>
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
	          <span class="sr-only">Comanda</span>
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
                <input type="number" name="txtcodigo" id="txtcodigo" placeholder="Código do Cliente"><br/>
                </br><p>Multa:   (0 ou 1)</p>
                <input type="number" name="txtmulta" id="txtmulta" placeholder="Multa"><br/>
                </br><p>Descrição:</p>
                <input type="text" name="txtdescricao" id="txtdescricao" placeholder="Descricao"><br/>
                </br><p>Valor da multa (R$):</p>
                <input type="number" name="numvalor" id="numvalor" placeholder="R$" class="input" step="0.01"><br/>
                </br><input type="submit" name="btnpesquisar" class="input btn btn1" value="Pesquisar">
                <input type="submit" name="btnatualizar" class="input btn btn1" value="Atualizar">
                <input type="submit" name="btnmultar" class="input btn btn1" value="Multar">
                <input type="submit" name="btnlimpar" class="input btn btn1" value="Limpar"><br/> <br/> <br/>
            </form>
            <hr>
            <form action="phpcomanda.php" method="POST">
                <h1>Empréstimo Livro</h1>
                <p>Código do Cliente:</p>
                <input type="number" name="txtcodcli" id="txtcodcli" value="<?php echo $linha['codcliente'];?>" autofocus><br/>
                </br><p>Código do Livro:</p>
                <input type="number" name="txtcodlivro" id="txtcodlivro" value="<?php echo $linha['codlivro'];?>"><br/>
                </br><p>Data da Saida:</p>
                <input type="date" name="txtsaida" id="txtsaida" value="<?php echo $linha['datasaida'];?>"><br/>
                </br><p>Data da Entrada:</p>
                <input type="date" name="txtentrada" id="txtentrada" value="<?php echo $linha['dataentrada'];?>"><br/>
                </br><label for="status">Status:</label>
            </br><input type="radio" id="emprestado" name="status" value="Emprestado" class="input">
            <label for="emprestado">Emprestado</label>
            <input type="radio" id="devolvido" name="status" class="input" value="Devolvido" checked>
            <label for="devolvido">Devolvido</label></br>

                </br><input type="submit" name="btnadicionar" class="input btn btn1" value="Adicionar">
                <input type="submit" name="btn_emp_pesquisar" class="input btn btn1" value="Pesquisar">
                <input type="submit" name="btnatualizar_emp" class="input btn btn1" value="Atualizar">
                <input type="submit" name="btnremover_emp" class="input btn btn1" value="Remover">
                <input type="submit" name="btnlimpar_emp" class="input btn btn1" value="Limpar">
                
            </form>
        </section>
    </div>
            <?php
            }
            
        }
    }

    if(isset($_POST['btn_emp_pesquisar']))
    {
        pesquisaremp();
    }
    function remover()
    {
        include_once "../telalogin/conexao.php";
        $codigocli = $_POST['txtcodcli'];
        $codigolivro = $_POST['txtcodlivro'];
        $data_entrada = $_POST['txtentrada'];
        $data_saida = $_POST['txtsaida'];
        $status = $_POST['status'];

        $queryselect = "SELECT * FROM emprestimolivro WHERE codcliente = :codigocli";
        $stmtselect = $conn->prepare($queryselect);
        $stmtselect->bindParam(':codigocli', $codigocli, PDO::PARAM_INT);
        $stmtselect->execute();

        $linha = $stmtselect->fetch(PDO::FETCH_ASSOC);

        if($linha == 0)
        {
            echo "O cliente não possui pendências";
        }else{
            $query = "DELETE FROM emprestimolivro WHERE codcliente = :codigocli";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':codigocli', $codigocli, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: telacomanda.php');
        }
    }
    if(isset($_POST['btnremover_emp']))
    {
        remover();
    }

    function atualizaremp(){
        include_once "../telalogin/conexao.php";
        $status = $_POST['status'];
        $codigo = $_POST['txtcodcli'];

        $query = "UPDATE emprestimolivro SET status = :status WHERE codcliente = :cod";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':cod', $codigo, PDO::PARAM_INT);
        $stmt->execute();

        if($status == "Devolvido"){
            $query = "SELECT codlivro FROM emprestimolivro WHERE codcliente = :cod";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':cod', $codigo, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $codlivro = $resultado['codlivro'];

            $queryest = "SELECT qtde_atual FROM estoquelivro WHERE codlivro_fk = :cod";
            $stmtest = $conn->prepare($queryest);
            $stmtest->bindParam(':cod', $codlivro, PDO::PARAM_INT);
            $stmtest->execute();
            $resultadoest = $stmtest->fetch(PDO::FETCH_ASSOC);
            $qtde = $resultadoest['qtde_atual'];
            $qtde++;

            $updateest = "UPDATE estoquelivro SET qtde_atual = :qtde WHERE codlivro_fk = :cod";
            $stmtup = $conn->prepare($updateest);
            $stmtup->bindParam(':qtde', $qtde, PDO::PARAM_INT);
            $stmtup->bindParam(':cod', $codlivro, PDO::PARAM_INT);
            $stmtup->execute();
        }
    }
    if(isset($_POST['btnatualizar_emp'])){
        atualizaremp();
        header('Location: telacomanda.php');
    }
    if(isset($_POST['btnlimpar_emp'])){
        header('location: telacomanda.php');
    }
?>