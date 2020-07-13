<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Resources/assets/css/nucleo-icons.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <title>Dettagli Avatar</title>

  <style>
    .grid-container {
      display: grid;
      grid-template-columns: auto;
      padding: 5px;
    }
    .grid-item {
      border: 1px solid rgba(0, 0, 0, 0.8);
      padding: 10px;
      font-size: 20px;
      text-align: justify-all;
    }
  </style>

</head>

<body class="">

{user->getUsername assign='Username'}
  <!-- Navbar here -->
  {include file="navbar.tpl"}

  <div class="column" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .25), rgba(0, 0, 0, .25)), url('../Resources/assets/BG.png'); background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat; min-height: 1000px">
    <!-- Sezione Dettagli pg -->
    <div class="grid-container">

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Nome : {$avatar->getNome()} </p>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Classe : {$avatar->getClasse()}</p>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Livello : {$avatar->getLivello()}</p>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Razza : {$avatar->getRazza()}</p>
        </div>

    </div>

      <br>
      <br>

      <div class="justify-content-around" style="text-align: center"  >
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/modify?{$avatar->getId()}" style="width: 30%; margin-left: 20px;margin-right: 20px;">Modifica</a>
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/delete?{$avatar->getId()}" style="width: 30%; margin-left: 20px;margin-right: 20px;">Elimina</a>
      </div>

      <br>
      <br>
   </div>


</body>

</html>