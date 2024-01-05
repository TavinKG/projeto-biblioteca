<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=bdbiblioteca', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo 'Erro na conexão com o banco de dados: '.$e->getMessage();
}
?>