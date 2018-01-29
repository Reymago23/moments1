<?php

    session_start();


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
                                Recuperar contraseña
                            </a>
                        </li>
                    </ul>
                </div>
          </nav>
      </header>


    <main>
        <div class="container col-sm-10 col-md-10 col-lg-8 col-xl-6">
            <h1 class="display-4 text-success mt-4">Recuperar contraseña</h1>
            <hr>
            <p class="lead">
                Para poder recuperar tu contraseña, ingresa tu correo y te enviaremos las instrucciones.
            </p>

            <form method="post" id="needs-validation" class="text-center" novalidate>
                <div class="form-group">
                    <label for="forgotpwEmail" class="form-label sr-only">Insert your email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text text-info">
                                <span class="fa fa-envelope-o"></span>
                            </div>
                        </div>
                        <input autofocus
                            required
                            id="forgotpwEmail"
                            name="forgotpwEmail"
                            autocomplete="email"
                            pattern="^[\w.%\+-]+@[\w.-]+\.[a-zA-Z]{2,}$"
                            type="email"
                            class="form-control"
                            placeholder="email@mail.com">

                        <div id="invalid-fb" class="invalid-feedback">
                                Por favor ingrese su correo electrónico.
                        </div>
                    </div>
                    <p id="fb-element" class="small text-danger d-none">

                            su correo no esta registrado, si lo desea puede
                            <a href="register.php" class="text-primary">crear una cuenta</a>
                    </p>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            </form>
        </div>
    </main>

   <div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </div>
  <script src="../procesosJS/validateForgotpw.js"></script>
  </body>
</html>
