<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 14:55:19
  from 'C:\xampp\htdocs\playadice\templates\GiocoInfo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f09b6b7c3abf9_94442398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd8d22795db6450e0f289afbd273285f33572649' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\GiocoInfo.tpl',
      1 => 1594214975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f09b6b7c3abf9_94442398 (Smarty_Internal_Template $_smarty_tpl) {
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


    <title><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getNome();?>
</title>
</head>
<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>

<?php $_smarty_tpl->assign('Tipo',$_smarty_tpl->smarty->registered_objects['user'][0]->getModeratore(array(),$_smarty_tpl));?>





<!-- Navbar here -->

<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<hr>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="px-5 col-lg-6 flex-column align-items-start justify-content-center order-1 order-lg-2" >
                <div class="card ">
                    <div class="card-body">

                        <h5 class="card-title"><b><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getNome();?>
</b></h5>
                        <?php if ($_smarty_tpl->tpl_vars['UtenteType']->value == "admin") {?>
                        <a class="btn btn-primary" href="">Modifica</a>
                        <?php }?>
                        <h6 class="card-subtitle my-2 text-muted">Della: <?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getCasaEditrice();?>
</h6>
                        <h6 class="card-subtitle my-2 text-muted"><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getCategoria();?>
</h6>
                        <h6 class="card-subtitle my-2 text-center">
                            <?php if ($_smarty_tpl->tpl_vars['gioco']->value->getVotoMedio() == 0) {?>Ancora nessuna recensione
                            <?php } else { ?>
                            Voto della community: <?php echo $_smarty_tpl->tpl_vars['gioco']->value->getVotoMedio();?>

                            <?php }?></b></b></h6>
                        <div class="row">

                            <div class="col-xl-6 text-center "><b>Giocatori Minimi </b></div>

                            <div class="col-xl-6 text-center "><b>Giocatori Massimi </b></div>




                            <div class="col-xl-6 text-center  " ><b><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getMin();?>
 </b></div>

                            <div class="col-xl-6 text-center "><b><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getMax();?>
 </b></div>


                        </div>
                        <p class="card-text mt-sm-3"><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getDescrizione();?>
</p>
                        <div class="row justify-content-center">
                            <?php if ($_smarty_tpl->tpl_vars['UtenteType']->value == "ospite") {?>
                                <a class="btn btn-primary " href="/playadice/utente/login">Logga per recensire</a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['check']->value['Esistente']) {?>
                                        <a class="btn btn-block" href="">Hai già recensito</a>
                                <?php } else { ?>
                                <a class="btn btn-primary " href="/playadice/giocoinfo/newrecensione?<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getId();?>
">Inserisci recensione</a>
                            <?php }?>
                        </div>


                    </div>


                </div>
            </div>

        </div>

    </div>

</div>
<!-- Sezione per le recensioni -->
<?php if (!empty($_smarty_tpl->tpl_vars['gioco']->value->getRecensioni())) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gioco']->value->getRecensioni(), 'rec');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
?>
    <div class="container py-4">
        <div class="card">
            <div class="px-5  flex-column  order-1 order-lg-2" >
                <div class="row text-left">
                    <b> <h4>Voto:  <?php echo $_smarty_tpl->tpl_vars['rec']->value->getVoto();?>
</h4></b></div>
                <div class="row"><?php echo $_smarty_tpl->tpl_vars['rec']->value->getCommento();?>

                </div>
                <div class="row py-4">
                    <div class="col-md-3"></div>
                    <div class="col"><b>Utente:<?php echo $_smarty_tpl->tpl_vars['rec']->value->getEUtente()->getUsername();?>
</b></div>
                    <?php if ($_smarty_tpl->tpl_vars['Username']->value == $_smarty_tpl->tpl_vars['rec']->value->getEUtente()->getUsername() || $_smarty_tpl->tpl_vars['UtenteType']->value == 'admin') {?>
                    <div class="col"><a class="btn btn-primary" href="/playadice/giocoinfo/removerecensione?<?php echo $_smarty_tpl->tpl_vars['rec']->value->getEUtente()->getUsername();?>
?<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getId();?>
">Elimina</a></div>
                    <?php }?>
                </div>

            </div></div></div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>


</body>

</html>

<?php }
}
