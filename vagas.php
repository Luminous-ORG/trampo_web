<?php
include('sentinela.php');

$idEmpresaVar = $_SESSION['id-session'];
include_once("./model/Vaga.php");

$vaga = new Vaga();

$vaga->setIdEmpresa($idEmpresaVar);

$lista = $vaga->listar($vaga);



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
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontes.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">





    </script>
</head>

<body class="sb-nav-fixed">
    <?php include('menu.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4"></h3>Cadastrar vaga
                            </div>
                            <div class="card-body">
                                <form method="POST" action="cadastroVaga.php">
                                    <div class="form-floating mb-3">
                                        <input name="idEmpresaVaga" class="form-control" value="<?php echo @$_GET['idEmpresaVaga']; ?>" id="inputEscondido" type="hidden" placeholder="name@example.com" />
                                        <label for="inputFuncao">aaaaaaa</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="nomeVaga" class="form-control" value="<?php echo @$_GET['nomeVaga']; ?>" id="inputFuncao" type="text" placeholder="name@example.com" />
                                        <label for="inputFuncao">Nome da Função</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <script type="text/javascript">
                                            function showfield(name) {
                                                if (name == 'Other') {
                                                    document.getElementById('div1').innerHTML = '<br>  Outro: <input type="text" name="requisito" class="form-select" placeholder="Escolaridade" required/>';
                                                } else {
                                                    document.getElementById('div1').innerHTML = '';
                                                }
                                            }
                                        </script>
                                        <select name="requisito" id="requisito" class="form-control" onchange="showfield(this.options[this.selectedIndex].value)" value="<?php echo @$_GET['requisito']; ?>" required>
                                            <option value="" selected disabled hidden>Escolaridade</option>
                                            <option value="Ensino Fundamental Incompleto" <?php if (rtrim(@$_GET['requisito']) === "Ensino Fundamental Incompleto") echo ' selected="selected"'; ?>>Ensino Fundamental Incompleto</option>
                                            <option value="Ensino Fundamental Completo" <?php if (rtrim(@$_GET['requisito'])  == "Ensino Fundamental Completo") echo ' selected="selected"'; ?>>Ensino Fundamental Completo </option>
                                            <option value="Ensino Médio Incompleto" <?php if (rtrim(@$_GET['requisito']) == "Ensino Médio Incompleto") echo ' selected="selected"'; ?>>Ensino Médio Incompleto</option>
                                            <option value="Ensino Médio Completo" <?php if (rtrim(@$_GET['requisito'])  == "Ensino Médio Completo") echo ' selected="selected"'; ?>>Ensino Médio Completo</option>
                                            <option value="Ensino Médio Com Técnico" <?php if (rtrim(@$_GET['requisito'])  == "Ensino Médio Com Técnico") echo ' selected="selected"'; ?>>Ensino Médio Com Técnico</option>
                                            <option value="Ensino Médio pelo EJA" <?php if (rtrim(@$_GET['requisito']) == "Ensino Médio pelo EJA") echo ' selected="selected" '; ?>>Ensino Médio pelo EJA</option>
                                            <option value="Other">Outro</option>
                                        </select>
                                        <div id="div1"></div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <script type="text/javascript">
                                            function mostracampo(nome) {
                                                if (nome == 'Outro') {
                                                    document.getElementById('div2').innerHTML = '<br> Outro: <input type="text" name="Cargahoraria" class="form-select"  placeholder="Escolaridade" required/> <label for="inputFuncao">Escolaridade</label>';
                                                } else {
                                                    document.getElementById('div2').innerHTML = '';
                                                }
                                            }
                                        </script>
                                        <select name="Cargahoraria" id="carga" class="form-control" onchange="mostracampo(this.options[this.selectedIndex].value)" value="<?php echo @$_GET['Cargahoraria']; ?>" required>
                                            <option value="" selected disabled hidden>Carga Horária</option>
                                            <option value="Ensino Fundamental Incompleto" <?php if (rtrim(@$_GET['Cargahoraria']) === "5X1") echo ' selected="selected"'; ?>>5X1</option>
                                            <option value="Ensino Fundamental Completo" <?php if (rtrim(@$_GET['Cargahoraria'])  == "5X2") echo ' selected="selected"'; ?>>5X2</option>
                                            <option value="Ensino Médio Incompleto" <?php if (rtrim(@$_GET['Cargahoraria']) == "6X1") echo ' selected="selected"'; ?>>6X1</option>
                                            <option value="Ensino Médio Completo" <?php if (rtrim(@$_GET['Cargahoraria'])  == "12X36") echo ' selected="selected"'; ?>>12X36</option>
                                            <option value="Ensino Médio Com Técnico" <?php if (rtrim(@$_GET['Cargahoraria'])  == "18X36") echo ' selected="selected"'; ?>>18X36</option>
                                            <option value="Ensino Médio pelo EJA" <?php if (rtrim(@$_GET['Cargahoraria']) == "24X48") echo ' selected="selected" '; ?>>24X48</option>
                                            <option value="Outro">Outro</option>

                                        </select>
                                        <div id="div2"></div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <script type="text/javascript">
                                            function mostracamposal(nome) {
                                                if (nome == 'Outro') {
                                                    document.getElementById('div3').innerHTML = ' <br> Outro: <input type="text" name="Salario" class="form-select"  placeholder="Salario" required/> <label for="inputFuncao">Salario</label/>';
                                                } else {
                                                    document.getElementById('div3').innerHTML = '';
                                                }
                                            }
                                        </script>
                                        <select name="Salario" id="carga" class="form-control" onchange="mostracamposal(this.options[this.selectedIndex].value)" value="<?php echo @$_GET['Cargahoraria']; ?>" required>
                                            <option value="" selected disabled hidden>Salario</option>
                                            <option value="Ensino Fundamental Completo" <?php if (rtrim(@$_GET['Salario'])  == "Ensino Fundamental Completo") echo ' selected="selected"'; ?>>R$1000 - R$2000</option>
                                            <option value="Ensino Médio Incompleto" <?php if (rtrim(@$_GET['Salario']) == "Ensino Médio Incompleto") echo ' selected="selected"'; ?>>R$2000 - R$3000</option>
                                            <option value="Ensino Médio Completo" <?php if (rtrim(@$_GET['Salario'])  == "Ensino Médio Completo") echo ' selected="selected"'; ?>>R3000 - R$5000</option>
                                            <option value="Outro">Outro</option>

                                        </select>
                                        <div id="div3"></div>
                                    </div>






                                    <div class="form-group">
                                        <label for="inputDescricao">Descrição da Vaga</label>
                                        <textarea name="DescricaoVaga" class="form-control" id="inputDescricao" type="text" rows="3"><?php echo htmlspecialchars(@$_GET['DescricaoVaga']) ?></textarea>
                                    </div>
                                    </br>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        <?php
                                        $CadastroAlteracaoCheck = @$_GET['resultado'];
                                        switch ($CadastroAlteracaoCheck) {
                                            case 2:
                                                echo ("Vaga alterada com sucesso!");
                                                break;
                                            case 3:
                                                echo ("Vaga cadastrada com sucesso!");
                                                break;
                                            case 4:
                                                echo ("Vaga excluida com sucesso!");
                                        }

                                        ?>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            </br>

            <section>
                <br>




                <div class="container-fluid">

                            <!-- Page Heading -->
                            <center>
                            <h1 class="h3 mb-2 text-gray-800">Vagas</h1>
                            </center>
                            <br>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                            <thead>
                                                <tr>
                                                    <th>Nome Empresa</th>
                                                    <th>Email</th>
                                                    <th>Senha</th>
                                                    <th> Cnpj </th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nome Empresa</th>
                                                    <th>Email</th>
                                                    <th>Senha</th>
                                                    <th> Cnpj </th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php 
                                    $stmt = $pdo->prepare("SELECT * FROM tbVaga WHERE idEmpresa = $idEmpresaVar");
                                    $stmt -> execute(); 
                                    while($row = $stmt -> fetch(PDO::FETCH_BOTH)){
                                        echo "<tr>";

                                            echo "<td> $row[0] </td>";
                                            echo "<td> $row[1] </td>";
                                            echo "<td> $row[2] </td>";
                                            echo "<td> $row[3] </td>";
                                            echo "<td> $row[4] </td>";

                                            echo "<td> $row[5] </td>";
                                            
                                            echo "<td> <a href='vaga-excluir.php?id=$row[0]'> Excluir </a> </td> "; 
                                            
                                            echo "<td> 
                                            <a href='?idEmpresaVaga=$row[0]&nomeVaga=$row[1]&requisito=$row[2]
                                            &salario=$row[4]&DescricaoVaga=$row[5]&dataVaga=$row[7]&Cargahoraria=$row[3]'> Alterar </a>
                                            </td>";
                                        echo "</tr>";
                                    }?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                <!-- /.container-fluid -->

                <br>
                <br>
                <br>

        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Luminous 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->



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