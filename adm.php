<?php
    include('conexao.php');
    $stmt = $pdo -> prepare("SELECT COUNT('idEmpresa') FROM tbEmpresa;");
    $stmt->execute();
    $row = $stmt -> fetch(PDO::FETCH_BOTH);

    $stmt2 = $pdo -> prepare("SELECT COUNT('idUsuario') FROM tbUsuario;");
    $stmt2->execute();
    $row2 = $stmt2 -> fetch(PDO::FETCH_BOTH);

    $stmt3 = $pdo -> prepare("SELECT COUNT('idVaga') FROM tbVaga;");
    $stmt3->execute();
    $row3 = $stmt3 -> fetch(PDO::FETCH_BOTH);

    $stmt4 = $pdo -> prepare("SELECT COUNT('idCadastro') FROM tbCadastro ;");
    $stmt4->execute();
    $row4 = $stmt4 -> fetch(PDO::FETCH_BOTH);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Painel de controle - SB Admin</title>
        <link href="css/simpledatatables.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
       
    </head>
    <body class="sb-nav-fixed">
        <?php
        include('menuAdm.php');
        ?>
            <div id="layoutSidenav_content">
            <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Quantidade de Empresas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row[0];?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Quantidade de Usuarios</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row2[0];?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Quantidade de Vagas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row3[0];?></div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-briefcase fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Quantidade De Inscrições</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row4[0];?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-check fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Content Row -->

<div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Lucros Mensais</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Fontes de Renda</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Direto
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Social
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Anuncio
                </span>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Content Row -->
<div class="row">

<!-- Content Column -->
<div class="col-lg-6 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Projetos</h6>
        </div>
        <div class="card-body">
            <h4 class="small font-weight-bold">Migração de Server<span
                    class="float-right">20%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Sales Tracking <span
                    class="float-right">40%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Customer Database <span
                    class="float-right">60%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: 60%"
                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Payout Details <span
                    class="float-right">80%</span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h4 class="small font-weight-bold">Account Setup <span
                    class="float-right">Complete!</span></h4>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

   

</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
<span>Copyright &copy; Luminous 2021</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

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

</body>

</html>