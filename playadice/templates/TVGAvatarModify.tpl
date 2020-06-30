<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
  <link rel="stylesheet" href="now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="assets/css/nucleo-icons.css" type="text/css">
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>Html Test</title>
</head>

<body class="">
  <!-- Navbar here -->
  {include file="navbar.tpl"}
  <!-- Sezione Ricerca here -->
  <div class="column" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <!-- Sezionee -->
    <form method="post" id="ModifyAvatarForm">
      <div class="row pi-draggable" draggable="true">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">Old Nome:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">New Nome:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <input type="text" id="Nome" name="Nome">
        </div>
      </div>
      <div class="row pi-draggable" draggable="true">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">Old Razza:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">New Razza:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <input type="text" id="Razza" name="Razza">
        </div>
      </div>
      <div class="row pi-draggable" draggable="true">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">Old Classe:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">New Classe:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <input type="text" id="Classe" name="Classe">
        </div>
      </div>
      <div class="row pi-draggable" draggable="true">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">Old Livello:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">New Livello:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <input type="text" id="Nome" name="Nome">
        </div>
      </div>
      <button> Invia dati </button>
    </form>
  </div>
  <!-- Sezione Our Team -->
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 20px;right:20px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:220px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"></pingendo>
</body>

</html>