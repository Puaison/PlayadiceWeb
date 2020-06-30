<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-23 16:51:07
  from 'D:\XAMPP2\htdocs\Cicero\Progetto Cicerone 2020\templates\TVGAvatarModify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef216db0d5795_89674206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68119b6ba005341cc948d40431e5deb141e8d7c9' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\Cicero\\Progetto Cicerone 2020\\templates\\TVGAvatarModify.tpl',
      1 => 1592923866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5ef216db0d5795_89674206 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '6804171345ef216db0d4709_05280009';
?>
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
  <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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

</html><?php }
}
