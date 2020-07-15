<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
  <title>TVG Home</title>
</head>

<body>
{user->getUsername assign='Username'}

<!-- Navbar here -->
{include file="navbar.tpl"}

<!-- Sezione Ricerca here -->
<div class="container-fluid" draggable="false" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat; min-height: 1000px">

  <div class="container-fluid">

    <br>

    <div class="row justify-content-center" style="margin-bottom: 15px ">
      <div class="col-sm-8 align-self-center"  >
        <!-- FORM -->
        <form method="post" id="RicercaUtenti">

          <div class="row">

            <label for="Parametro" style="color: white; margin-left: 4px; margin-right: 4px">Username : </label><br>
              <input type="text" id="Parametro" name="Parametro">

            <button class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/admin/openAdminPanel" style="margin-left: 4px; margin-right: 4px" > Cerca </button>

          </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Sezione Utenti here -->
  {if $results}
    <div class="container-fluid">

      <div class="container-fluid" style="background: black;height: 2px"></div>

      <div class="row justify-content-around" style=" margin-bottom: 5px">
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke">Username:</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke">Nome:</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke">Cognome:</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke">Email:</span>
        </div>
        <div class="col" style="Text-align:center"></div>
        <div class="col" style="Text-align:center"></div>
      </div>

      {section name=k loop=$results}
        <div class="container-fluid" style="background: black;height: 2px"></div>

        <div class="row justify-content-around" style=" margin-top: 15px; margin-bottom: 15px ">
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke">{$results[k]->GetUsername()}</span>
          </div>
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke">{$results[k]->getNome()}</span>
          </div>
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke">{$results[k]->GetCognome()}</span>
          </div>
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke">{$results[k]->GetMail()}</span>
          </div>
          <div class="col" style="Text-align:center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/admin/Ban?{$results[k]->GetUsername()}">BanHammer</a>
          </div>

          {if $results[k]->getModeratore()}
          <div class="col" style="Text-align:center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/admin/RevocaAdmin?{$results[k]->GetUsername()}">Revoca Privilegi</a>
          </div>
          {else}
          <div class="col" style="Text-align:center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/admin/RendiAdmin?{$results[k]->GetUsername()}">Rendi Admin</a>
          </div>
          {/if}

        </div>

      {/section}

      <div class="container-fluid" style="background: black;height: 2px"></div>
    </div>
  {/if}

  <br>
</div>

</body>

</html>