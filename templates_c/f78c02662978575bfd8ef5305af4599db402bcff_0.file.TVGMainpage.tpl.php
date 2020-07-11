<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 13:00:01
  from 'C:\xampp\htdocs\playadice\templates\TVGMainpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f099bb12059e8_80151835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f78c02662978575bfd8ef5305af4599db402bcff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\TVGMainpage.tpl',
      1 => 1594458159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f099bb12059e8_80151835 (Smarty_Internal_Template $_smarty_tpl) {
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

<body class="">

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


  <!-- Navbar here -->
  <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Alert-->
<?php if ($_smarty_tpl->tpl_vars['notify']->value != "NoNotify") {?>
  <div class="alert alert-warning">
    <strong>Attenzione!</strong><br> <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>
 </div>
<?php }?>

  <!-- Sezione Ricerca here -->
<div class="container-fluid" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">

  <div class="container-fluid">
    <div class="row justify-content-center" style=" margin-top: 15px; margin-bottom: 15px ">
      <div class="col-sm-8 align-self-center" >
        <!-- FORM -->
        <form method="post" id="Ricercaform" action="search">
          <div class="row">
            <label for="Parametro" style="color: white; margin-left: 4px; margin-right: 4px">Parametro:</label><br>
            <input type="text" id="Parametro" name="Parametro">
            <label for="Tipo" style="color: white; margin-left: 8px; margin-right: 4px">Scegli un tipo di ricerca:</label>
            <select id="Tipo" name="TipoRicerca" form="Ricercaform">
              <option value="Nome">Nome</option>
              <option value="Autore">Autore</option>
            </select>
            <button class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/ricerca/Search" style="margin-left: 4px; margin-right: 4px" > Cerca </button>
          </div>
        </form>
      </div>

      <div class="col-sm-4">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/create" style=" margin-top: 5px; margin-bottom: 5px "> Crea un Nuovo Personaggio </a>
      </div>
    </div>
  </div>

  <!-- Sezione I miei PG here -->
  <?php if ($_smarty_tpl->tpl_vars['results']->value) {?>
  <div class="container-fluid">

    <div class="container-fluid" style="background: black;height: 2px"></div>

    <div class="row justify-content-around" style=" margin-bottom: 5px">
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Proprietario:</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Nome:</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Classe:</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke">Livello:</span>
      </div>
      <div class="col" style="Text-align:center"></div>
      <div class="col" style="Text-align:center"></div>
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
        <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->GetProprietario()->GetUsername();?>
</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getNome();?>
</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getClasse();?>
</span>
      </div>
      <div class="col justify-content-center align-self-center text-center">
        <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getLivello();?>
</span>
      </div>
      <div class="col" style="Text-align:center">        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/details?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getId();?>
">Dettagli</a></div>
      <div class="col" style="Text-align:center">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark <?php if ($_smarty_tpl->tpl_vars['Username']->value != $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->GetProprietario()->GetUsername() && $_smarty_tpl->tpl_vars['UtenteType']->value != 'admin') {?>disabled<?php }?>" href="/playadice/avatar/modify?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getId();?>
">Modifica</a>
      </div>
      <div class="col" style="Text-align:center">
        <a class="btn navbar-btn ml-md-2 btn-light text-dark <?php if ($_smarty_tpl->tpl_vars['Username']->value != $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->GetProprietario()->GetUsername() && $_smarty_tpl->tpl_vars['UtenteType']->value != 'admin') {?>disabled<?php }?>" href="/playadice/avatar/delete?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getId();?>
">Elimina</a>
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
    <br>
    <!-- Sezione PG In attesa di approvazione per admin here -->
    <?php if ($_smarty_tpl->tpl_vars['UtenteType']->value == 'admin') {?>
    <div class="container-fluid">

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['proposte']->value, 'proposta');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['proposta']->value) {
?>

        <?php if ($_smarty_tpl->tpl_vars['proposta']->value->getTipoProposta() == "Creazione") {?>
      <div class="row justify-content-around" style=" margin-bottom: 5px">
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke"> Creazione </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->GetProprietario()->GetUsername();?>
 </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <span class="align-middle" style="color: whitesmoke"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getNome();?>
 </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/vediproposta?<?php echo $_smarty_tpl->tpl_vars['proposta']->value->getId();?>
"> Dettagli Approvazione </a>
        </div>
      </div>

        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['proposta']->value->getTipoProposta() == "Modifica") {?>

      <div class="row justify-content-around" style=" margin-bottom: 5px">
        <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"> Modifica </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->GetProprietario()->GetUsername();?>
</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getNome();?>
</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/vediproposta?<?php echo $_smarty_tpl->tpl_vars['proposta']->value->getId();?>
"> Dettagli Approvazione </a>
        </div>
      </div>

        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['proposta']->value->getTipoProposta() == "Cancellazione") {?>
      <div class="row justify-content-around" style=" margin-bottom: 5px">
        <div class="col justify-content-center align-self-center text-center">
             <span class="align-middle" style="color: whitesmoke"> Cancellazione </span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
             <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->GetProprietario()->GetUsername();?>
</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
             <span class="align-middle" style="color: whitesmoke"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getNome();?>
</span>
        </div>
        <div class="col justify-content-center align-self-center text-center">
            <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/vediproposta?<?php echo $_smarty_tpl->tpl_vars['proposta']->value->getId();?>
"> Dettagli Approvazione </a>
        </div>
      </div>

        <?php }?>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </div>
    <?php }?>
    <!-- Fine Sezione -->
  <br>
  <br>
  <br>
</div>

</body>

</html><?php }
}
