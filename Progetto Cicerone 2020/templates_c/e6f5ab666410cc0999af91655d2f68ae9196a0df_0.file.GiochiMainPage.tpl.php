<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-23 19:09:40
  from 'C:\xampp\htdocs\Progetto Web\Progetto Cicerone 2020\templates\GiochiMainPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef23754409f33_86470069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6f5ab666410cc0999af91655d2f68ae9196a0df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Progetto Web\\Progetto Cicerone 2020\\templates\\GiochiMainPage.tpl',
      1 => 1592932175,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5ef23754409f33_86470069 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
  <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>Catalogo</title>
</head>

<body class="">
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <!-- Sezione Ricerca here -->
  <div class="column" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container" style="background-color:#E3E3E3">
      <form method="post" id="Ricercaform">
        <div class="row">
          <label for="Parametro">Parametro:</label><br>
          <input type="text" id="Parametro" name="Parametro">
          <label for="Tipo">Scegli un tipo di ricerca:</label>
          <select id="Tipo" name="TipoRicerca" form="carform">
            <option value="Nome">Nome</option>
            <option value="Categoria">Categoria</option>
            <option value="Altro">Altro</option>
          </select>
          <button> Cerca </button>
        </div>
      </form>
    </div>
    <!-- Sezione I miei PG here -->
    <a class="row pi-draggable">
      <div class="col-md-2" >
        <p style="color:White;">Nome</p>
      </div>
      <div class="col-md-2" >
        <p style="color:White;">Rate</p>
      </div>
        <div class="col-md-2" >
          <p style="color:White;">Categoria</p>
        </div>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'gioco');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gioco']->value) {
?>

        <a class="btn btn-primary text-dark container">
          <div class="row pi-draggable" draggable="true">
            <div class="col-md-2">
              <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getNome();?>
</p> </div>
            <div class="col-md-2"> <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['gioco']->value->getVotoMedio();?>
</p> </div>
            <div class="col-md-2">  <p style="color:White; text-align: center"><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getCategoria();?>
</p> </div>
          </div>

        </a>


      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


    </div>
    <!-- Fine Sezione -->
    <br>

    <!-- Fine Sezione -->
  </div>
  <!-- Sezione Our Team -->
</body>

</html><?php }
}
