<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-08 11:06:06
  from 'C:\xampp\htdocs\playadice\templates\TVGAvatarModify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f058c7eb1aea7_38948769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ab602ff3ca0c9654a9cd0f4953adf4333fd6b85' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\TVGAvatarModify.tpl',
      1 => 1593938897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f058c7eb1aea7_38948769 (Smarty_Internal_Template $_smarty_tpl) {
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

  <div class="column" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <!-- Sezione FORM -->
    <form method="post" id="ModifyAvatarForm" action="submitchanges?<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getId();?>
">
      <div class="row pi-draggable" draggable="true">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">Old Nome:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getNome();?>
</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;">New Nome:</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <input type="text" id="nome" name="nome">
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
          <input type="text" id="razza" name="razza">
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
          <input type="text" id="classe" name="classe">
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
          <input type="text" id="livello" name="livello">
        </div>
      </div>
      <button type="submit" href="/playadice/avatar/submitchanges?<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getId();?>
"> Modifica </button>
    </form>
  </div>
</body>

</html><?php }
}
