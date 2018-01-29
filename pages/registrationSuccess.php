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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Confirmar correo</title>
  </head>
  <body>

     <header>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
          <a href="moments1/index.php" class="navbar-brand mb-0 h1">Moments</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar"
             aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbar" class="collapse navbar-collapse text-center">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a href="#" class="nav-link active">Registración exitosa</a>
                 </li>
             </ul>
             <span class="navbar-text pr-2">Bienvenido <?php echo $_SESSION['name']?>! </span>
          </div>
      </nav>
     </header>

    <main role="main">
       <div class="container mt-4">
           <h1 class="display-4 text-success">Gracias por registrarse <?php echo $_SESSION['name']?>!</h1>
           <hr>
           <p class="lead mt-4 mb-0 text-info">
               Hemos enviado un correo de activación a
                   <strong class="text-primary">
                       <?php echo $_SESSION['email'] ?>
                   </strong>
           </p>
           <p class="lead mb-4 mt-0 text-info">
               para poder ingresar a su cuenta debe de dar click al enlace de activación que le hemos enviado.
           </p>

               <a href="moments1/index.php" class="btn btn-primary col-sm-3 my-1 mr-2">ir a Inicio</a>
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
