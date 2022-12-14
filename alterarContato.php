<?php
include('sentinela.php');
include('./model/UsuarioEmpresa.php');

$idEmpresaVar = $_SESSION['id-session'];

$usuarioEmpresa = new UsuarioEmpresa();

$usuarioEmpresa->setIdUsuarioEmpresa($idEmpresaVar);

$rowImagem = $usuarioEmpresa->BuscaImagem($usuarioEmpresa);

$lista = $usuarioEmpresa->BuscaInformacoes($usuarioEmpresa);








?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>
<script>
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('logradouro').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('estado').value = ("");
        document.getElementById('ibge').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('estado').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('estado').value = "...";


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>



</head>

<head>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Painel de controle - SB Admin</title>
        <link href="css/simpledatatables.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/estilo.css" rel="stylesheet" />
        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/fontes.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    </head>
</head>

<body class="sb-nav-fixed">
    <?php include('menu.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <section>
                <section>

                    </br>
                    <section>
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800">Contato</h1>

                            <br>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="e" width="100%" cellspacing="0">

                                            <thead>
                                                <tr>
                                                    <th>Telefonte</th>
                                                    <th>Celular</th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Telefonte</th>
                                                    <th>Celular</th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php

                                                $stmtContato = $pdo->prepare("Select * from tbContatoEmpresa WHERE idEmpresa = $idEmpresaVar");
                                                $stmtContato->execute();

                                                while ($rowContato = $stmtContato->fetch(PDO::FETCH_BOTH)) {

                                                    echo "<tr>";
                                                    //echo "<td> $row[0] </td>";
                                                    echo "<td data-mask='(00) 0000-0000' data-mask-selectonfocus='true' id='telefone'> $rowContato[1] </td>";
                                                    echo "<td data-mask='(00) 00000-0000' data-mask-selectonfocus='true' id='celular'> $rowContato[2] </td>";




                                                    echo "<td>";
                                                    echo "<a href='?idContatoEmpresa=$rowContato[0]&telefone=$rowContato[1]&
    celular=$rowContato[2]&idEmpresaContato=$rowContato[3]#section3'> Alterar </a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </section>



                    <section id="section3">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4"></h3>Alterar Informações de Contato
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="alterarContatoEmpresa.php">
                                                <div class="form-floating mb-3">
                                                    <input name="idContatoEmpresa" class="form-control" value="<?php echo @$_GET['idContatoEmpresa']; ?>" id="inputEscondido" type="hidden" placeholder=" " required />
                                                    <label for="inputFuncao">aaaaaaa</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="telefone" class="form-control" id="telefone" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" value="<?php echo @$_GET['telefone']; ?>" id="inputFuncao" type="text" placeholder=" " />
                                                    <label for="inputFuncao">Telefone</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="celular" class="form-control" id="celular" data-mask="(00) 90000-0000" data-mask-selectonfocus="true" value="<?php echo @$_GET['celular']; ?>" id="inputFuncao" type="text" placeholder=" " />
                                                    <label for="inputFuncao">Celular</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="idEmpresaContato" class="form-control" value="<?php echo @$_GET['idEmpresaContato']; ?>" id="inputEscondido" type="hidden" placeholder=" " required />
                                                    <label for="inputFuncao"></label>
                                                </div>

                                                </br>

                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                                    <?php
                                                    $CadastroAlteracaoCheck = @$_GET['resultadoalteracao'];
                                                    switch ($CadastroAlteracaoCheck) {
                                                        case 8:
                                                            echo ("Dados alterados com sucesso!");
                                                            break;
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
                    </section>















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
    </div>
    </div>
</body>

<script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    $("#celular").mask("(00) 90000-0000");
</script>
</script>

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

<script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    $("#celular").mask("(00) 90000-0000");
</script>

</body>

</html>