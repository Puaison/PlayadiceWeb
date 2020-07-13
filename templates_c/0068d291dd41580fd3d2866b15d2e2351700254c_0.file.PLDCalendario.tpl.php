<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-12 23:41:52
  from 'C:\xampp\htdocs\playadice\templates\PLDCalendario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0b83a0aad1b6_10165100',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0068d291dd41580fd3d2866b15d2e2351700254c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\PLDCalendario.tpl',
      1 => 1594559540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f0b83a0aad1b6_10165100 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Calendario</title>
</head>

<body>

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>

<?php $_smarty_tpl->assign('Tipo',$_smarty_tpl->smarty->registered_objects['user'][0]->getModeratore(array(),$_smarty_tpl));?>


<!-- Navbar here -->

<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="py-5">
    <div class="container">
        <div class="row ">
            <div class="col pb-3" > Ultimi Eventi</div>
            <?php if ($_smarty_tpl->tpl_vars['Tipo']->value) {?>
                <a class="col pb-3" href="../evento/create"> Crea un Evento</a><?php }?>
            <form method="POST"  action="../evento/order">
                <select name="option" required>
                    <option value="Data">Data</option>
                    <option value="Luogo">Luogo</option>
                </select>
                <input type="submit" class="btn btn-primary " value="Submit">
            </form>


            <?php
$__section_k_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_k_0_total = $__section_k_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_0_total !== 0) {
for ($__section_k_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_0_iteration <= $__section_k_0_total; $__section_k_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
                <?php if (!empty($_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getStartDate())) {?>
                <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getStartDate());
}?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value > date_create()) {?>
            <div class="col-md-12">
                <div class="row border">
                    <span class="col- border"><img class="img-fluid d-block pi-draggable " src="https://static.pingendo.com/img-placeholder-1.svg" width="100" height="100"></span>

                    <span class="col text-center border ">
                            <a class="px-5" href="../evento/show?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getId();?>
">
                                <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getNome();?>
</a></span>
                            <?php $_smarty_tpl->_assignInScope('fascia', $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getFasce());?>
                        <?php if ($_smarty_tpl->tpl_vars['fascia']->value) {?>
                        <span class="col text-center border"><?php echo $_smarty_tpl->tpl_vars['fascia']->value[0]->getDataStr();?>
</span><?php }?>
                        <span class="col text-center border"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getLuogo()->getNome();?>
</span>

                </div>
            </div>
                <?php }?>
            <?php
}
}
?>
            <div class="col pb-3" > Eventi Passati</div>
            <?php
$__section_k_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_k_1_total = $__section_k_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_1_total !== 0) {
for ($__section_k_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_1_iteration <= $__section_k_1_total; $__section_k_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
                <?php if (!empty($_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getStartDate())) {?>
                    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getStartDate());
}?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value < date_create()) {?>
                    <div class="col-md-12">
                        <div class="row border">
                            <span class="col- border"><img class="img-fluid d-block pi-draggable " src="https://static.pingendo.com/img-placeholder-1.svg" width="100" height="100"></span>

                            <span class="col text-center border ">
                            <a class="px-5" href="../evento/show?<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getId();?>
">
                                <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getNome();?>
</a></span>
                            <?php $_smarty_tpl->_assignInScope('fascia', $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getFasce());?>
                            <?php if ($_smarty_tpl->tpl_vars['fascia']->value) {?>
                                <span class="col text-center border"><?php echo $_smarty_tpl->tpl_vars['fascia']->value[0]->getDataStr();?>
</span><?php }?>
                            <span class="col text-center border"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]->getLuogo()->getNome();?>
</span>

                        </div>
                    </div>
                <?php }?>
            <?php
}
}
?>
        </div>
    </div>
</div>

</body>
</html><?php }
}
