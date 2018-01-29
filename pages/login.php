<?php
    session_start();

    $email = '';

    if(isset($_SESSION['email'])){

        $email = $_SESSION['email'];
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Moments</title>
  </head>
  <body>

     <header>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
          <a href="/moments1/index.php" class="navbar-brand mb-0 h1">Moments</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar"
             aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbar" class="collapse navbar-collapse text-center">
              <div class="navbar-nav mr-auto">
                  <a href="/moments1/index.php" class="nav-item nav-link active">Inicio</a>
                  <a href="login.php" class="nav-item nav-link active">Entrar</a>
              </div>
          </div>
      </nav>
     </header>

     <main>
          <div class="container mt-5 col-md-6 col-lg-6">
              <h3 class="font-weight-light">Entrar a cuenta</h3>
              <hr class="mt-0 mb-4">

              <div id="unable-to-login" class="alert alert-danger small d-none"></div>
              <div id="reenviar-correo"class="alert alert-danger small d-none">
                 Su cuenta esta registrada pero aun no esta activada, para activar su cuenta
                 debe dar click al enlace de activacion que recibio en su correo.
                  <a href="resendActivationEmail.php" class="text-primary">reenviar correo de activacion</a>
              </div>

              <form method="post" id="needs-validation" novalidate>
                  <div class="form-group">
                      <label for="l_email" class="sr-only">Email</label>
                      <label for="l_email">Correo electrónico</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <div id="l_emailIconDiv" class="input-group-text text-info">
                                  <span id="l_emailIcon" class="fa fa-envelope-o"></span>
                              </div>
                          </div>
                          <input autofocus
                               required
                               autocomplete="email"
                               pattern="^[\w.%\+-]+@[\w.-]+\.[a-zA-Z]{2,}$"
                               id="l_email"
                               name="l_email"
                               type="email"
                               value="<?php

                                        if($email !== ''){
                                            echo $email;
                                        }

                                      ?>"
                               class="form-control"
                               maxlength="60"
                               placeholder="email@email.com">

                          <div id="l_email_fb" class="invalid-feedback">
                              Por favor ingrese su correo electrónico.
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="l_pass" class="sr-only">Password</label>
                      <label for="l_pass">Contraseña</label>
                      <div class="input-group">
                         <div class="input-group-prepend">
                            <div id="l_passIconDiv" class="input-group-text text-info">
                                <span id="l_passIcon" class="fa fa-key"></span>
                            </div>
                          </div>
                        <input required pattern=".{6,}"
                               autocomplete="current-password"
                               type="password" id="l_pass"
                               maxlength="60"
                               name="l_pass"
                               class="form-control"
                               placeholder="contraseña">

                        <div id="l_pass_fb" class="invalid-feedback">
                            Por favor ingrese su contraseña
                        </div>
                      </div>

                  </div>
                  <div class="form-check">
                      <input
                          type="checkbox"
                          class="form-check-input"
                          name="rememberMe"
                          id="rememberMe">

                      <label class="form-check-label" for="rememberMe">
                          Recordarme
                      </label>
                  </div>
                  <p>
                      <button
                          type="submit"
                          class="btn btn-primary mt-4 col-sm-4 col-md-5 col-lg-4">
                              Entrar
                      </button>
                      <a
                          href="register.php"
                          class="btn btn-outline-success mt-4 col-sm-4 col-md-5 col-lg-4 float-right">
                          Crear cuenta
                      </a>
                  </p>
                  <small class="text text-secondary mt-4">
                      olvido su contraseña?
                      <a href="forgotPassword.php">
                          &nbsp;&nbsp;
                          Recuperar mi contraseña
                      </a>
                  </small>
              </form>
          </div>

      </main>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </div>
    <script type="text/javascript" src="../procesosJS/validateLogin.js"></script>

  </body>
</html>
