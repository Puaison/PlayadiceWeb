<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 17:41:23
  from 'C:\xampp\htdocs\playadice\templates\ModificaGioco.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f09dda3e330e5_71086179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db5a3811503e47a26d394ffd07373547c804ad4e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\ModificaGioco.tpl',
      1 => 1594482082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f09dda3e330e5_71086179 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
    <title>Modifica <?php echo $_smarty_tpl->tpl_vars['gioco']->value->getNome();?>
</title>
</head>

<body>


<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>




<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="card ">

    <form method="post"  class="" action="eseguimodifica">
        <div class="py-5">
            <div class="container ">
                <div class="col-md-12">
                    <div class="form-group row">
                        <input type="hidden" name="IdGioco" value="<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getId();?>
">
                        <label for="name-input" class="col-2 col-form-label"><b>Nome Gioco</b></label>
                        <div class="col-10">
                            <input type="text" name="Nome" class="form-control" maxlength="40" size="40"
                                   placeholder="Inserisci qui il Nome"
                                    <?php if ((($_smarty_tpl->tpl_vars['gioco']->value->getNome() !== null ))) {?>
                                        value="<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getNome();?>
"
                                    <?php }?>
                                   ></div>
                    </div>

                    <div class="form-group row">
                        <label for="category-input" class="col-2 col-form-label"><b>Categoria</b></label>
                        <div class="col-10 ">
                            <select class="form-control " name="Categoria" id="inlineFormCustomSelect">
                                <option value="Strategia"<?php if ($_smarty_tpl->tpl_vars['gioco']->value->getCategoria() == "Strategia") {?> selected<?php }?>}>Strategia</option>
                                <option value="Party"<?php if ($_smarty_tpl->tpl_vars['gioco']->value->getCategoria() == "Party") {?> selected<?php }?>>Party</option>

                            </select>
                    </div>
                            <div class=" form-group row">
                                <label for="name-input " class="my-auto px-4 "><b>Descrizione</b></label>
                                <div class="col-4 ">
                                    <textarea name="Descrizione"  class="form-control" placeholder="Piccola descrizione del gioco" maxlength="3000" size="400">
                                        <?php if ((($_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getDescrizione() !== null ))) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getDescrizione();?>

                                        <?php }?>
                                    </textarea>
                                </div>

                            </div>

                            <div class="form-group row"
                                <label for="name-input " class="my-auto"><b>Numero Minimo di giocatori</b></label>
                                <div class="col ">
                                    <input type="text" name="NumeroMin" class="form-control" size="2"
                                            <?php if ((($_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getMin() !== null ))) {?>
                                        value="<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getMin();?>
"
                                            <?php }?>>
                                </div>

                                <label for="name-input " class="my-auto px-4 "><b>Numero Massimo di giocatori</b></label>
                                <div class="col-5  px-4 ">
                                    <input type="text" name="NumeroMax" class="form-control" size="2"
                                            <?php if ((($_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getMax() !== null ))) {?>
                                        value="<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getMax();?>
"
                                            <?php }?>>
                                </div>

                        </div>

                        <div class="form-group row">
                                <label for="name-input " class="my-auto"><b>Casa Editrice</b></label>
                                <div class="col  ">
                                    <input type="text" name="CasaEditrice" class="form-control" placeholder="CasaEditrice" maxlength="40" size="40"
                                            <?php if ((($_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getCasaEditrice() !== null ))) {?>
                                        value="<?php echo $_smarty_tpl->tpl_vars['gioco']->value->getInfo()->getCasaEditrice();?>
"
                                            <?php }?>> </div>

                        </div>
            </div>
        </div>

        </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary " >Submit</button>
                    </div>
                </div>
    </form>

</div>

</body>
</html><?php }
}
