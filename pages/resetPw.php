<?php

    session_start();
    include('../procesosPHP/connection.php');


    if(!isset($_GET['email']) || !isset($_GET['auth_code'])){

        $error = 'ERROR: falta informacion del usuario.';
    }else{

        $email = mysqli_real_escape_string($con, $_GET['email']);
        $auth_code = mysqli_real_escape_string($con, $_GET['auth_code']);


        $_SESSION['email'] = $email;
        $_SESSION['auth_code'] = $auth_code;
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Recuperar contraseña</title>
  </head>
  <body>
      <header>
          <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a href="../index.php" class="navbar-brand">Moments</a>
                <button type="button" class="navbar-toggler" data-target="#navbar" data-toggle="collapse" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbar" class="collapse navbar-collapse text-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="forgotPassword.php" class="nav-link">
                                crear nueva contraseña
                            </a>
                        </li>
                    </ul>
                </div>
          </nav>
      </header>


    <main>
        <div class="container col-sm-10 col-md-10 col-lg-8 col-xl-6 text-center">

            <h1 id="h1-message" class="display-4 text-success mt-4">Crear nueva contraseña</h1>
            <hr>
            <p id="p-message" class="lead">Por favor ingrese y confirme la nueva contraseña</p>
            <form id="needs-validation" class="mx-4 mt-4" novalidate>

                <div class="form-group col-sm-8 mx-auto">
                   <label for="new-pass" class="sr-only">Nueva contraseña</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-info"><span class="fa fa-key"></span></div>
                        </div>
                        <input
                            autofocus
                            required
                            autocomplete="new-password"
                            id="new-pass"
                            name="new-pass"
                            pattern=".{6,}"
                            type="password"
                            placeholder="nueva contraseña"
                            class="form-control">

                        <div id="pass-fb" class="invalid-feedback">Por favor digite su new nueva contraseña</div>
                    </div>
                    <small id="pw-no-match" class="form-text text-danger d-none">
                        Las contraseñas no son iguales.
                    </small>
                    <small class="form-text text-muted">
                        minimo 6 caracteres, considere crear una contraseña segura.
                    </small>
                </div>

                <div class="form-group col-sm-8 mx-auto">
                   <label for="c-new-pass" class="sr-only">confirm new password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-info"><span class="fa fa-key"></span></div>
                        </div>
                        <input
                            autofocus
                            required
                            autocomplete="new-password"
                            id="c-new-pass"
                            name="c-new-pass"
                            pattern=".{6,}"
                            type="password"
                            placeholder="confirmar nueva contraseña"
                            class="form-control">
                        <div id="c-pass-fb" class="invalid-feedback">Por favor confirme su new nueva contraseña</div>
                    </div>
                    <small id="cpw-no-match" class="form-text text-danger d-none">
                        Las contraseñas no son iguales.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary btn-lg ml-3">Guardar</button>

            </form>

            <div class="col-md-4 mx-auto">

                <a id="btn-entrar" href="login.php" class="btn mx-4 btn-lg btn-success d-none mt-4">Entrar a mi cuenta</a>
                <a id="btn-regresar" href="login.php" class="btn mx-4 btn-lg btn-primary d-none mt-4">Regresar</a>
            </div>

        </div>

    </main>



   <div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </div>
  <script src="../procesosJS/validateNewPW.js"></script>
  </body>
</html>
