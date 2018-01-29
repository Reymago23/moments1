<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <title>Moments</title>
  </head>
  <body>

     <header>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
          <a href="index.php" class="navbar-brand mb-0 h1">Moments</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar"
             aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbar" class="collapse navbar-collapse">
              <div class="navbar-nav mr-auto">
                  <a href="index.php" class="nav-item nav-link active">Inicio</a>
              </div>
              <form class="form-inline">
                  <input type="search" class="form-control mr-sm-2" maxlength="50" placeholder="search" aria-label="Search">
                  <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
              </form>
          </div>
      </nav>
     </header>

      <main role="main">
          <section class="jumbotron jumbotron-fluid py-6">
              <div class="container">
                  <h1 class="display-2">Moments</h1>
                  <p class="lead text-default">
                    Por esos momentos que nos hacen sentir vivos, por esas personas que nos alegran el dia,
                    por la buena comida, comparte con el mundo tu alegria!.
                  </p>
                  <a href="pages/login.php" class="btn btn-success">Entrar a cuenta</a>
                  <a href="pages/register.php" class="btn btn-primary">Crear una cuenta</a>
              </div>
          </section>

          <div class="container">
              <h1 class="display-4">Posts recientes</h1>
              <hr class="mt-0 mb-4">
              <div class="row">
                <?php
                  for($i = 0; $i < 5; $i++){

                       echo '<div class="container col-md-8">
                                <img class="img-fluid" src="imgs/pic1.jpeg" alt="Responsive Image">
                                <h2 class="display-4">Want some fruit?</h2>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Odit mollitia natus nesciunt, modi ipsam possimus delectus magnam adipisci,
                                reprehenderit sit vero beatae voluptates sunt eaque? Iusto laudantium necessitatibus
                                quam, culpa!...</p>
                                <p class="text-muted mb-1">posted by Reymago on 15 ene 2018.</p>
                                <hr class="mt-0 mb-4">
                            </div>';
                    }
                ?>
             </div>
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
