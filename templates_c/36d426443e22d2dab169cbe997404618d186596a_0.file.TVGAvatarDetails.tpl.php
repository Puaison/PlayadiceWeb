<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 12:21:53
  from 'C:\xampp\htdocs\playadice\templates\TVGAvatarDetails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0992c141a758_65203150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36d426443e22d2dab169cbe997404618d186596a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\TVGAvatarDetails.tpl',
      1 => 1594458070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0992c141a758_65203150 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

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

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>

  <!-- Navbar here -->
  <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="column" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <!-- Sezione Dettagli pg -->
    <div class="grid-container">

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Nome : <?php echo $_smarty_tpl->tpl_vars['avatar']->value->getNome();?>
 </p>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Classe : <?php echo $_smarty_tpl->tpl_vars['avatar']->value->getClasse();?>
</p>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Livello : <?php echo $_smarty_tpl->tpl_vars['avatar']->value->getLivello();?>
</p>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Razza : <?php echo $_smarty_tpl->tpl_vars['avatar']->value->getRazza();?>
</p>
        </div>

    </div>

      <br>
      <br>

      <div class="justify-content-around" style="text-align: center"  >
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/modify?<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getId();?>
" style="width: 30%; margin-left: 20px;margin-right: 20px;">Modifica</a>
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/delete?<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getId();?>
" style="width: 30%; margin-left: 20px;margin-right: 20px;">Elimina</a>
      </div>

      <br>
      <br>
   </div>


</body>

</html><?php }
}
