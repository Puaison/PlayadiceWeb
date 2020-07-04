<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-01 12:43:43
  from 'D:\XAMPP2\htdocs\playadice\templates\Test2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efc68df416540_45211441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd624d81913362a5d948c52c5486aa4781ec96d87' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\playadice\\templates\\Test2.tpl',
      1 => 1593600223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5efc68df416540_45211441 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
        <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
        <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
        <title>Test</title>
</head>

<body class="">

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>

</html><?php }
}
