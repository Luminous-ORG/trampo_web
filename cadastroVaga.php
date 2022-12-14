<?php 
    include('sentinela.php');

    include("conexao.php");

    include_once("./model/Vaga.php");
    include_once("./model/UsuarioEmpresa.php");

    $vaga = new Vaga();

    $empresa = new UsuarioEmpresa();
    
    $idEmpresaVagaAbacaxi = $_SESSION['id-session'];

    $empresa->setIdUsuarioEmpresa($idEmpresaVagaAbacaxi);

    $lista = $empresa->BuscaInformacoes($empresa);

    $rowImagem = $empresa->BuscaImagem($empresa);

    $stmtEndereco = $pdo->prepare("Select * from tbEnderecoEmpresa WHERE idEmpresa = $idEmpresaVagaAbacaxi");	
    $stmtEndereco ->execute();
    $rowEndereco = $stmtEndereco ->fetch(PDO::FETCH_BOTH);


    $estado = 1;

    $vaga->setIdVaga($_POST['idEmpresaVaga']);
    $vaga->setNomeVaga($_POST['nomeVaga']);
    $vaga->setDescricaoVaga($_POST['DescricaoVaga']);
    $vaga->setIdEmpresa($idEmpresaVagaAbacaxi);
    $vaga->setDataVaga($_POST['dataVaga']);
    $vaga->setSalario($_POST['Salario']);
    $vaga->setRequisito($_POST['requisito']);
    $vaga->setCargahoraria($_POST['Cargahoraria']);
    $vaga->setFoto($rowImagem[2]);
    $vaga->setNomeEmpresa($lista[1]);
    $vaga->setCidade($rowEndereco[7]);

    $idVaga = $_POST['idEmpresaVaga'];
    $nomeVaga = $_POST['nomeVaga'];
    $DescricaoVaga = $_POST['DescricaoVaga'];
    $idEmpresaVaga = $idEmpresaVagaAbacaxi;
    $dataVaga = $_POST['dataVaga'];


     if($idVaga > 0){
        $estado = 2;
        $vaga->alterar($vaga);
        echo("$idVaga alterandoooooooo");
     } else {
        $estado = 3;
        $vaga->cadastrar($vaga);
        echo("cadastrandooooo $idVaga $nomeVaga $DescricaoVaga $idEmpresaVagaAbacaxi $dataVaga ");
     }


    //$stmt = $pdo -> prepare("insert into tbEmpresa Values( null, '$nome','$email', '$senha', '$cep', '$cnpj', '$telefone', null);");	

    // echo(" <br> ");

    //$stmt -> execute();
    switch($estado){
        case 2:
            header("Location:vagas.php?resultado=2");
            break;
        case 3:
            header("Location:vagas.php?resultado=3");
            break;
    }
?>