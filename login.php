<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontes.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div style="  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center align-items-center">

                <div class="col-xl-12 col-lg-12 col-md-9 ">

                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0 ">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-7 d-none d-lg-block bg-login-image "></div>
                                <div class="col-lg-5">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Bem vindo de volta!</h1>
                                        </div>
                                        <form method="POST" action="loginUserEmpresa.php">
                                            <div class="form-floating mb-3">
                                                <input name="email" class="form-control" id="inputEmail" type="email" placeholder="nome@exemplo.com" />
                                                <label for="inputEmail">Endereço de E-mail</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="senha" class="form-control" id="inputPassword" type="password" placeholder="Senha" />
                                                <label for="inputPassword">Senha</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Lembrar senha</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">

                                                <button type="submit" class="btn btn-primary">Entrar</button>
                                            </div>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="#">Esqueceu sua senha?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="register.php">Crie sua conta!</a>
                                        </div>
                                    </div>
                                </div>
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