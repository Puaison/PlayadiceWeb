<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-08 13:09:31
  from 'C:\xampp\htdocs\playadice\templates\NuovaRecensione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f05a96b05e714_14936729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '784813a21e61c528a45fa7b4589e75242e0c0b6a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\NuovaRecensione.tpl',
      1 => 1594206312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f05a96b05e714_14936729 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Nuova Recensione</title>
</head>

<body class="">

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container text-center ">
    <div class="col-sm-3">
    </div>

        <h2>Nuova Recensione</h2>
    <!--if $error
        <hr>
        <div class="alert alert-warning">
             Errore
            <strong>Attenzione!</strong><br>Username o Password errati. <br>Per favore riprova. </div>
-->

        <!-- FORM -->
        <form class="form-horizontal" method="post" action="newrecensione?<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getId();?>
">
            <!-- Voto -->
            <div class="form-group row">
                <label for="user" class="col-md-5 col-form-label">Voto:</label>
                <div class="col-lg-5">
                    <select class="form-control " name="Voto">
                        <option selected="" value="Choose...">Choose...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <!-- Commento -->
                <label class="col-sm-5 col-form-label col">Commento:</label>
                <div class="col-lg-5">
                    <textarea class="form-control border-primary" name="Commento" placeholder="Dicci cosa ne pensi" maxlength="500"></textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Invia</button>
            </div>
            <input type="hidden" name="IdGioco" value="<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getId();?>
">
        </form>

</div>
</div>
</body>
</html><?php }
}
