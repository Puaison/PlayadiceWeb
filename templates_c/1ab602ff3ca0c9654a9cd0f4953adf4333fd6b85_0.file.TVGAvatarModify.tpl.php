<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 11:02:42
  from 'C:\xampp\htdocs\playadice\templates\TVGAvatarModify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0980329c57f9_75856790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ab602ff3ca0c9654a9cd0f4953adf4333fd6b85' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\TVGAvatarModify.tpl',
      1 => 1594458070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0980329c57f9_75856790 (Smarty_Internal_Template $_smarty_tpl) {
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

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>

  <!-- Navbar here -->
  <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="column" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <!-- Sezione FORM -->

    <form method="post" id="ModifyAvatarForm" action="submitchanges?<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getId();?>
">

      <div class="grid-container">

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Nome:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getNome();?>
</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Nome:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="text" id="nome" name="nome" value="<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getNome();?>
">
          <?php if (!$_smarty_tpl->tpl_vars['check']->value['Nome']) {?>
            <div class="alert alert-warning">
              <small >
                Nome troppo corto, lungo o contenente caratteri non ammessi
              </small>
            </div>
          <?php }?>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Razza:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getRazza();?>
</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Razza:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="text" id="razza" name="razza" value="<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getRazza();?>
">
          <?php if (!$_smarty_tpl->tpl_vars['check']->value['Razza']) {?>
            <div class="alert alert-warning">
              <small >
                Razza troppo corta, lunga o contenente caratteri non ammessi
              </small>
            </div>
          <?php }?>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Classe:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getClasse();?>
</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Classe:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="text" id="classe" name="classe" value="<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getClasse();?>
">
          <?php if (!$_smarty_tpl->tpl_vars['check']->value['Classe']) {?>
            <div class="alert alert-warning">
              <small >
                Classe troppo corta, lunga o contenente caratteri non ammessi
              </small>
            </div>
          <?php }?>
        </div>

        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">Old Livello:<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getLivello();?>
</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <p style="color:White;">New Livello:</p>
        </div>
        <div class="grid-item" style="Text-align:center">
          <input type="number" id="livello" name="livello" value="<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getLivello();?>
">
          <?php if (!$_smarty_tpl->tpl_vars['check']->value['Livello']) {?>
            <div class="alert alert-warning">
              <small >
                Livello al di fuori dei parametti ammessi
              </small>
            </div>
          <?php }?>
        </div>

      </div>

      <br>

      <div class="justify-content-center" style="text-align: center"  >
        <button style="width: 50% ; margin-left: 20px;margin-right: 20px;" type="submit" href="/playadice/avatar/submitchanges?<?php echo $_smarty_tpl->tpl_vars['avatar']->value->getId();?>
"> Modifica </button>
      </div>

    </form>

    <br>
    <br>

  </div>

</body>

</html><?php }
}
