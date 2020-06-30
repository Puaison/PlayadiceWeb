<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-30 17:11:18
  from 'C:\xampp\htdocs\Progetto-PW\playadice\templates\Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efb56168ccaa3_31175429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59bce4c2e0b36074d0c9475d0e4effcf7177c492' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Progetto-PW\\playadice\\templates\\Login.tpl',
      1 => 1593529401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5efb56168ccaa3_31175429 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
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
    <title>Log In</title>
</head>
<body>



<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container text-center">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-7 well">
        <h2>Login</h2>
        <hr> <?php if ($_smarty_tpl->tpl_vars['error']->value) {?> <div class="alert alert-warning">
            <!-- Errore form-->
            <strong>Warning!</strong><br>Wrong combination of user and password. <br>Please retry. </div> <?php }?> <form class="form-horizontal" method="post" action="login">
            <!-- Nickname -->
            <div class="form-group row">
                <label for="user" class="col-sm-2 col-form-label">User:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control is-invalid" id="user" name="name" placeholder="Insert username...">
                </div>
            </div>
            <div class="form-group row">
                <!-- Campo password -->
                <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control is-invalid" id="inputPassword" name="pwd" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-sm-3">
    </div>
</div>
</body>
</html><?php }
}
