<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-12 11:20:50
  from 'C:\xampp\htdocs\playadice\templates\Profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0ad5f2e45fa0_04173810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '270cb8aeda23b693ffea4d50046453835b62d17f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\Profile.tpl',
      1 => 1594545595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0ad5f2e45fa0_04173810 (Smarty_Internal_Template $_smarty_tpl) {
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


    <title>Profile - <?php echo $_smarty_tpl->tpl_vars['utente']->value->getUsername();?>
</title>
</head>
<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>





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

                        <h5 class="card-title text-center "><b>Utente: <?php echo $_smarty_tpl->tpl_vars['utente']->value->getUsername();?>
</b></h5>

                        <h6 class="card-subtitle my-2 text-muted ">Nome: <?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
</h6>
                        <h6 class="card-subtitle my-2 text-muted ">Cognome: <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h6>
                        <h6 class="card-subtitle my-2 text-muted ">Email: <?php echo $_smarty_tpl->tpl_vars['utente']->value->getMail();?>

                            </b></b></h6>
                        <div class="row">

                            <div class="col-xl-6 text-center "><b><a class="btn btn-primary" href="">Modifica</a> </b></div>

                            <div class="col-xl-6 text-center "><b><a class="btn btn-primary" href="/playadice/utente/removeutente">Elimina</a> </b></div>







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
