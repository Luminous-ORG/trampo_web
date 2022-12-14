<?php
	$servidor="localhost";
	$banco="bdTrampo";
	$usuario="root";
	$senha="";

	$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);	
    //echo('conexao');
?>
