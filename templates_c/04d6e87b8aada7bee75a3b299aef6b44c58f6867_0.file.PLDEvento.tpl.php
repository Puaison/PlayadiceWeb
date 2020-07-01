<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-01 11:59:01
  from 'C:\xampp\htdocs\playadice\templates\PLDEvento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efc5e65367209_30282342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04d6e87b8aada7bee75a3b299aef6b44c58f6867' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\PLDEvento.tpl',
      1 => 1593597540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5efc5e65367209_30282342 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" href="./Pld/now-ui-kit.css" type="text/css">
    <link rel="stylesheet" href="./Pld/assets/css/nucleo-icons.css" type="text/css">
    <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
    <title><?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getNome();?>
</title>
</head>
<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<!-- Navbar here -->

<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 p-0"> <img class="img-fluid d-block" src="https://static.pingendo.com/cover-moon.svg" style="" h="100" w="100"> </div>
            <div class="px-5 col-lg-6 d-flex flex-column align-items-start justify-content-center order-1 order-lg-2" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b><?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getNome();?>
</b></h5>
                        <h6 class="card-subtitle my-2 text-muted"><?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getCategoria();?>
</h6>
                        <h6 class="card-subtitle my-2 text-"><?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getLuogo();?>
</h6>

                        <div class="row">

                            <div class="col-xl-12 text-center border-secondary  "><b>orari</b></div>
                            <div class="col-xl-6 text-center "><b>Inizio </b></div>

                            <div class="col-xl-6 text-center "><b>Fine </b></div>

                            <?php $_smarty_tpl->_assignInScope('fasce', $_smarty_tpl->tpl_vars['results']->value[0]->getFasce());?>

                            <!----inizio selezione fasce---->
                            <!----Data Inizio--->
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fasce']->value, 'fascia');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fascia']->value) {
?>
                            <div class="col-xl-6 text-center  " ><b><?php echo $_smarty_tpl->tpl_vars['fascia']->value->getDataStr();?>
 </b></div>

                                <div class="col-xl-6 text-center "><b><?php echo $_smarty_tpl->tpl_vars['fascia']->value->getFine();?>
 </b></div>

                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                        </span>


                        <p class="card-text mt-sm-3"><?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getTesto();?>
</p>

                        <div class="text-right"><button class="btn btn-primary pi-draggable" type="submit"style="text-end" href="#" draggable="true">Prenotati</button>
                            <button class="btn btn-primary pi-draggable" type="submit"style="text-end" href="#" draggable="true" disabled>Già Prenotato</button></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<?php }
}
