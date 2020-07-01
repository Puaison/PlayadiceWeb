<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-01 13:49:59
  from 'D:\XAMPP2\htdocs\playadice\templates\TVGAvatarModify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efc786787e1d9_25771386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef10af9caf3bd4cb697ebb0fdf71d897f3cd1867' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\playadice\\templates\\TVGAvatarModify.tpl',
      1 => 1593604199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5efc786787e1d9_25771386 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>

  <!-- Navbar here -->
  <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <!-- Sezione Ricerca here -->
  <div class="column" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <!-- Sezionee -->
    <form method="post" id="ModifyAvatarForm">
      <div class="row pi-draggable" draggable="true">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">Old Nome:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getNome();?>
</p>
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
          <p style="color:White;">Old Razza:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getRazza();?>
</p>
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
          <p style="color:White;">Old Classe:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getClasse();?>
</p>
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
          <p style="color:White;">Old Livello:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getLivello();?>
</p>
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
</body>

</html><?php }
}
