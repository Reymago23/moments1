<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/animate.css">

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
                  <a href="register.php" class="nav-item nav-link active">Crear cuenta</a>
              </div>
          </div>
      </nav>
     </header>

     <main>
          <div class="container mt-5 col-md-6 col-lg-6">
              <h3 class="font-weight-light">Crear una cuenta</h3>
              <hr class="mt-0 mb-4">
              <div id="unable-to-register" class="alert alert-danger d-none">
                             ERROR! de sistema, la registración falló,
                             por favor intente más tarde.

              </div>
              <form id="needs-validation" novalidate>

                 <div class="form-group">
                      <label for="r_name" class="sr-only">Name</label>
                      <label for="r_name">Nombre</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text">
                                  <span class="fa fa-user-o text-info" aria-hidden="true"></span>
                              </div>
                          </div>
                          <input required
                              autofocus
                              autocomplete="name"
                              id="r_name"
                              title="Por favor ingrese su nombre completo."
                              name="r_name"
                              type="text"
                              class="form-control"
                              placeholder="Nombre Completo"
                              maxlength="45" >

                          <div class="invalid-feedback">
                              Por favor ingrese su nombre completo.
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="r_email" class="sr-only">Email</label>
                      <label for="r_email">Correo electrónico</label>
                      <div class="input-group">
                         <div class="input-group-prepend">
                             <div class="input-group-text">
                                 <span class="fa fa-envelope-o text-info" aria-hidden="true"></span>
                             </div>
                         </div>
                         <input required
                             autocomplete="email"
                             pattern="^[\w.%\+-]+@[\w.-]+\.[a-zA-Z]{2,}$"
                             type="email"
                             id="r_email"
                             name="r_email"
                             class="form-control"
                             placeholder="email@email.com"
                             maxlength="60">

                         <div id="email_fb" class="invalid-feedback">
                             Por favor ingrese su correo electrónico.
                         </div>
                      </div>
                          <small id="email-valid-message" class="form-text text-success d-none animated">
                          Su correo esta disponible, <strong>Estupendo!</strong>
                          </small>
                  </div>

                  <div class="form-group">
                      <label for="r_pass" class="sr-only">Password</label>
                      <label for="r_pass">Contraseña</label>
                      <div class="input-group">
                         <div class="input-group-prepend">
                             <div class="input-group-text">
                                 <span class="fa fa-key text-info" aria-hidden="true"></span>
                             </div>
                         </div>
                         <input required
                             pattern=".{6,}"
                             autocomplete="new-password"
                             type="password"
                             id="r_pass"
                             name="r_pass"
                             class="form-control"
                             placeholder="Contraseña"
                             maxlength="60">

                          <div id="pass_fb" class="invalid-feedback">
                              Por favor ingrese una contraseña.
                          </div>
                      </div>
                      <small class="form-text text-muted">
                          minimo 6 caracteres, considere crear una contraseña segura.
                      </small>
                  </div>

                  <div class="form-group">
                      <label for="r_c_pass" class="sr-only">Confirm password</label>
                      <label for="r_c_pass">Confirmar contraseña</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                             <div class="input-group-text">
                                 <span class="fa fa-key text-info" aria-hidden="true"></span>
                             </div>
                         </div>
                         <input required
                             pattern=".{6,}"
                             autocomplete="new-password"
                             type="password"
                             id="r_c_pass"
                             title="Por favor confirme su contraseña. asegurece que sean iguales."
                             name="r_c_pass"
                             class="form-control"
                             placeholder="Confirmar contraseña"
                             maxlength="60">
                        <div id="c_pass_fb" class="invalid-feedback">
                            Por favor confirme su contraseña.
                        </div>
                      </div>
                  </div>

<!--   DATA OF BIRTH AND GENDER AND APPEND ICON AND CUSTOM FILE UPLOAD
                  <div class="form-group">
                      <label for="r_bd">Fecha de nacimiento</label>
                      <input required type="date" id="r_bd" name="r_bd" class="form-control" data-provide="datepicker">
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-2">Genero</div>
                      <div class="col-sm-10">
                          <div class="form-check form-check-inline">
                              <input required type="radio" class="form-check-input" name="r_m" id="r_m" value="M">
                              <label for="r_m" class="form-check-label">Masculino</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input required type="radio" class="form-check-input" name="r_f" id="r_f" value="F">
                              <label for="r_f" class="form-check-label">Femenino</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="r_name" class="sr-only">Name</label>
                      <label for="r_name">Nombre</label>
                      <div class="input-group">
                          <input required autofocus autocomplete="name" id="r_name" name="r_name" type="text" class="form-control"
                          placeholder="Nombre completo" maxlength="60" >
                          <div class="input-group-append">
                              <div class="input-group-text"><span class="fa fa-check text-success" aria-hidden="true"></span></div>
                          </div>
                          <div class="invalid-feedback">Por favor ingrese su nombre completo.</div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="customFile">Foto de perfil</label>
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>


                  <div class="form-group">
                      <label for="r_profile_pic">Foto de perfil</label>
                      <input type="file" id="r_profile_pic" class="form-control-file">
                  </div>
-->
                  <p>
                      <button
                          type="submit" class="btn btn-primary mt-4 col-xs-3 col-sm-4 col-md-5 col-lg-4">
                          Crear cuenta
                      </button>
                      <a href="login.php"
                          class="btn btn-outline-success mt-4 col-xs-3 col-sm-4 col-md-5 col-lg-4 float-right">
                          Ya tengo cuenta!
                      </a>
                  </p>
              </form>
          </div>

      </main>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </div>
    <script src="../procesosJS/validateRegister.js"></script>


  </body>
</html>
