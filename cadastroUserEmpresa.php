<?php 
    include("conexao.php");

    $stmtEmail = $pdo -> prepare("Select * From tbEmpresa;");
    $stmtCnpj = $pdo -> prepare("Select * From tbEmpresa;");
    $stmtCnpj -> execute();
    $stmtEmail -> execute();

    $emailUser = $_POST['email'];

    while($row = $stmtEmail -> fetch(PDO::FETCH_BOTH)){


    if($emailUser == $row[2]){
        echo("email igual");
        header("Location:register.php?JaExiste=1");
     
    }
    }
    
    include_once("./model/UsuarioEmpresa.php");

    $usuarioEmpresa = new UsuarioEmpresa();

    $usuarioEmpresa->setNomeEmpresa($_POST['nome']);
    $usuarioEmpresa->setEmailEmpresa($_POST['email']);
    $usuarioEmpresa->setSenhaEmpresa($_POST['senha']);

    $intermediarioCnpj = $_POST['cnpj'];
    $intermediarioCnpj = preg_replace("/[^A-Za-z0-9]/", "", $intermediarioCnpj);

    while($rowcnpj = $stmtCnpj -> fetch(PDO::FETCH_BOTH)){

        echo"$rowcnpj[5]";
        if($intermediarioCnpj == $rowcnpj[5]){
            echo("email igual");
            header("Location:register.php?JaExiste=2");
         
        }
        }

    $usuarioEmpresa->setCnpjEmpresa($intermediarioCnpj);
    

    $usuarioEmpresa->setRuaEmpresa($_POST['rua']);
    $usuarioEmpresa->setNumeroEmpresa($_POST['numero']);
    $usuarioEmpresa->setComplementoEmpresa($_POST['complemento']);
    $usuarioEmpresa->setCepEmpresa($_POST['cep']);
    $usuarioEmpresa->setEstadoEmpresa($_POST['uf']);
    $usuarioEmpresa->setBairroEmpresa($_POST['bairro']);
    $usuarioEmpresa->setCidadeEmpresa($_POST['cidade']);


    $intermediarioTelefone = $_POST['telefone'];
    $intermediarioTelefone = preg_replace("/[^A-Za-z0-9]/", "", $intermediarioTelefone);
    
    $intermediarioCelular = $_POST['celular'];
    $intermediarioCelular = preg_replace("/[^A-Za-z0-9]/", "", $intermediarioCelular);

    $usuarioEmpresa->setTelefoneEmpresa($intermediarioTelefone);
    $usuarioEmpresa->setCelularEmpresa($intermediarioCelular);


    $nomeImagemPadrao = "padrão";
    $caminhoImagemPadrao = "./img/padrao.png";

    
    $usuarioEmpresa->setNomeImagemEmpresa($nomeImagemPadrao);
    $usuarioEmpresa->setCaminhoImagemEmpresa($caminhoImagemPadrao);
    

   

    $nome = $_POST['nome'];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $cnpj = $_POST['cnpj'];
    $cep = $_POST['cep'];
    
    $estado = $_POST['uf'];
    $cidade = $_POST['cidade'];

    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];

    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];

    $senha = $_POST['senha'];
    $senhaConfirmar = $_POST['confirmarSenha'];

    
    $usuarioEmpresa->cadastrar($usuarioEmpresa);

    $usuarioEmpresa->logar($usuarioEmpresa);

    $usuarioEmpresa->getCnpjEmpresa($intermediarioCnpj);

    echo(" $nome $email $senha $cnpj -- $intermediarioCnpj $cep $estado $cidade $bairro $rua $numero $complemento $telefone $celular -- $intermediarioTelefone $intermediarioCelular");

    //$stmt = $pdo -> prepare("insert into tbEmpresa Values( null, '$nome','$email', '$senha', '$cep', '$cnpj', '$telefone', null);");	

   // echo(" <br> ");

    

   //$stmt -> execute();

    //header("Location:sistema.php");

?>