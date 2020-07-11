<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 11:02:48
  from 'C:\xampp\htdocs\playadice\templates\GiochiMainPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f098038572699_21659775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96371ae495c63e61052ec983501c12d942d4f166' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\GiochiMainPage.tpl',
      1 => 1594026042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f098038572699_21659775 (Smarty_Internal_Template $_smarty_tpl) {
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
  <title>Catalogo</title>
</head>

<body class="">

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>

<?php $_smarty_tpl->assign('Tipo',$_smarty_tpl->smarty->registered_objects['user'][0]->getModeratore(array(),$_smarty_tpl));?>


<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- Sezione Ricerca here -->
<div class="column" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
  <div class="container" style="background-color:#E3E3E3">

    <!-- FORM -->
    <form method="post" id="Ricercaform" action="search">
      <div class="row">
        <label for="Parametro">Parametro:</label><br>
        <input type="text" id="Parametro" name="Parametro">
        <label for="Tipo">Scegli un tipo di ricerca:</label>
        <select id="Tipo" name="TipoRicerca" form="Ricercaform">
          <option value="Nome">Nome</option>
          <option value="Categoria">Categoria</option>
        </select>
        <button href="/playadice/ricerca/Search" > Cerca </button>
      </div>
    </form>
    <?php if ($_smarty_tpl->tpl_vars['Tipo']->value) {?>
    <div class="col-md-2">
      <a class="btn-primary btn" href="/playadice/catalogo/newgioco">Crea Nuovo</a>
    </div>
    <?php }?>

  </div>
  <!-- Catalogo -->

  <?php if ($_smarty_tpl->tpl_vars['results']->value) {?>

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

    <?php
$__section_k_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_k_0_total = $__section_k_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_0_total !== 0) {
for ($__section_k_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_0_iteration <= $__section_k_0_total; $__section_k_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
      <div class="row pi-draggable">
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getNome();?>
</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getVotoMedio();?>
</p>
        </div>
        <div class="col-md-2" style="Text-align:center">
          <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getCategoria();?>
</p>
        </div>
        <div class="col-md-2">
          <a class="btn-primary btn" href="/playadice/giocoinfo/showgiocoinfo?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getId();?>
">Visualizza dettagli</a>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['Tipo']->value) {?>
        <div class="col-md-2">
          <a class="btn-primary btn" href="/playadice/catalogo/remove?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getId();?>
">Elimina</a>
        </div>
        <?php }?>
      </div>
    <?php
}
}
?>
    <?php } else { ?>
    <div class="col-md-2" style="Text-align:center">
      <p style="color:White;">NESSUN RISULTATO</p>
    </div>


  <?php }?>
  <!-- Fine Sezione -->
</div>
<!-- Sezione Our Team -->

</body>

</html><?php }
}
