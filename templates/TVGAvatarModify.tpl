<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <title>Modifica Avatar</title>
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto;
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

  <div class="column" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .25), rgba(0, 0, 0, .25)), url('../templates/assets/BG.png'); background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat; min-height: 1000px">
    <!-- Sezione FORM -->

    <form method="post" id="ModifyAvatarForm" action="submitchanges?{$avatar->getId()}">

      <div class="grid-container">

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Nome:{$avatar->getNome()}</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Nome:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="text" id="nome" name="nome" value="{$avatar->getNome()}">
          {if ! $check.Nome}
            <div class="alert alert-warning">
              <small >
                Nome troppo corto, lungo o contenente caratteri non ammessi
              </small>
            </div>
          {/if}
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Razza:{$avatar->getRazza()}</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Razza:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="text" id="razza" name="razza" value="{$avatar->getRazza()}">
          {if ! $check.Razza}
            <div class="alert alert-warning">
              <small >
                Razza troppo corta, lunga o contenente caratteri non ammessi
              </small>
            </div>
          {/if}
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Classe:{$avatar->getClasse()}</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Classe:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="text" id="classe" name="classe" value="{$avatar->getClasse()}">
          {if ! $check.Classe}
            <div class="alert alert-warning">
              <small >
                Classe troppo corta, lunga o contenente caratteri non ammessi
              </small>
            </div>
          {/if}
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Livello:{$avatar->getLivello()}</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Livello:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="number" id="livello" name="livello" value="{$avatar->getLivello()}">
          {if ! $check.Livello}
            <div class="alert alert-warning">
              <small >
                Livello al di fuori dei parametti ammessi
              </small>
            </div>
          {/if}
        </div>

      </div>

      <br>

      <div class="justify-content-center" style="text-align: center"  >
        <button style="width: 50% ; margin-left: 20px;margin-right: 20px;" type="submit" class="btn btn-primary" href="/playadice/avatar/submitchanges?{$avatar->getId()}"> Modifica </button>
      </div>

    </form>

    <br>
    <br>

  </div>

</body>

</html>