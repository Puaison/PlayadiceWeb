<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-04 17:57:12
  from 'D:\XAMPP2\htdocs\playadice\templates\TVGAvatarCreate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f00a6d8930752_33429572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05411445f67775c2344a779f58cae77e86a657cc' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\playadice\\templates\\TVGAvatarCreate.tpl',
      1 => 1593878202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f00a6d8930752_33429572 (Smarty_Internal_Template $_smarty_tpl) {
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
    <form method="post" id="c_form-h" class="" action="submitnewavatar">
      <div class="py-5">
        <div class="container ">
          <div class="col-md-12">

            <div class="form-group row">
              <label for="nome-input" style="color:White;" class="col-2 col-form-label"><b>Nome Avatar</b></label>
              <div class="col-10">
                <input type="text" name="nome" class="form-control" placeholder="Inserisci qui il Testo">
              </div>
            </div>

            <div class="form-group row">
              <label for="classe-input" style="color:White;" class="col-2 col-form-label"><b>Classe Avatar</b></label>
              <div class="col-10">
                <input type="text" name="classe" class="form-control" placeholder="Inserisci qui il Testo">
              </div>
            </div>

            <div class="form-group row">
              <label for="razza-input" style="color:White;" class="col-2 col-form-label"><b>Razza Avatar</b></label>
              <div class="col-10">
                <input type="text" name="razza" class="form-control" placeholder="Inserisci qui il Testo">
              </div>
            </div>

            <div class="form-group row">
              <label for="livello-input" style="color:White;" class="col-2 col-form-label"><b>Livello Avatar</b></label>
              <div class="col-10">
                <input type="text" name="livello" class="form-control" placeholder="Inserisci qui il Testo">
              </div>
            </div>

            <div class="form-group row">
              <label for="checkbox input" style="color:White;" class="col-2 col-form-label"><b>Privato</b></label>
              <div class="pl-4 col-form-label align-content-center pt-3">
                <input type="checkbox" class="custom-checkbox" id="checkbox input" value="1" name="privato">
              </div>
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-primary " >Submit</button>
            </div>

          </div>
        </div>
      </div>
    </form>

  </div>
</body>

</html><?php }
}
