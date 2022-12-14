<?php 
    include('sentinela.php');

    include("conexao.php");

    include_once("./model/UsuarioEmpresa.php");

    $usuarioEmpresa = new UsuarioEmpresa();

    $idEmpresaInfoAbacaxi = $_SESSION['id-session'];

    $estado = 1;

    $intermediarioTelefone = $_POST['telefone'];
    $intermediarioTelefone = preg_replace("/[^A-Za-z0-9]/", "", $intermediarioTelefone);
    
    $intermediarioCelular = $_POST['celular'];
    $intermediarioCelular = preg_replace("/[^A-Za-z0-9]/", "", $intermediarioCelular);
    


    $usuarioEmpresa->setIdUsuarioEmpresa($idEmpresaInfoAbacaxi);
    $usuarioEmpresa->setTelefoneEmpresa($intermediarioTelefone);
    $usuarioEmpresa->setCelularEmpresa($intermediarioCelular);
    
    
    
    
    
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    


 
        echo("alterando $telefone $celular $idEmpresaInfoAbacaxi");

        $usuarioEmpresa->alterarInformacoesContatoEmpresa($usuarioEmpresa);

        $estado = 8;
        
        header("Location:perfil.php?resultadoalteracao=$estado#section3");
     

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