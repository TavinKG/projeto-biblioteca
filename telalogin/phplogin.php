<?php

session_start();

if ($_POST['txtusuario'] == "" || $_POST['txtsenha'] == "") {
    header('Location: index.php');
} else {
    include_once "conexao.php";

    $usuariologin = $_POST['txtusuario'];
    $senhalogin = $_POST['txtsenha'];

    $query = "SELECT codigo FROM usersistema WHERE perfil = :usuariologin AND senha = :senhalogin";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuariologin', $usuariologin);
    $stmt->bindParam(':senhalogin', $senhalogin);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['codigo'] = $resultado['codigo'];

    $queryfunc = "SELECT perfil, senha FROM usersistema WHERE perfil = :usuariologin AND senha = :senhalogin";
    $stmtfunc = $conn->prepare($queryfunc);
    $stmtfunc->bindParam(':usuariologin', $usuariologin);
    $stmtfunc->bindParam(':senhalogin', $senhalogin);
    $stmtfunc->execute();

    $linhafunc = $stmtfunc->fetch(PDO::FETCH_ASSOC);

    $perfilbdfunc = $linhafunc['perfil'];
    $senhabdfunc = $linhafunc['senha'];

    $quantidade = "SELECT * FROM usersistema WHERE perfil = :usuariologin AND senha = :senhalogin";
    $stmtquantidade = $conn->prepare($quantidade);
    $stmtquantidade->bindParam(':usuariologin', $usuariologin);
    $stmtquantidade->bindParam(':senhalogin', $senhalogin);
    $stmtquantidade->execute();
    

    $quantidadetotal = $stmtquantidade->rowCount();

    if ($quantidadetotal == 0) {
        header('Location: index.php');
    } else {
        if ($usuariologin == $perfilbdfunc && $senhalogin == $senhabdfunc) {
            // Fazendo a verificação do login do funcionario
            echo "Login Funcionario Efetuado com sucesso !!!!!!";
            header('Location: ../menubiblioteca/telacadcli.php');
            // Adicionar tela de menu principal !!!!!!!!!!!!!!!!
        }
    }
}
?>
