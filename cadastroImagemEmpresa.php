<?php
    include('sentinela.php');

    include("conexao.php");
 
    include_once("./model/UsuarioEmpresa.php");

    $idEmpresaInfoAbacaxi = $_SESSION['id-session'];

    
    $stmtImagemCheckExiste = $pdo -> prepare("Select * From tbImagemPerfilEmpresa 
    WHERE idEmpresa='$idEmpresaInfoAbacaxi';");

    $stmtImagemCheckExiste -> execute();

    $nomeImagem = $_FILES['foto']['name'];
    
    $arquivo = $_FILES['foto']['tmp_name'];

    $caminhoImagem = "http://localhost/28-11-2TrampoSistema/img/" . $nomeImagem;
    
    move_uploaded_file($arquivo, $caminhoImagem);

    $usuarioEmpresa = new UsuarioEmpresa();

    

    $usuarioEmpresa->setIdUsuarioEmpresa($idEmpresaInfoAbacaxi);
    $usuarioEmpresa->setNomeImagemEmpresa($nomeImagem);
    $usuarioEmpresa->setCaminhoImagemEmpresa($caminhoImagem);



    $row = $stmtImagemCheckExiste -> fetch(PDO::FETCH_BOTH);


        if($row[0]){
            $usuarioEmpresa->alterarImagemEmpresa($usuarioEmpresa);
        } else {
            $usuarioEmpresa->cadastrarImagemEmpresa($usuarioEmpresa);
        }
        
   

    

    //mova o $arquivo para a pasta indicada com o nome indicado
        
    

    

    

    // if($idProduto>0){
    //     $stmt = $pdo->prepare("update tbProduto set 
    //                          produto='$produto'
    //                         ,idCategoria='$idCategoria'
    //                         ,valor='$valor', imagem='$caminhoImagem'
    //                         where idProduto='$idProduto'");	
    // }
    // else{
    //     $stmt = $pdo->prepare("insert into tbProduto values(null,'$produto','$idCategoria','$valor','$caminhoImagem');");
    // }

    
	//$stmt ->execute();

    echo("$caminhoImagem");

    echo("<img src='$caminhoImagem' width='500px'>");
    

    header("location:perfil.php");

?>
