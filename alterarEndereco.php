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
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="/css">
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
                            <h1 class="h3 mb-2 -gray-800">Candidatos</h1>

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
                                                    <th>Logradouro </th>
                                                    <th>Número &nbsp;</th>
                                                    <th>Complemento &nbsp;</th>
                                                    <th>Cep </th>
                                                    <th> Estado &nbsp;</th>
                                                    <th> Bairro &nbsp;</th>
                                                    <th> Cidade &nbsp;</th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Logradouro </th>
                                                    <th>Número &nbsp;</th>
                                                    <th>Complemento &nbsp;</th>
                                                    <th>Cep </th>
                                                    <th> Estado &nbsp;</th>
                                                    <th> Bairro &nbsp;</th>
                                                    <th> Cidade &nbsp;</th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php

                                                $stmtEndereco = $pdo->prepare("Select * from tbEnderecoEmpresa WHERE idEmpresa = $idEmpresaVar");
                                                $stmtEndereco->execute();

                                                while ($rowEndereco = $stmtEndereco->fetch(PDO::FETCH_BOTH)) {

                                                    echo "<tr>";
                                                    //echo "<td> $row[0] </td>";
                                                    echo "<td class='tabd'> $rowEndereco[1] </td>";
                                                    echo "<td class='tabd'> $rowEndereco[2] </td>";
                                                    echo "<td class='tabd'> $rowEndereco[3] </td>";
                                                    echo "<td class='tabd'> $rowEndereco[4] </td>";
                                                    echo "<td class='tabd'> $rowEndereco[5] </td>";
                                                    echo "<td class='tabd'> $rowEndereco[6] </td>";
                                                    echo "<td class='tabd'> $rowEndereco[7] </td>";



                                                    echo "<td class='tabd'>";
                                                    echo "<a href='?idEmpresaEndereco=$rowEndereco[0]
                            &logradouro=$rowEndereco[1]&numero=$rowEndereco[2]&complemento=$rowEndereco[3]&
                            Cep=$rowEndereco[4]&estado=$rowEndereco[5]&bairro=$rowEndereco[6]&
                            cidade=$rowEndereco[7]#section2'> Alterar </a>";
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




                    
                    <section id="section2">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="-center font-weight-light my-4"></h3>Alterar Informações Empresa
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="alterarEnderecoEmpresa.php" id="def">
                                                <div class="form-floating mb-3">
                                                    <input name="idEmpresaEndereco" class="form-control" value="<?php echo @$_GET['idEmpresaEndereco']; ?>" id="inputEscondido" type="hidden" placeholder=" " required />
                                                    <label for="inputFuncao">aaaaaaa</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="logradouro" class="form-control" value="<?php echo @$_GET['logradouro']; ?>" id="logradouro" type="" placeholder=" " required />
                                                    <label for="inputFuncao">Logradouro</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="numero" class="form-control" value="<?php echo @$_GET['numero']; ?>" id="inputFuncao" type="" placeholder=" " required />
                                                    <label for="inputFuncao">Número</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="complemento" class="form-control" value="<?php echo @$_GET['complemento']; ?>" id="inputFuncao" type="" placeholder=" " />
                                                    <label for="inputFuncao">Complemento</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="Cep" class="form-control" data-mask="00000-000" onblur="pesquisacep(this.value);" value="<?php echo @$_GET['Cep']; ?>" id="cep" type="" placeholder="" required />
                                                    <label for="inputFuncao">Cep</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="estado" class="form-control" value="<?php echo @$_GET['estado']; ?>" id="estado" type="" placeholder=" " required />
                                                    <label for="inputFuncao">Estado</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="bairro" class="form-control" value="<?php echo @$_GET['bairro']; ?>" id="bairro" type="" placeholder=" " required />
                                                    <label for="inputFuncao">Bairro</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="cidade" class="form-control" value="<?php echo @$_GET['cidade']; ?>" id="cidade" type="" placeholder=" " required />
                                                    <label for="inputFuncao">Cidade</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="idEmpresa" class="form-control" value="<?php echo @$_GET['idEmpresaInfoEndereco']; ?>" id="inputFuncao" type="hidden" placeholder=" " required />
                                                    <label for="inputFuncao"></label>
                                                </div>
                                                </br>

                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                                    <?php
                                                    $CadastroAlteracaoCheck = @$_GET['resultadoalteracao'];
                                                    switch ($CadastroAlteracaoCheck) {
                                                        case 7:
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
                    <div class="-muted">Copyright &copy; Luminous 2022</div>
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

<script type="/javascript">
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

<script>
            var cnpjcpf= $("#cpfcnpj").val().length;
     
            if(cnpjcpf < 11){
                $("#cpfcnpj").mask("999.999.999-99");
            } else {
                $("#cpfcnpj").mask("99.999.999/9999-99");
            }    
        </script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/popper.min.js"></script>
    

</body>

</html>