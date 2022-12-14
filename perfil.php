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


    </head>
</head>

<body class="sb-nav-fixed">
    <?php include('menu.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <section>

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo $rowImagem[2] ?> " onerror="this.onerror=null; this.src='./img/padrao.png'" alt="Lupa" style="width: 10%;">
                        </div>
                        </br>
                        <h2 class="d-flex justify-content-center text-white"> <?php echo $lista[1] ?></h2>
                    </div>
                    </br>
                    <div class="d-flex flex-row justify-content-center">
                        <form method="POST" action="cadastroImagemEmpresa.php" enctype="multipart/form-data">
                            <div class="container-perfil">
                                <label for="inputFuncao" class="text-white">Cadastro de Foto</label>
                                <input class="form-control" id="foto" type="file" name="foto" placeholder="imagem" value="<?php echo @$_GET['imagem']; ?>" required />
                                </br>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>

                        <form action="exclusaoImagemEmpresa.php">
                            </br>
                            <button type="submit" class="btn btn-primary">Excluir</button>
                        </form>
                    </div>
                </div>
            <br>
            </section>
            <section>
                <?php include('menuPerfil.php'); ?>


            </section>















        </main>


    </div>
    </div>
    </div>
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
</body>

</html>