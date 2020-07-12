<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-12 13:35:28
  from 'C:\xampp\htdocs\playadice\templates\AdminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0af580097306_72764772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bb2057823f560a232a0b1512bb321680b85b53e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\AdminPanel.tpl',
      1 => 1594553208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0af580097306_72764772 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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

<body>
<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
  <?php if ($_smarty_tpl->tpl_vars['results']->value) {?>
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
      </div>

      <?php
$__section_k_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_k_0_total = $__section_k_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_0_total !== 0) {
for ($__section_k_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_0_iteration <= $__section_k_0_total; $__section_k_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
        <div class="container-fluid" style="background: black;height: 2px"></div>

        <div class="row justify-content-around" style=" margin-top: 15px; margin-bottom: 15px ">
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->GetUsername();?>
</span>
          </div>
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getNome();?>
</span>
          </div>
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->GetCognome();?>
</span>
          </div>
          <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->GetMail();?>
</span>
          </div>
          <div class="col" style="Text-align:center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/admin/Ban?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->GetUsername();?>
">BanHammer</a>
          </div>
        </div>

      <?php
}
}
?>

      <div class="container-fluid" style="background: black;height: 2px"></div>
    </div>
  <?php }?>

  <br>
</div>

</body>

</html><?php }
}
