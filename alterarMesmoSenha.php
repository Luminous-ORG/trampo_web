<?php 
    include('sentinela.php');

    include("conexao.php");

    include_once("./model/UsuarioEmpresa.php");

    $usuarioEmpresa = new UsuarioEmpresa();

    $idEmpresaInfoAbacaxi = $_SESSION['id-session'];

    $estado = 1;

    $stmt = $pdo -> prepare("Select * From tbEmpresa WHERE idEmpresa = $idEmpresaInfoAbacaxi;");
    $stmt->execute();
    $row = $stmt -> fetch(PDO::FETCH_BOTH);

    if($_POST['senhaAtual'] != $row[3]){
        $estado = 404;
        header("Location:alterarSenha.php?resultadoalteracao=$estado");
    } else {

      $senhanova = $_POST['senhaNova'];
    
    $stmt132 = $pdo->prepare("UPDATE tbEmpresa set senhaEmpresa='$senhanova' where idEmpresa='$idEmpresaInfoAbacaxi'");	
    $stmt132->execute();
   


 
      

        $estado = 2;
        
        header("Location:alterarSenha.php?resultadoalteracao=$estado");
     
    }
    //  if($idVaga > 0){
    //     $estado = 2;
    //     $vaga->alterar($vaga);
    //     echo("$idVaga alterandoooooooo");
    //  } else {
    //     $estado = 3;
    //     $vaga->cadastrar($vaga);
    //     echo("cadastrandooooo $idEmpresaInfo $nomeEmpresa $email $senha $Cnpj ");
    //  }


    //$stmt = $pdo -> prepare("insert into tbEmpresa Values( null, '$nome','$email', '$senha', '$cep', '$cnpj', '$telefone', null);");	

    // echo(" <br> ");

    //$stmt -> execute();
    // switch($estado){
    //     case 2:
    //         header("Location:vagas.php?resultado=2");
    //         break;
    //     case 3:
    //         header("Location:vagas.php?resultado=3");
    //         break;
    // }
?>