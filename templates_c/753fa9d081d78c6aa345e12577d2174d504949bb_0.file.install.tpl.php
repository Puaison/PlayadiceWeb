<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 14:35:57
  from 'C:\xampp\htdocs\playadice\templates\install.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f09b22d1800c0_77696780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '753fa9d081d78c6aa345e12577d2174d504949bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\install.tpl',
      1 => 1594470852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f09b22d1800c0_77696780 (Smarty_Internal_Template $_smarty_tpl) {
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
        <link rel="stylesheet" href="Pld/now-ui-kit.css" type="text/css">
        <link rel="stylesheet" href="Pld/assets/css/nucleo-icons.css" type="text/css">
        <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
</head>

<body >
<div class="container text-center content">
        <div class="col">
                <div class="well">
                        <h1 id="important"> Applicazione Web Playadice </h1>
                        <h4>Corso Programmazione Web 2019 - 2020</h4>
                        <h4 id="important">Autori:</h4> Luca Del Signore<br> Antonio Marottoli<br> Alessio Perozzi<br><br>
                        <p>Questa applicazione richiede che i cookie siano abilitati</p>
                </div> <?php if ($_smarty_tpl->tpl_vars['version']->value) {?> <h2> Installation </h2>
                        <hr>
                        <form class="form-horizontal" method="post" action="install">
                                <div class="form-group">
                                        <label class="control-label " for="user">Username(per accedere al tuo DataBase):</label> <input type="text" class="form-control" id="user" placeholder="Enter username" name="admin">
                                </div>
                                <div class="form-group">
                                        <label class="control-label" for="pwd">Password(per accedere al tuo DataBase):</label> <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                </div>
                                <div class="form-group">
                                        <label class="control-label " for="db">DB Name:</label> <input type="text" class="form-control" id="db" placeholder="Enter database name" name="database">
                                </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form> <?php } else { ?> <p>This application requires at least the 7.4 version of PHP</p> <?php }?>
        </div>
        <div class="col-sm-3">
        </div>
</div>
</body>

</html><?php }
}
