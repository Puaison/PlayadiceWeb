<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Resources/assets/css/nucleo-icons.css" type="text/css">
  <title>Catalogo</title>
</head>

<body class="">

{user->getUsername assign='Username'}
{user->getModeratore assign='Tipo'}

<!-- Navbar here -->
{include file="navbar.tpl"}
<!-- Sezione Ricerca here -->
<div class="container-fluid" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg); min-height: 1500px;  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">

  <br>

  <div class="container-fluid">
    <div class="row justify-content-center" style=" margin-bottom: 15px ">
      <div class="col-sm-8 align-self-center" >
        <!-- FORM -->
        <form method="post" id="Ricercaform" action="searchGioco">
          <div class="row">
            <label for="Parametro" style="color: white; margin-left: 4px; margin-right: 4px">Parametro:</label><br>
            <input type="text" id="Parametro" name="Parametro">
            <label for="Tipo" style="color: white; margin-left: 8px; margin-right: 4px">Scegli un tipo di ricerca:</label>
            <select id="Tipo" name="TipoRicerca" form="Ricercaform">
              <option value="Nome">Nome</option>
              <option value="Categoria">Categoria</option>
            </select>
            <button class="btn btn-primary"  style="margin-left: 4px; margin-right: 4px" > Cerca </button>
          </div>
        </form>

      </div>
      {if $Tipo}
      <div class="col-md-2">
        <a class="btn-primary btn" href="/playadice/catalogo/newgioco">Crea Nuovo</a>
      </div>
      {/if}
    </div>
  </div>
  <!-- Catalogo -->

  {if $results}

    <div class="row pi-draggable">
      <div class="col-md-2 " style="Text-align:center">
        <p style="color:White;">Nome</p>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <p style="color:White;">Rate</p>
      </div>
      <div class="col-md-2" style="Text-align:center">
        <p style="color:White;">Categoria</p>
      </div>
    </div>

    {section name=k loop=$results}

      <div class="container-fluid" style="background: black;height: 2px"></div>

      <div class="row pi-draggable" style=" margin-bottom: 10px ; margin-top: 10px ">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">{$results[k]->getNome()}</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">{if $results[k]->getVotoMedio()==0}Ancora nessun voto{else} {$results[k]->getVotoMedio()|string_format:"%.2f" }{/if}</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">{$results[k]->getCategoria()}</p>
        </div>
        <div class="col-md-2">
          <a class="btn-primary btn" href="/playadice/giocoinfo/showgiocoinfo?{$results[k]->getId()}">Visualizza dettagli</a>
        </div>
        {if $Tipo}
        <div class="col-md-2">
          <a class="btn-primary btn" href="/playadice/catalogo/removegioco?{$results[k]->getId()}">Elimina</a>
        </div>
        {/if}
      </div>
    {/section}
    {else}
    <div class="col-md-2" style="Text-align:center">
      <p style="color:White;">NESSUN RISULTATO</p>
    </div>
  {/if}
  <!-- Fine Sezione -->
  <br>
  <br>
</div>
<!-- Sezione Our Team -->

</body>

</html>