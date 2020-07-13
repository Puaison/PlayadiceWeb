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
  <title>TWG Home</title>
</head>

<body>
{user->getUsername assign='Username'}

  <!-- Navbar here -->
{include file="navbar.tpl"}

<!-- Alert-->
{if $notify != "NoNotify" }
  <div class="alert alert-warning">
    <strong>Attenzione!</strong><br> {$notify}
  </div>
{/if}

  <!-- Sezione Ricerca here -->
<div class="container-fluid" draggable="false" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .25), rgba(0, 0, 0, .25)), url('../templates/assets/BG.png'); background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat; min-height: 1000px">

  <div class="container-fluid">

    <br>

    <div class="row justify-content-center" style="margin-bottom: 15px ">
      <div class="col-sm-8 align-self-center"  >
        <!-- FORM -->
        <form method="post" id="Ricercaform" action="search">
          <div class="row">
            <label for="Parametro" style="color: white; margin-left: 4px; margin-right: 4px">Parametro:</label><br>
            <input type="text" id="Parametro" name="Parametro">
            <label for="Tipo" style="color: white; margin-left: 8px; margin-right: 4px">Scegli un tipo di ricerca:</label>
            <select id="Tipo" name="TipoRicerca" form="Ricercaform">
              <option value="Nome">Nome</option>
              <option value="Autore">Autore</option>
            </select>
            <button class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/ricerca/Search" style="margin-left: 4px; margin-right: 4px" > Cerca </button>
          </div>
        </form>
      </div>

      <div>
        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/create" style=" margin-top: 5px; margin-bottom: 5px "> Crea un Nuovo Personaggio </a>
      </div>

      {if $UtenteType eq 'admin'}
        <div>
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/ricerca/SearchAll" style=" margin-top: 5px; margin-bottom: 5px "> VediTutti </a>
        </div>
      {/if}

    </div>
  </div>

  <!-- Sezione I miei PG here -->
  {if $results}
  <div class="container-fluid">

    <div class="container-fluid" style="background: black;height: 2px"></div>

    <div class="row justify-content-around" style=" margin-bottom: 5px">
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Proprietario:</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Nome:</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Classe:</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Livello:</span>
      </div>
      <div class="col" style="Text-align:center"></div>
      <div class="col" style="Text-align:center"></div>
      <div class="col" style="Text-align:center"></div>
    </div>

    {section name=k loop=$results}
    <div class="container-fluid" style="background: black;height: 2px"></div>

    <div class="row justify-content-around" style=" margin-top: 15px; margin-bottom: 15px ">
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">{$results[k]->GetProprietario()->GetUsername()}</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">{$results[k]->getNome()}</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">{$results[k]->getClasse()}</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">{$results[k]->getLivello()}</span>
      </div>
      <div class="col" style="Text-align:center">        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/details?{$results[k]->getId()}">Dettagli</a></div>
      <div class="col" style="Text-align:center">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark {if $Username != $results[k]->GetProprietario()->GetUsername() && $UtenteType != 'admin'}disabled{/if}" href="/playadice/avatar/modify?{$results[k]->getId()}">Modifica</a>
      </div>
      <div class="col" style="Text-align:center">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark {if $Username != $results[k]->GetProprietario()->GetUsername() && $UtenteType != 'admin'}disabled{/if}" href="/playadice/avatar/delete?{$results[k]->getId()}">Elimina</a>
      </div>
    </div>
    {/section}
    <div class="container-fluid" style="background: black;height: 2px"></div>
  </div>
  {/if}

    <br>
    <br>
    <!-- Sezione PG In attesa di approvazione per admin here -->
    {if $UtenteType eq 'admin'}
    <div class="container-fluid">

      {foreach from=$proposte item=proposta}

        {if $proposta->getTipoProposta() == "Creazione"}
      <div class="row justify-content-around" style=" margin-bottom: 5px">
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke"> Creazione </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke"> {$proposta->getProposto()->GetProprietario()->GetUsername()} </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke"> {$proposta->getProposto()->getNome()} </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/vediproposta?{$proposta->getId()}"> Dettagli Approvazione </a>
        </div>
      </div>

        {/if}

        {if $proposta->getTipoProposta() == "Modifica"}

      <div class="row justify-content-around" style=" margin-bottom: 5px">
        <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"> Modifica </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke">{$proposta->getModificato()->GetProprietario()->GetUsername()}</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke">{$proposta->getModificato()->getNome()}</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/vediproposta?{$proposta->getId()}"> Dettagli Approvazione </a>
        </div>
      </div>

        {/if}

        {if $proposta->getTipoProposta() == "Cancellazione"}
      <div class="row justify-content-around" style=" margin-bottom: 5px">
        <div class="col justify-content-center align-self-center text-center">
             <span class="align-middle" style="color: whitesmoke"> Cancellazione </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
             <span class="align-middle" style="color: whitesmoke">{$proposta->getModificato()->GetProprietario()->GetUsername()}</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
             <span class="align-middle" style="color: whitesmoke">{$proposta->getModificato()->getNome()}</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/vediproposta?{$proposta->getId()}"> Dettagli Approvazione </a>
        </div>
      </div>

        {/if}
      {/foreach}

    </div>
    {/if}
    <!-- Fine Sezione -->
  <br>
  <br>
  <br>
</div>

</body>

</html>