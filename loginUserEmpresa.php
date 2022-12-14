<?php 
    include("conexao.php");
    
    $emailUser = $_POST['email'];
    $senhaUser = $_POST['senha'];
    $checkLogado = 2;

    echo $emailUser = $_POST['email'];
    echo $senhaUser = $_POST['senha'];
    

    if($emailUser == "adm@gmail.com" AND $senhaUser == 123){
        $checkLogado = 4;
        header("Location:adm.php");
    }
    $stmt = $pdo -> prepare("Select * From tbEmpresa;");

    //echo ("$emailUser $senhaUser");

    $stmt -> execute();

    while($row = $stmt -> fetch(PDO::FETCH_BOTH)){

   // echo (" $row[2] $row[3] ");

    if($emailUser == $row[2] AND $senhaUser == $row[3]){
        
        session_start();
        $_SESSION['id-session'] = $row[0];
        $_SESSION['login-session'] = $emailUser;
        $_SESSION['senha-session'] = $senhaUser;

        $checkLogado = 1;
        header("Location:dashboard.php");

        echo $_SESSION['id-session'];
        echo $_SESSION['login-session'];
        echo $_SESSION['senha-session'];
    }
    }
    if($checkLogado == 2){  
        header("Location:login.php");
    }




?>