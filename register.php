<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="css/fontes.css"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
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
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

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


<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie sua Conta!</h1>
                            </div>
                            <form method="POST" action="cadastroUserEmpresa.php">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="nome" class="form-control" id="inputFirstName" type="text" placeholder="Nome da Empresa" required="true"/>
                                                        <label for="inputFirstName">Nome</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="cnpj" class="form-control" id="inputCnpj" onkeypress="$(this).mask('00.000.000/0000-00')" type="text" placeholder="CNPJ" required/>
                                                <label for="inputCnpj">CNPJ</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <label for="cep">CEP</label>
                                            <input name="cep" type="text" id="cep" value="" onkeypress="$(this).mask('00000-000')" size="10" maxlength="9" onblur="pesquisacep(this.value);" >
                                            
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                            <select name="uf" class="form-control" type="text" id="uf" required>
                                                <option value="">Estado</option>
                                                <option>AC</option>
                                                <option>AL</option>
                                                <option>AM</option>
                                                <option>AP</option>
                                                <option>BA</option>
                                                <option>CE</option>
                                                <option>ES</option>
                                                <option>GO</option>
                                                <option>MA</option>
                                                <option>MG</option>
                                                <option>MS</option>
                                                <option>MT</option>
                                                <option>PA</option>
                                                <option>PB</option>
                                                <option>PE</option>
                                                <option>PI</option>
                                                <option>PR</option>
                                                <option>RJ</option>
                                                <option>RN</option>
                                                <option>RO</option>
                                                <option>RR</option>
                                                <option>RS</option>
                                                <option>SC</option>
                                                <option>SE</option>
                                                <option>SP</option>
                                                <option>TO</option>
                                              </select>
                                              </div>
                                              <div class="col-md-9">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="bairro" class="form-control" type="text" id="bairro" size="40" required/>
                                                    <label for="inputBairro">Bairro</label>
                                                </div>
                                            </div>
                                            </div>
                                         

                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="cidade" class="form-control" type="text" id="cidade" required/>
                                                        <label for="inputCidade">Cidade</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating mb-6 mb-md-0">
                                                        <input  name="rua" class="form-control" type="text" id="rua" required/>
                                                        <label for="inputRua">Rua</label>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="numero" class="form-control" id="inputNumero" type="text" required/>
                                                        <label for="inputNumero">Numero</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="complemento" class="form-control" id="inputComplemento" type="text"/>
                                                        <label for="inputComplemento">Complemento</label>
                                                    </div>
                                                </div>
                                                
                                            </div>                       
                                            <div class="form-floating mb-3">
                                                <input name="telefone" type="text" id="" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')" required>
                                                <label for="inputTelefone">Telefone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="celular" type="text" id="" class="form-control" onkeypress="$(this).mask('(00) 90000-00009')" required>
                                                <label for="inputCelular">Celular</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="email" class="form-control" id="inputEmail" type="email" placeholder="nome@exemplo.com" required/>
                                                <label for="inputEmail">Endereço de E-mail</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="senha" class="form-control" id="inputSenha" type="password" placeholder="Create uma senha" required/>
                                                        <label for="inputSenha">Senha</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="confirmarSenha" class="form-control" id="inputConfirmarSenha" type="password" placeholder="Confirme sua senha" required=/>
                                                        <label for="inputConfirmarSenha">Confirmar senha</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <?php 
                                                $logincheckado = @$_GET['JaExiste'];
                                                if($logincheckado == 1){
                                                echo("Conta com esse email já existe");
                                                }
            
                                                if($logincheckado == 2){
                                                echo("Conta com esse CNPJ já existe");
                                                }
                                            ?>
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Criar conta</button></div>
                                            </div>
                                        </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="login.php">Já tem uma conta? Login!</a>
                            </div>
                        </div>
                    </div>
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

</body>

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
    
</html>
