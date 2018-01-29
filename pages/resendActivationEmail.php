<?php

    session_start();

    include('../procesosPHP/connection.php');

    $userEmail = '';
    $sentSuccess = false;


    $error = 'ocurrio un ERROR y no pudimos enviar tu correo de activacion, por favor intenta mas tarde';

    if(!empty($_SESSION['resendActivationEmail'])){

        $userEmail = $_SESSION['resendActivationEmail'];

        $userEmail = mysqli_real_escape_string($con, $userEmail);
        $name = mysqli_real_escape_string($con, $_SESSION['name']);

        $key = bin2hex(openssl_random_pseudo_bytes(16));


        $sql = "UPDATE tbl_users SET activation_code = '$key' WHERE email = '$userEmail' AND
                name = '$name'";

        $result = mysqli_query($con, $sql);

        if(!$result){

            echo $error;
            exit;
        }

        $rowsAffected = mysqli_affected_rows($con);

        if($rowsAffected == 1){

            $message = $name . " Activa tu cuenta!, \nEn hora buena, para activar tu cuenta solo debes de dar click en el enlace en este correo.\n\n";
            $message .= "confirmEmail.php?email=".urlencode($userEmail)."&key=".$key;
            $headers = "From: donotreply@moments.com";
            $title = "Por favor active su cuenta";

            $sentEmail = mail($userEmail, $title,  $message, $headers);

            if($sentEmail){

                $sentSuccess = true;
            }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Reenviar correo</title>
  </head>
  <body>

     <header>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
          <a href="moments1" class="navbar-brand mb-0 h1">Moments</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar"
             aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbar" class="collapse navbar-collapse text-center">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a href="#" class="nav-link active">Reenviar correo</a>
                 </li>
             </ul>
             <span class="navbar-text pr-2">Hola <?php echo $_SESSION['name']?>! </span>
          </div>
      </nav>
     </header>

    <main role="main">
       <div class="container mt-4">
           <h1 class="display-4 text-info">

               <?php

                    if($sentSuccess){

                        echo 'Mensaje enviado!';
                    }else{

                        echo $error;
                    }
                ?>!
            </h1>
           <hr>
           <p class="lead mt-4 mb-0 text-info">
               Hemos enviado un correo de activación a
                   <strong class="text-primary">
                       <?php echo $userEmail; ?>
                   </strong>
           </p>
           <p class="lead mb-4 mt-0 text-info">
               para poder ingresar a su cuenta debe de dar click al enlace de activación que hemos incluido para usted.
           </p>

               <a href="../index.php" class="btn btn-primary col-sm-3 my-1 mr-2">ir a Inicio</a>
               <a href="login.php" class="btn btn-success col-sm-3 my-1">Entrar a cuenta</a>
       </div>

    </main>

    <?php

        /* REMOVES ALL SESSION VARIABLES */
        session_unset();

        /* DESTROYS THE SESSION ITSELF */
        session_destroy();
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </div>

  </body>
</html>



