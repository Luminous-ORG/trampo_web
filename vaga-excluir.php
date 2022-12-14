<?php
    include("sentinela.php");
    $id = $_GET['id'];


    include_once("./model/Vaga.php");

    $vaga = new Vaga();

    $vaga->setIdVaga($id);

    $vaga->excluir($vaga);
   

    header("location:vagas.php?resultado=4");
?>