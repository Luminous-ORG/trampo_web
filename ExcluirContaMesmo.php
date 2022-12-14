<?php 
    include('sentinela.php');

    include("conexao.php");

    include_once("./model/UsuarioEmpresa.php");

    $usuarioEmpresa = new UsuarioEmpresa();

    $idEmpresaInfoAbacaxi = $_SESSION['id-session'];

    $stmt = $pdo->prepare("DELETE FROM tbUsuarioEmpresa WHERE idEmpresa = $idEmpresaInfoAbacaxi");
    $stmt->execute();

   
    header("Location:index.php?statusexclusao=$estado");
     
  
?>