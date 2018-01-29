<?php

    session_start();

    include('../procesosPHP/connection.php');

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
    <title>Confirmar correo</title>
  </head>
  <body>

     <header>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
          <a href="../index.php" class="navbar-brand mb-0 h1">Moments</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar"
             aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbar" class="collapse navbar-collapse text-center">
              <div class="navbar-nav mr-auto">
                  <a href="#" class="nav-item nav-link active">Confirmación</a>
              </div>
          </div>
      </nav>
     </header>

         <main role="main">
           <div class="container my-4">

              <?php

                if(!isset($_GET['email']) && !isset($_GET['key'])){

                    echo '<div class="alert alert-danger">ERROR: No podemos continuar con la activacion,
                            asegurece de dar click al enlace en su correo<div>';

                    exit;
                }else{

                    $emailFromURL = mysqli_real_escape_string($con, $_GET['email']);
                    $activationCode = mysqli_real_escape_string($con, $_GET['key']);

                    $_SESSION['email'] = $emailFromURL;

                    $sql = "SELECT * FROM tbl_users WHERE email = '$emailFromURL'
                            AND activation_code = '$activationCode' AND status = 'active' LIMIT 1";

                    $result = mysqli_query($con, $sql);

                    if(mysqli_affected_rows($con) == 1){

                        echo '
                              <h1 class="display-4 text-success">Su cuenta ya esta activada!</h1> <hr>
                              <p id="error-div" class="lead my-4 mb-0 text-info">
                               Usted habia completado el proceso anteriormente! puede entrar a su cuenta cuando guste.
                              </p>

                            <a href="/pages/login.php" class="btn btn-success my-2 col-sm-3 my-1">Entrar ya</a>';
                        exit;
                    }

                    $sql = "SELECT * FROM tbl_users WHERE email = '$emailFromURL'
                            AND activation_code = '$activationCode' AND status = 'pending' LIMIT 1";

                    $result = mysqli_query($con, $sql);

                    if(!$result){
                        echo '<div class="alert alert-danger">2: ERROR: no se pudo realizar la consulta para saber si existe el correo y el codigo de confirmacion</div>';
                        exit;
                    }

                    if(mysqli_affected_rows($con) == 1){

                        $sql = "UPDATE tbl_users SET status = 'active' WHERE email = '$emailFromURL'
                                AND activation_code = '$activationCode' AND status = 'pending' LIMIT 1";

                        $result = mysqli_query($con, $sql);

                        if(!$result){
                            echo '<div class="alert alert-danger">3: ERROR: no se pudo activar la cuenta.</div>';
                            exit;
                        }

                        echo '<h1 class="display-4 text-success">Bienvenido a nuestra familia!</h1> <hr>';

                        echo '<p id="error-div" class="lead my-4 mb-0 text-info">
                               Completaste el proceso de activación exitosamente! ya puedes entrar a tu cuenta.
                              </p>

                            <a href="login.php" class="btn btn-success my-2 col-sm-3 my-1">Entrar</a>';

                    }else{

                            echo '<h1 class="display-4 mt-4 text-danger">ooh no!</h1><hr>';

                            echo '<div class="alert alert-danger">Ocurrio un ERROR, no pudimos encontrar
                                        una cuenta con el correo '. $emailFromURL .' y el codigo de activacion provehido.</div>';

                            echo '<div class="alert alert-secondary">Sugerencia: da click en el enlace que recibiste en el
                                    correo o vuelve a interlo mas tarde.<div>

                                    <a href="index.php" class="btn btn-primary my-2 col-sm-3 my-1">Inicio</a>';


                            exit;
                    }

                }


               session_unset();

               session_destroy();

               ?>

           </div>

        </main>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </div>

  </body>
</html>
