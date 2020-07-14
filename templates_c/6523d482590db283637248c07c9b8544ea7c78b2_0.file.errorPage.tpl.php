<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-14 11:12:54
  from 'D:\XAMPP2\htdocs\playadice\templates\errorPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0d7716b0afa1_86459396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6523d482590db283637248c07c9b8544ea7c78b2' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\playadice\\templates\\errorPage.tpl',
      1 => 1594655516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0d7716b0afa1_86459396 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Error Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
</head>
<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>

<div class="container text-center well">
    <h3>Ooooops! Something went wrong!</h3>
    <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
, Per favore torna nella <a href="/playadice/">home</a>
    </p>

</div>

</body>
</html><?php }
}
