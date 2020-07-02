<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 21:58:23
  from 'C:\xampp\htdocs\playadice\templates\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efe3c5fe8a615_46798915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '555686cb53629661b8cfc5ce0458ede07659ee4d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\Register.tpl',
      1 => 1593719900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5efe3c5fe8a615_46798915 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Registrazione</title>
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
        <?php if (!$_smarty_tpl->tpl_vars['check']->value['Esistente']) {?>
        <div class="alert alert-warning">
            <!-- Errore form-->
            <strong>Attenzione!</strong><br>Username già utilizzato <br>Per favore sceglierne un altro. </div>
        <?php }?>
        <form method="post" enctype="multipart/form-data" action="signup">

            <div class="form-group row">
                <label for="user" class="col-sm-5 col-form-label">Username: </label>
                <div class="col-lg-5">
                    <input type="text" class="form-control " id="user" name="Username" placeholder="Insert username..." maxlength="20">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Username']) {?>
                    <div class="alert alert-warning">
                        <small >
                            6-20 Caratteri Alphanumerici.
                        </small>
                    </div>
                <?php }?>

            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label ">Password:</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control " id="inputPassword" name="Password" placeholder="Password" maxlength="20">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Password']) {?>
                    <div class="alert alert-warning">
                        <small>
                            6-20 Caratteri Alphanumerici.
                        </small>
                    </div>
                <?php }?>


            </div>

            <div class="form-group row">
                <label for="mail" class="col-sm-5 col-form-label ">Email:</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control " id="mail" name="Mail" placeholder="Insert email..." maxlength="45">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Mail']) {?>
                    <div class="alert alert-warning">
                        <small >
                            Deve essere un'email(lunghezza max 40).
                        </small>
                    </div>
                <?php }?>

            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-5 col-form-label ">Nome:</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control " id="mail" name="Nome" placeholder="Insert Name..." maxlength="20">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Nome']) {?>
                    <div class="alert alert-warning">
                        <small >
                            Solo Caratteri(lunghezza max 20).
                        </small>
                    </div>
                <?php }?>

            </div>
            <div class="form-group row">
                <label for="cognome" class="col-sm-5 col-form-label ">Cognome:</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control " id="mail" name="Cognome" placeholder="Insert Surname..." maxlength="30">
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Cognome']) {?>
                    <div class="alert alert-warning">
                        <small>
                            Solo Caratteri(lunghezza max 20).
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
