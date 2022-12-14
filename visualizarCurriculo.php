<?php
    include("sentinela.php");
    
    
    
    $div3='';
	$div1='';
	$div2='';
	  $telefone ='';
	  $endereco  ='';
	 
	  $numero ='';
	 
	  $bairro  ='';
	  $cidade='';
	  $uf  ='';
	 
	  $objetivo  ='';
	 
	  $grau  ='';
	 
	  $situacao  ='';
	 
	  $mes  ='';
	 
	  $ano  ='';
	 
	  $experiencia  ='';
	 
	  $curso  ='';
	 
	  $habilidade ='';
	  $idioma  ='';
	 
	  $foto  ='';
	 
	  	$info ='';
	 	$info1='';
		$info2='';
		$info3='';
		$info4='';
		$info5='';
		$info6='';
		$info7='';
		$info8='';
		$info9='';
		$info10='';

	  $cnhB ='';
	  $cnhC ='';
	 
	  $cnhD  ='';
	 
	 $cnhE  ='';
	 
	  $exterior  ='';
	 
	  $deficiente ='';
	  $viagens  ='';
	 $comunicacao  ='';
	 
	 $informatica  ='';
	 $nomebanco ='';
	 $emailbanco  ='';
	$tituloObjetivo ='';
	
				  
	
				  $stmt = $pdo->prepare("SELECT * FROM tbDadosUsuario WHERE
				  idUsuario = :id ");
				  $stmt->bindValue(":id", $_GET['id']);
				  $stmt->execute();
		  
				  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
		  
					  $telefone .= $row['telefone'];
					  $endereco .= $row['endereco']; 
					  $numero .= $row['numero']; 
					  $bairro .= $row['bairro'];
					  $cidade .= $row['cidade'];
					  $uf .= $row['uf'];
					 
				  }
	
				  $stmt1 = $pdo->prepare("SELECT * FROM tbObjetivoUsuario WHERE
				  idUsuario = :id ");
				  $stmt1->bindValue(":id", $_GET['id']);
				  $stmt1->execute();
		  
				  while($row1 = $stmt1->fetch(PDO::FETCH_BOTH)){
		  
					  $objetivo .= $row1['objetivo'];
					 
					 
				  }
	
				  $stmt2 = $pdo->prepare("SELECT * FROM tbEducacaoUsuario WHERE
				  idUsuario = :id ");
				  $stmt2->bindValue(":id",$_GET['id']);
				  $stmt2->execute();
	  
				  while($row2 = $stmt2->fetch(PDO::FETCH_BOTH)){
	  
					  $grau .= $row2['grau'];
					  $situacao .= $row2['situacao'];
					  $mes .= $row2['mes'];
					  $ano .= $row2['ano'];
	  
				  }
	
	
				  $stmt3 = $pdo->prepare("SELECT * FROM tbExperienciaUsuario WHERE
				  idUsuario = :id ");
				  $stmt3->bindValue(":id",$_GET['id']);
				  $stmt3->execute();
	  
				  while($row3 = $stmt3->fetch(PDO::FETCH_BOTH)){
	  
					  $experiencia .= "<p> ". $row3['cargo']." | ". $row3['empresa']." (" . $row3['anoInicio'] . " - " . $row3['anoSaiu'] . " " . $row3['situacao'] . ")</p><br>";					                             
	  
				  }
	
	
				  $stmt4 = $pdo->prepare("SELECT * FROM tbCursoUsuario WHERE
				  idUsuario = :id ");
				  $stmt4->bindValue(":id",$_GET['id']);
				  $stmt4->execute();
	  
				  while($row4 = $stmt4->fetch(PDO::FETCH_BOTH)){
	  
					  $curso .= "<p>".$row4['curso'].", ".$row4['instituicao']." (".$row4['ano'].")</p>";					                             
	  
				  }
	
				  $stmt5 = $pdo->prepare("SELECT * FROM tbHabilidade WHERE
				  idUsuario = :id ");
				  $stmt5->bindValue(":id",$_GET['id']);
				  $stmt5->execute();
	  
				  while($row5 = $stmt5->fetch(PDO::FETCH_BOTH)){
	  
					$habilidade .="<p> " .$row5['habilidade']. ", " .$row5['nivel']." </p>";
					  
				  }
	
				  $stmt6 = $pdo->prepare("SELECT * FROM tbIdiomaUsuario WHERE
				  idUsuario = :id ");
				  $stmt6->bindValue(":id",$_GET['id']);
				  $stmt6->execute();
	  
				  while($row6 = $stmt6->fetch(PDO::FETCH_BOTH)){
	  
					$idioma .="<p> " .$row6['idioma']. " (" .$row6['nivel'].")</p>";
					  
				  }
	
	
				  $stmt8 = $pdo->prepare("SELECT * FROM tbFotoUsuario WHERE
				  idUsuario = :id ");
				  $stmt8->bindValue(":id",$_GET['id']);
				  $stmt8->execute();
	  
				  while($row7 = $stmt8->fetch(PDO::FETCH_BOTH)){
	  
					$foto .= $row7['foto']; ;
					  
				  }
	
				  
				  
				  $stmt7 = $pdo->prepare("SELECT * FROM tbInfo WHERE
				  idUsuario = :id ");
				  $stmt7->bindValue(":id",$_GET['id']);
				  $stmt7->execute();
	  
				  while($row7 = $stmt7->fetch(PDO::FETCH_BOTH)){
	  
					$info .= " <p>". $row7['info1'] ." </p>";
					$info1 .=" <p>". $row7['info2'] ." </p>";
	                $info2 .=" <p>". $row7['info3'] ." </p>";
	                $info3 .=" <p>". $row7['info4'] ." </p>";
	                $info4 .=" <p>". $row7['info5'] ." </p>";
	                $info5 .=" <p>". $row7['info6'] ." </p>";
	                $info6 .=" <p>". $row7['info7'] ." </p>";
	                $info7 .=" <p>". $row7['info8'] ." </p>";
	                $info8 .=" <p>". $row7['info9'] ." </p>";
	                $info9 .=" <p>". $row7['info10'] ." </p>";
	                $info10 .=" <p>". $row7['info11'] ." </p>";

					  
				  }
					  
                  $stmt8 = $pdo->prepare("SELECT * FROM tbusuario WHERE idUsuario = :id ");
                  $stmt8->bindValue(":id",$_GET['id']);
                  $stmt8->execute();
                  
                  while($row8 = $stmt8->fetch(PDO::FETCH_BOTH)){
	  
					
                    $nomebanco = $row8['nomeUsuario'];
				    $emailbanco = $row8['emailUsuario'];

					  
				  }
				  
	

	if($objetivo == null){
		$tituloObjetivo = "<h2 id='titulo'></h2>";
	}else{
		$tituloObjetivo = "<h2 id='titulo'>Objetivo</h2>";
	}
	
	if($foto == null){
		$foto = 'http://localhost/trampo/assets/img/icon_user.png';
	
	}else{
		
	}

    

        include('menu.php');

        
	

        $Nome = "
					<td class='user'>
	
							<img class='foto' src='$foto'>
	
							<br>
							<br>
							
	
					</td>
		";
	
		$pdotato = "
	
				<td class='contato'>
					
							<h2 id='titulo3'>Contato</h2>
							<br>
							<p>$telefone</p>
							<br>
							<p>$emailbanco</p>
							<br>
							<p>$endereco, $numero, $bairro, $cidade, $uf</p>
					
					</td>
		";
	
	
	
	
		$Formacao = "
	
			  <td class='formacao'>
						
						<h2 id='titulo'>Formação</h2>
						<br>
						<p>$grau ($situacao)</p>
	
					</td>
		";
	
	
	
		if($experiencia == ""){
			$Experiencia = "
			<td>
		
			</td>
			";
		}else{
		$Experiencia = "
	
		<td class='experiencia'>
						
						<h2 id='titulo'>Experiência</h2>
						<br>
						$experiencia
	
					</td>
		";
		}
	
	
	
		if($curso == ""){
			$div2 = "
			
			";
		}else{
		$div2 = "
	
		  <td class='curso'>
						
						<h2 id='titulo'>Cursos</h2>
						<br>
						$curso
	
					</td>
		";
		}
	
	
		
	
		if( 
		$info == "" &&
		$info1 == "" &&
		$info2 == "" &&
		$info3 == "" &&
		$info4 == "" &&
		$info5 == "" &&
		$info6 == "" &&
		$info7 == "" &&
		$info8 == "" &&
		$info9 == "" &&
		$info10 == ""
		){
	
		}else{
			$div3 = "
		
			";
	
		$div3 = "
	
		  <td class='info'>
						
						<h2 id='titulo'>Informações adicionais</h2>
						<br>
						 $info
						 $info1
						 $info2
						 $info3
						 $info4
						 $info5
						 $info6
						 $info7
						 $info8
						 $info9
						 $info10

						 
	
					</td>
		";
		
		}
	
	
		if($idioma == ""){
			$div4 = "
			<td class='idioma'>
						
						
					</td>
			";
		}else{
		$div4 = "
	
			  <td class='idioma'>
						
						<h2 id='titulo3'>Idiomas</h2>
						<br>
						$idioma
	
					</td>
		";
		}
        ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="css/fontes.css"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
		
    <style type='text/css'>
	
    *{
        margin: 0;
        padding: 0;
        border:0;

    }
    body{
        
        color: #283132;
        height:100%;		
        background: linear-gradient(90deg, #FFC0CB 30%, #00FFFF 10%);

    }
    .cabecalho{
        background-color: #006eff;
        height:100%;		
        width: 38%;
    }
    .fundo{
        position: absolute;
    }
    
    
    .foto{
       background-color: #ddd;
        border-radius: 50%;
        height: 250px;
        object-fit: cover;
        width: 250px;  
        border: 2px solid;
        border-color: #006eff;
        padding: 2px;
    }
    .user{
        padding: 20px;
        width: 20%;
        background-color: #006eff;
    
    }
    .contato{
        background-color: #006eff;
        color:white;
        padding: 20px;
        text-align: left;
    
    }
    .objetivo{
        width: 100vw;        
        padding: 20px;
        text-align: left;
    }
    .experiencia{
        width: 100vw;        	
        padding: 20px;
        text-align: left;
    }
    .formacao{
        width: 100vw;
        padding: 20px;
        text-align: left;
    }
    
    .curso{
        
        padding-top: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-right: 70px;
        text-align: left;
    }
    .idioma{
        background-color: #006eff;
        color:white;
         padding-top: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-right: 70px;
        text-align: left;
    }
    .no{
        background-color: #006eff;
        color:white;
         padding-top: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-right: 70px;
        text-align: left;

    }
    .info{
        
        padding-top: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-right: 100px;
        text-align: left;
    }
    #titulo{
        color: #006eff;
    }
    #titulo2{
        color: #006eff;
        margin-top:50px;
        font-size: 30px;
    }
    table{
    border-collapse:collapse;

    }

</style>

</head>

<body id="page-top">

                <!-- Begin Page Content -->
                <center>
                <div class="container-fluid">

	
		
    
		
			
			<table>
		
			
				<tbody>
				<?php echo $Nome ?> 
					<td class='objetivo'>	
						
						<h1 id='titulo2'><?php echo("$nomebanco")?></h1>
						
						<?php echo $tituloObjetivo?>
						<br>
						<p><?php echo $objetivo?></p>

					</td>
				</tbody>
				<tbody>
                <?php echo $pdotato?>
                <?php echo $Formacao?>
				</tbody>
				<tbody>
                <?php echo $div4?>
                <?php echo $Experiencia?>
				</tbody>
				<tbody>
				<th class='no'></th>
                <?php echo $div2?>
				</tbody>
				<tbody>
				<th class='no'></th>
                <?php echo $div3?>
				</tbody>
		
		
			</table>
	
				
        
	
  
    
	   
	
                <!-- /.container-fluid -->
                <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Luminous 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        </center>
        <!-- End of Content Wrapper -->

    </div>
     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Pronto para Sair?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Selecione "Logout" abaixo se está pronto para terminar a sessão atual.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" href="logout.php">Logout</a>
</div>
</div>
</div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>