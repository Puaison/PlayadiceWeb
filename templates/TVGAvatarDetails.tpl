<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
</head>

<body class="">

{user->getUsername assign='Username'}
  <!-- Navbar here -->
  {include file="navbar.tpl"}
  <!-- Sezione Ricerca here -->
  <div class="column" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <!-- Sezione I miei PG here -->
    <div class="row pi-draggable" draggable="true">
      <div class="column pi-draggable" draggable="true">
        <div class="col-md-2 align-items-end">
          <p style="color:White;">Nome:{$avatar->getNome()} </p>
        </div>
        <div class="col-md-2">
          <p style="color:White;">Classe:{$avatar->getClasse()}</p>
        </div>
        <div class="col-md-2">
          <p style="color:White;">Livello:{$avatar->getLivello()}</p>
        </div>
        <div class="col-md-2">
          <p style="color:White;">Razza:{$avatar->getRazza()}</p>
        </div>

        <div class="col-md-2">
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/modify?{$avatar->getId()}">Modifica</a>
        </div>
        <div class="col-md-2">
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/delete?{$avatar->getId()}">Elimina</a>
        </div>

      </div>


      </div>

  </div>
</body>

</html>