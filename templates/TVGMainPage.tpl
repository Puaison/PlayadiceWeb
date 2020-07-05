<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
  <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>TVG Home</title>
</head>

<body class="">

{user->getUsername assign='Username'}

  <!-- Navbar here -->
  {include file="navbar.tpl"}

<!-- Alert-->
{if $notify != "NoNotify" }
  <div class="alert alert-warning">
    <strong>Attenzione!</strong><br> {$notify} </div>
{/if}

  <!-- Sezione Ricerca here -->
  <div class="column" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container" style="background-color:#E3E3E3">

      <!-- FORM -->
      <form method="post" id="Ricercaform" action="search">
        <div class="row">
          <label for="Parametro">Parametro:</label><br>
          <input type="text" id="Parametro" name="Parametro">
          <label for="Tipo">Scegli un tipo di ricerca:</label>
          <select id="Tipo" name="TipoRicerca" form="Ricercaform">
            <option value="Nome">Nome</option>
            <option value="Autore">Autore</option>
          </select>
          <button href="/playadice/ricerca/Search" > Cerca </button>
        </div>
      </form

      <!-- Sezione I miei PG here -->
      <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/create"> New </a>

    </div>
    <!-- Sezione I miei PG here -->

    {if $results}

    <div class="row pi-draggable">
      <div class="col-md-2 " style="Text-align:center">
        <p style="color:White;">Nome</p>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <p style="color:White;">Classe</p>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <p style="color:White;">Livello</p>
      </div>
    </div>

    {section name=k loop=$results}
    <div class="row pi-draggable">
      <div class="col-md-2" style="Text-align:center">
        <p style="color:White;">{$results[k]->getNome()}</p>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <p style="color:White;">{$results[k]->getClasse()}</p>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <p style="color:White;">{$results[k]->getLivello()}</p>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/details?{$results[k]->getId()}">Details</a>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/modify?{$results[k]->getId()}">Modifica</a>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/delete?{$results[k]->getId()}">Elimina</a>
      </div>
    </div>
    {/section}
    {/if}

    <!-- Sezione PG In attesa di approvazione here -->
    {if $UtenteType eq 'admin'}
    <div class="row pi-draggable">
      <div class="col-md-3" style="Text-align:center">
        <p style="color:White;">Nome</p>
      </div>
      <div class="col-md-3" style="Text-align:center">
        <p style="color:White;">Classe</p>
      </div>
      <div class="col-md-3" style="Text-align:center">
        <p style="color:White;">Livello</p>
      </div>
      <div class="col-md-3" style="Text-align:center">
        <button> Dettagli Approvazione </button>
      </div>
    </div>
    {/if}
    <!-- Fine Sezione -->
  </div>
  <!-- Sezione Our Team -->

</body>

</html>