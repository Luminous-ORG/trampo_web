<?php

    session_start();

    include('conexao.php');

    $stmt = $pdo -> prepare("Select * From tbEmpresa;");

    $limpo = false;

    

    $stmt -> execute();
    
    if(@$_SESSION['login-session'] == null OR @$_SESSION['senha-session'] == null){
        header("Location:index.php");
        echo('ta null');
    }


    while($row = $stmt -> fetch(PDO::FETCH_BOTH)){

    //echo (" $row[2] $row[3] ");

    if(@$_SESSION['login-session'] == $row[2] AND @$_SESSION['senha-session'] == $row[3]){
        $limpo = true;
        //echo('aaaaaaaaa');
        break;

    }
    }
    

    if($limpo == false){
        header("Location:index.php");
    }

    

?>