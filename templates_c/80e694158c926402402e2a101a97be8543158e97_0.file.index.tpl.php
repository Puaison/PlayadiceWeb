<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-14 10:59:35
  from 'D:\XAMPP2\htdocs\playadice\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0d73f73583b7_86181854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80e694158c926402402e2a101a97be8543158e97' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\playadice\\templates\\index.tpl',
      1 => 1594716896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0d73f73583b7_86181854 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="Resources/now-ui-kit.css" type="text/css">
        <title>Playadice Home</title>
</head>

<body class="">

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="column" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .25), rgba(0, 0, 0, .25)), url(https://static.pingendo.com/cover-bubble-dark.svg); background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat; min-height: 1000px">

        <!-- Sezione Giochi da tavolo here -->
        <div class="container py-5 FlexContainer">

                                <div style="margin-right: 3px">
                                        <img class="img-fluid d-block" src="Resources/assets/Giocodatavolo.jpg" style="max-width: 800px">
                                </div>

                                <div class="card pi-draggable Flex-item" style="align-items: center; justify-items: center">
                                        <div class="card-body "><?php if (!empty($_smarty_tpl->tpl_vars['giochi']->value)) {?>

                                                        <h5 class="card-title"><b>Top 5 Games</b></h5>

                                                        <ol class=""><h6>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['giochi']->value, 'gioco');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gioco']->value) {
?>
                                                                                <li><?php echo $_smarty_tpl->tpl_vars['gioco']->value->getNome();?>
</li>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></h6>
                                                        </ol>
                                                <?php } else { ?>
                                                        Nessun gioco da mostrare
                                                <?php }?>

                                                <a href="/playadice/catalogo/catalogocompleto" class="btn btn-primary justify-content-center">Vai al catalogo</a>
                                        </div>
                                </div>
        </div>

        <!-- Sezione Eventi here -->
        <div class="container py-5 FlexContainer">

                <div style="margin-right: 3px">
                        <img class="img-fluid d-block" src="Resources/assets/evento.png" style="max-width: 800px">
                </div>

                <div class="card pi-draggable Flex-item" style="align-items: center; justify-items: center">
                        <div class="card-body ">
                                <h5 class="card-title"><b>Evento in arrivo</b></h5>
                                <div class="col"><?php if (!empty($_smarty_tpl->tpl_vars['evento']->value)) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['evento']->value->getNome();?>

                                        <?php }?></div>
                                <div class="col"><?php $_smarty_tpl->_assignInScope('fascia', $_smarty_tpl->tpl_vars['evento']->value->getFasce());?>
                                        <?php echo $_smarty_tpl->tpl_vars['fascia']->value[0]->getDataStr();?>
</div>
                                <div class="col"><?php echo $_smarty_tpl->tpl_vars['evento']->value->getLuogo()->getNome();?>
</div>

                                <a href="./evento/show?<?php echo $_smarty_tpl->tpl_vars['evento']->value->getId();?>
" class="btn btn-primary justify-content-center">Vai all'evento</a>
                        </div>
                </div>
        </div>

        <!-- Sezione GDR here -->
        <div class="container py-5 FlexContainer">

                <div style="margin-right: 3px">
                        <img class="img-fluid d-block" src="Resources/assets/gdr.jpg" style="max-width: 800px">
                </div>

                <div class="card pi-draggable Flex-item" style="align-items: center; justify-items: center">
                        <div class="card-body ">
                                <h5 class="card-title"><b>Sezione TWG</b></h5>
                                <a href="/playadice/ricerca/showpersonal" class="btn btn-primary justify-content-center">Vai ai tuoi personaggi</a>
                        </div>
                </div>
        </div>

        <!-- Sezione Our Team -->
        <div class="py-5 pi-draggable text-center text-white" style="background: transparent">
                <div class="container">
                        <div class="row">
                                <div class="mx-auto col-md-12">
                                        <h1 class="mb-3">Il nostro team</h1>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="Resources/assets/Badibba.jpg" alt="Card image cap" width="200">
                                        <h4> <b>Antonio M. Marottoli</b> </h4>
                                        <p class="mb-0">CEO e fondatore</p>
                                </div>
                                <div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="Resources/assets/LucaDelSignore.jpg" alt="Card image cap" width="200">
                                        <h4> <b>Luca Del Signore</b> </h4>
                                        <p class="mb-0">Il Presidentissimo</p>
                                </div>
                                <div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="Resources/assets/AlessioPerozzi.jpg" alt="Card image cap" width="200">
                                        <h4> <b>Alessio Perozzi</b> </h4>
                                        <p class="mb-0">Esperozzi</p>
                                </div>
                        </div>
                </div>
        </div>

</div>

</body>

</html><?php }
}
