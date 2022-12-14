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
                            <h1 class="h3 mb-2 text-gray-800">Dados da Empresa</h1>

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
                                                    <th>Nome Empresa</th>
                                                    <th>Email</th>
                                                    <th> Cnpj </th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nome Empresa</th>
                                                    <th>Email</th>
                                                    <th> Cnpj </th>
                                                    <th> &nbsp; </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php

                                                $stmtEmpresa = $pdo->prepare("Select * from tbEmpresa WHERE idEmpresa = $idEmpresaVar");
                                                $stmtEmpresa->execute();

                                                while ($rowEmpresa = $stmtEmpresa->fetch(PDO::FETCH_BOTH)) {
                                                    echo "<tr>";

                                                    echo "<td> $row[1] </td>";
                                                    echo "<td> $row[2] </td>";


                                                    echo "<td> $row[5] </td>";

                                                    echo "<td>";
                                                    echo "<a href='?idEmpresaInfo=$rowEmpresa[0]&nomeEmpresa=$rowEmpresa[1]&
                                                    email=$rowEmpresa[2]#section1'> Alterar </a>";
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




                    <section id="section1">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4"></h3>Alterar Informações Empresa
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="alterarEmpresa.php">
                                                <div class="form-floating mb-3">
                                                    <input name="idEmpresaVagaInfo" class="form-control" value="<?php echo @$_GET['idEmpresaInfo']; ?>" id="inputEscondido" type="hidden" placeholder=" " required />
                                                    <label for="inputFuncao">aaaaaaa</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="nomeEmpresa" class="form-control" value="<?php echo @$_GET['nomeEmpresa']; ?>" id="inputFuncao" type="text" placeholder=" " required />
                                                    <label for="inputFuncao">Nome da empresa</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="email" class="form-control" value="<?php echo @$_GET['email']; ?>" id="inputFuncao" type="text" placeholder=" " required />
                                                    <label for="inputFuncao">Email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="senha" class="form-control" id="inputFuncao" type="password" placeholder=" " required />
                                                    <label for="inputFuncao">Senha</label>
                                                </div>

                                                </br>

                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                                    <?php
                                                    $CadastroAlteracaoCheck = @$_GET['resultadoalteracao'];
                                                    switch ($CadastroAlteracaoCheck) {
                                                        case 2:
                                                            echo ("Dados alterados com sucesso!");
                                                            break;
                                                        case 404:
                                                            echo ("Senha Incorreta");
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
                    <div class="d-flex flex-row justify-content-center">
                    <div class="d-flex justify-content-center ml-3">
                        <td style="padding: 10px;text-align: center;">
                            <a style="text-decoration:none;" href="AlterarSenha.php">
                                <div class="card text-bg-light mb-3" style="max-width: 18rem;padding: 10px; border: 2px solid #006eff;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="color: #006eff;" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </h5>
                                        <p class="card-text">Alterar Senha</p>
                                    </div>
                                </div>
                            </a>
                        </td>
                    </div>
                                                    

                    <div class="d-flex justify-content-center ml-3">
                        <td style="padding: 10px;text-align: center;">
                            <a style="text-decoration:none;" href="ExcluirConta.php">
                                <div class="card text-bg-light mb-3" style="max-width: 18rem;padding: 10px; border: 2px solid #006eff;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="color: #006eff;" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </h5>
                                        <p class="card-text">Excluir Conta</p>
                                    </div>
                                </div>
                            </a>
                        </td>
                    </div>
</div>






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

</body>

</html>