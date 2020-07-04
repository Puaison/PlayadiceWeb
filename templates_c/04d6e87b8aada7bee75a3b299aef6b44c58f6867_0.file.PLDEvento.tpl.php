<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-04 14:06:49
  from 'C:\xampp\htdocs\playadice\templates\PLDEvento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0070d924da42_37421239',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04d6e87b8aada7bee75a3b299aef6b44c58f6867' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\PLDEvento.tpl',
      1 => 1593864408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0070d924da42_37421239 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../bootstrap.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">


    <title><?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getNome();?>
</title>
</head>
<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>

<?php $_smarty_tpl->assign('Tipo',$_smarty_tpl->smarty->registered_objects['user'][0]->getModeratore(array(),$_smarty_tpl));?>



<!-- Navbar here -->

<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<hr> <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <div class="alert alert-warning">

        <br>Prenotazione avvenuta con successo <br></div> <?php }?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 p-0"> <img class="img-fluid d-block" src="https://static.pingendo.com/cover-moon.svg" style="" h="100" w="100"> </div>
            <div class="px-5 col-lg-6 flex-column align-items-start justify-content-center order-1 order-lg-2" >
                <div class="card ">
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


                        <p class="card-text mt-sm-3"><?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getTesto();?>
</p>
                        <div class='row'>
                            <?php if ($_smarty_tpl->tpl_vars['Tipo']->value) {?>
                            <div class="col"> <a class="btn btn-primary" type="submit" href="/playadice/evento/delete?<?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getId();?>
">Annulla</a></div>
                            <div class="col"> <a class="btn btn-primary" type="submit" href="/playadice/evento/modify?<?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getId();?>
">Modifica</a></div><?php }?>

                            <?php if (boolval($_smarty_tpl->tpl_vars['results']->value[0]->getFlag())) {?>
                            <?php if (!$_smarty_tpl->tpl_vars['check']->value) {?>

                        <div class="float-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" href="#prenotati">
                                Prenotati
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="prenotati" tabindex="-1" role="dialog" aria-labelledby="prenotati" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="prenotati">Ciao <?php echo $_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl);?>
</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Vuoi prenotarti a questo evento?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a type="submit" href="../evento/booking?<?php echo $_smarty_tpl->tpl_vars['results']->value[0]->getId();?>
" class="btn btn-primary">Si</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } else { ?>
                            <div class="float-right">
                            <button class="btn btn-primary float"  style="text-end" href="#" draggable="true" disabled>Già Prenotato</button></div>

                        <?php }?>
                        <?php }?>
                    </div>
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
