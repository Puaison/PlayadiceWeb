<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-30 17:08:50
  from 'C:\xampp\htdocs\Progetto-PW\playadice\templates\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efb5582ad0811_04826495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '602044d27ac35b23d44cb351465000a2f20dad41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Progetto-PW\\playadice\\templates\\Register.tpl',
      1 => 1593529408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5efb5582ad0811_04826495 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Html Test</title>
</head>
<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container text-center">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-7 well">
        <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
            <div class="alert alert-warning">
                <strong>Warning!</strong><br>Wrong combination of user and password. <br>Please retry.
            </div>
        <?php }?>
        <h2>Register</h2>
        <hr>
        <form method="post" enctype="multipart/form-data" action="signup">

            <div class="form-group row">
                <label for="user" class="col-sm-2 col-form-label <?php if (!$_smarty_tpl->tpl_vars['check']->value['name']) {?> text-danger<?php }?>">User: *</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control is-invalid" id="user" name="name" placeholder="Insert username...">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['name']) {?>
                    <div class="col-sm-3 well">
                        <small id="userHelp" class="text-danger">
                            Must be 3-20 characters long.
                        </small>
                    </div>
                <?php }?>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label <?php if (!$_smarty_tpl->tpl_vars['check']->value['pwd']) {?> text-danger<?php }?>">Password:</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control is-invalid" id="inputPassword" name="pwd" placeholder="Password">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['pwd']) {?>
                    <div class="col-sm-3 well">
                        <small id="passwordHelp" class="text-danger">
                            Must be 8-20 characters long.
                        </small>
                    </div>
                <?php }?>
            </div>

            <div class="form-group row">
                <label for="mail" class="col-sm-2 col-form-label <?php if (!$_smarty_tpl->tpl_vars['check']->value['mail']) {?> text-danger<?php }?>">Mail: *</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control is-invalid" id="mail" name="mail" placeholder="Insert email...">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['mail']) {?>
                    <div class="col-sm-3 well">
                        <small id="mailHelp" class="text-danger">
                            Must be an email.
                        </small>
                    </div>
                <?php }?>
            </div>
            <hr>
            <h2 id="important">User Type:</h2>
            <br>
            <div class="form-check">
                <label class="form-check-label"> <input type="radio"
                                                        class="form-check-input" name="type" value="listener" checked>
                    Listener
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label"> <input type="radio"
                                                        class="form-check-input" name="type" value="musician">
                    Musician
                </label>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <div class="col-sm-3">

    </div>

</body>
</html>
<?php }
}
