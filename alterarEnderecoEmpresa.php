<?php 
    include('sentinela.php');

    

    include_once("./model/UsuarioEmpresa.php");

    $usuarioEmpresa = new UsuarioEmpresa();

    $idEmpresaInfoAbacaxi = $_SESSION['id-session'];

    $estador = 1;

    $idEmpresaInfo = $idEmpresaInfoAbacaxi;
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $Cep = $_POST['Cep'];
    $estado = $_POST['estado'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $usuarioEmpresa->setIdUsuarioEmpresa($idEmpresaInfoAbacaxi);
    $usuarioEmpresa->setRuaEmpresa($logradouro);
    $usuarioEmpresa->setNumeroEmpresa($numero);
    $usuarioEmpresa->setComplementoEmpresa($complemento);
    $usuarioEmpresa->setCepEmpresa($Cep);
    $usuarioEmpresa->setEstadoEmpresa($estado);
    $usuarioEmpresa->setBairroEmpresa($bairro);
    $usuarioEmpresa->setCidadeEmpresa($cidade);
   
    
 
        echo("alterando $idEmpresaInfo $logradouro $numero $complemento $Cep $estado $bairro $cidade $idEmpresaInfoAbacaxi");

        $usuarioEmpresa->alterarInformacoesEnderecoEmpresa($usuarioEmpresa);

        $estador = 7;
        
        header("Location:perfil.php?resultadoalteracao=$estador");
     

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