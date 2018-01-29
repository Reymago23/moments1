<?php

    session_start();
    include('../procesosPHP/connection.php');


    if(!empty($_SESSION['email'])){

        $email = $_SESSION['email'];

        $auth_code = bin2hex(openssl_random_pseudo_bytes(16));

        $sql = "INSERT INTO tbl_resetPW(email, auth_code, code_status)
        VALUES('$email', '$auth_code', 'pending')";

        $resultSet = mysqli_query($con, $sql);

        if(!$resultSet){

            $error = 'ERROR: no se pudo enviar el correo.';
        }


        if(mysqli_affected_rows($con) == 1){

            $message = "Recuperar contraseña.\r\nPara poder crear una nueva contraseña da click en el enlace.\r\n
                /pages/resetPw.php?email=$email&auth_code=$auth_code";

            $message = wordwrap($message, 70, "\r\n");
            $emailSentSuccess = mail($email,'Recuperar contraseña', $message, 'From: donotreply@moments.com');
        }


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
                                Recuperar contraseña
                            </a>
                        </li>
                    </ul>
                </div>
          </nav>
      </header>


    <main>
        <div class="container col-sm-10 col-md-10 col-lg-8 col-xl-6 text-center">

            <?php

                if($emailSentSuccess){

                    echo '<h1 class="display-4 text-success mt-4">Mensaje Enviado!</h1>
                            <hr>
                            <p class="lead mb-4">
                                Revisa tu correo '. $email .' y da click en el enlace que te hemos enviado.
                            </p>

                            <p>
                                <a href="../index.php" class="btn btn-success btn-lg mt-4">
                                    Regresar
                                </a>
                            </p>';
                }else{

                    echo '<h1 class="display-4 text-success mt-4">'. $error .' </h1>
                            <hr>
                            <p class="lead mb-4">
                                Lo sentimos pero ha ocurrido un error, por favor intente mas tarde.
                            </p>

                            <p>
                                <a href="../index.php" class="btn btn-primary btn-lg mt-4">
                                    Inicio
                                </a>
                            </p>';
                }


            ?>

        </div>

        <?php

            session_unset();

            session_destroy();

        ?>

    </main>

   <div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </div>
  </body>
</html>
