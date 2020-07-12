<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-12 13:15:57
  from 'C:\xampp\htdocs\playadice\templates\ModificaPassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0af0ed111640_22735194',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '140d706c75bd079e8cfe21d07e0ca3b68e7a5528' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\ModificaPassword.tpl',
      1 => 1594552512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0af0ed111640_22735194 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Modifica <?php echo $_smarty_tpl->tpl_vars['utente']->value->getUsername();?>
</title>
</head>
<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container text-center">
    <div class="col-sm-3">

    </div>
        <h2>Register</h2>
        <hr>
        <form method="post" enctype="multipart/form-data" action="modifymypassword">


            <div class="form-group row">
                <label for="mail" class="col-sm-5 col-form-label ">Password attuale:</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control " id="mail" name="OldPassword"  maxlength="20">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['OldPassword']) {?>
                    <div class="alert alert-warning">
                        <small >
                            Password attuale non corretta
                        </small>
                    </div>
                <?php }?>

            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-5 col-form-label ">Nuova Password:</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control " id="mail" name="Password"  maxlength="20">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Password']) {?>
                    <div class="alert alert-warning">
                        <small>
                            6-20 Caratteri Alphanumerici.
                        </small>
                    </div>
                <?php }?>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</div>
    <div class="col-sm-3">

    </div>

</body>
</html>
<?php }
}
