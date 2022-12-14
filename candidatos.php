<?php
    include("sentinela.php");
    $idEmpresaVar = $_SESSION['id-session'];

    
    $stmt = $pdo -> prepare("SELECT *, nomeUsuario, emailUsuario, ano, status
     FROM tbCadastro 
     INNER JOIN tbUsuario 
     ON tbUsuario.idUsuario = tbCadastro.idUsuario
     INNER JOIN tbdadosusuario
     ON tbdadosusuario.idUsuario = tbUsuario.idUsuario
     INNER JOIN tbVaga
     ON tbVaga.idVaga = tbCadastro.idVaga
     WHERE idEmpresa = $idEmpresaVar
                                ");
    $stmt->execute();
    
    

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
    <link href="css/estilo.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

<?php
        include('menu.php');
        ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Candidatos</h1>
                    
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Vaga</th>
                                            <th>Visualizar Currículo</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Vaga</th>
                                            <th>Visualizar Currículo</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    while($row = $stmt -> fetch(PDO::FETCH_BOTH)){
                                        echo "<tr>";
                                            
                                            echo "<td> $row[4] </td>";
                                            echo "<td> $row[5] </td>";
                                            echo "<td> $row[6] </td>";

                                            echo "<td> $row[15] </td>";
                                            echo "<td> $row[24] </td>";
                                            echo "<td> <a href='visualizarCurriculo.php?id=$row[4]'>Ver Currículo</a></td>";
                                        echo "</tr>";
                                    }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                </div> 
            </div>
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
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>


<!-- Custom scripts for all pages-->


<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>