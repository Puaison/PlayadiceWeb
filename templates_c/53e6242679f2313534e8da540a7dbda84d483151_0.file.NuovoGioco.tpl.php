<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 14:54:59
  from 'C:\xampp\htdocs\playadice\templates\NuovoGioco.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f09b6a331a2a9_60461648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53e6242679f2313534e8da540a7dbda84d483151' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\NuovoGioco.tpl',
      1 => 1594134882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f09b6a331a2a9_60461648 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Crea Gioco</title>
</head>

<body>


<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>




<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="card ">

    <form method="post"  class="" action="newgioco">
        <div class="py-5">
            <div class="container ">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="name-input" class="col-2 col-form-label"><b>Nome Gioco</b></label>
                        <div class="col-10">
                            <input type="text" name="Nome" class="form-control" maxlength="40" size="40"
                                   placeholder="Inserisci qui il Nome"
                                    <?php if (isset($_smarty_tpl->tpl_vars['prec']->value['Nome'])) {?>
                                        value="<?php echo $_smarty_tpl->tpl_vars['prec']->value['Nome'];?>
"
                                    <?php }?>
                                   ></div>
                        <?php if (!$_smarty_tpl->tpl_vars['check']->value['Nome']) {?>
                        <div class="alert alert-warning">
                            <small >
                                Lunghezza massima 40.
                            </small>
                        </div>
                        <?php }?>
                    </div>

                    <div class="form-group row">
                        <label for="category-input" class="col-2 col-form-label"><b>Categoria</b></label>
                        <div class="col-10 ">
                            <select class="form-control " name="Categoria" id="inlineFormCustomSelect">
                                <option selected value="Choose...">Choose...</option>
                                <option value="Strategia">Strategia</option>
                                <option value="Party">Party</option>

                            </select>
                        </div>
                        <?php if (!$_smarty_tpl->tpl_vars['check']->value['Categoria']) {?>
                            <div class="alert alert-warning">
                                <small >
                                    Scegli una categoria.
                                </small>
                            </div>
                        <?php }?>
                    </div>
                            <div class=" form-group row">
                                <label for="name-input " class="my-auto px-4 "><b>Descrizione</b></label>
                                <div class="col-4 ">
                                    <textarea name="Descrizione"  class="form-control" placeholder="Piccola descrizione del gioco" maxlength="3000" size="400"></textarea>
                                </div>
                                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Descrizione']) {?>
                                    <div class="alert alert-warning">
                                        <small >
                                            Massimo 3000 caratteri.
                                        </small>
                                    </div>
                                <?php }?>
                            </div>

                            <div class="form-group row"
                                <label for="name-input " class="my-auto"><b>Numero Minimo di giocatori</b></label>
                                <div class="col ">
                                    <input type="text" name="NumeroMin" class="form-control" size="2" >
                                </div>
                            <?php if (!$_smarty_tpl->tpl_vars['check']->value['NumeroMin']) {?>
                                <div class="alert alert-warning">
                                    <small >
                                        Minimo 1.
                                    </small>
                                </div>
                            <?php }?>
                                <label for="name-input " class="my-auto px-4 "><b>Numero Massimo di giocatori</b></label>
                                <div class="col-5  px-4 ">
                                    <input type="text" name="NumeroMax" class="form-control" size="2">
                                </div>
                                <?php if (!$_smarty_tpl->tpl_vars['check']->value['NumeroMax']) {?>
                                    <div class="alert alert-warning">
                                        <small >
                                            Massimo 99.
                                        </small>
                                    </div>
                                <?php }?>
                        </div>

                        <div class="form-group row">
                                <label for="name-input " class="my-auto"><b>Casa Editrice</b></label>
                                <div class="col  ">
                                    <input type="text" name="CasaEditrice" class="form-control" placeholder="CasaEditrice" maxlength="40" size="40"
                                            > </div>
                                <?php if (!$_smarty_tpl->tpl_vars['check']->value['CasaEditrice']) {?>
                                    <div class="alert alert-warning">
                                        <small >
                                            Massimo 40 caratteri.
                                        </small>
                                    </div>
                                <?php }?>
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
