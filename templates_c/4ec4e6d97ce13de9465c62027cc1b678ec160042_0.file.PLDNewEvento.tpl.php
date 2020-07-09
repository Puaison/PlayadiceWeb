<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-09 12:42:57
  from 'C:\xampp\htdocs\playadice\templates\PLDNewEvento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f06f4b1190e77_81768978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ec4e6d97ce13de9465c62027cc1b678ec160042' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\PLDNewEvento.tpl',
      1 => 1594290464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f06f4b1190e77_81768978 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Crea Evento</title>
</head>

<body>


<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>



<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <form method="post" id="c_form-h" class="" action="store">
        <div class="py-5">
            <div class="container ">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="name-input" class="col-2 col-form-label"><b>Nome Evento</b></label>
                        <div class="col-10">
                            <input type="text" name="nome" class="form-control" placeholder="Inserisci qui il Testo" maxlength="45" size="45"
                                    <?php if (isset($_smarty_tpl->tpl_vars['prec']->value['nome'])) {?>
                                        value="<?php echo $_smarty_tpl->tpl_vars['prec']->value['nome'];?>
"
                                    <?php }?>> </div>
                        <?php if (!$_smarty_tpl->tpl_vars['check']->value['Nome']) {?>
                            <div class="alert alert-warning">
                                <small >
                                    Lunghezza massima 45 Caratteri.
                                </small>
                            </div>
                        <?php }?>
                    </div>
                    <div class="form-group row">
                        <label for="category-input" class="col-2 col-form-label"><b>Categoria</b></label>
                        <div class="col-10 ">
                            <select class="form-control " name="categoria" id="inlineFormCustomSelect">
                                <option selected="" value="Choose...">Choose...</option>
                                <option value="Torneo">Torneo</option>
                                <option value="Free Play">Free Play</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col " for="category-input">
                            <div class="pb-3">
                                <b>Luogo</b></div>
                            <div class=" form-group row">
                                <label for="name-input " class="my-auto px-4 "><b>Nome</b></label>
                                <div class="col-4 ">
                                    <input type="text" name="nomeluogo" class="form-control" placeholder="Nome del Luogo" maxlength="45" size="45"
                                            <?php if (isset($_smarty_tpl->tpl_vars['prec']->value['nomeluogo'])) {?>
                                                value="<?php echo $_smarty_tpl->tpl_vars['prec']->value['nomeluogo'];?>
"
                                            <?php }?>>
                                </div>
                                <?php if (!$_smarty_tpl->tpl_vars['check']->value['NomeLuogo']) {?>
                                    <div class="alert alert-warning">
                                        <small >
                                            Lunghezza massima 45 Caratteri.
                                        </small>
                                    </div>
                                <?php }?>
                                <label for="name-input " class="my-auto"><b>Via</b></label>
                                <div class="col ">
                                    <input type="text" name="via" class="form-control" placeholder="Via xxxxxx, #civico"
                                           maxlength="45" size="45"
                                            <?php if (isset($_smarty_tpl->tpl_vars['prec']->value['via'])) {?>
                                                value="<?php echo $_smarty_tpl->tpl_vars['prec']->value['via'];?>
"
                                            <?php }?>> </div>
                            </div>
                            <?php if (!$_smarty_tpl->tpl_vars['check']->value['Via']) {?>
                                <div class="alert alert-warning">
                                    <small >
                                        Lunghezza massima 45 Caratteri.
                                    </small>
                                </div>
                            <?php }?>
                            <div class=" form-group row ">
                                <label for="name-input " class="my-auto px-4 "><b>Città</b></label>
                                <div class="col-5  px-4 ">
                                    <input type="text" name="citta" class="form-control" placeholder="Città"
                                           maxlength="45" size="45"
                                            <?php if (isset($_smarty_tpl->tpl_vars['prec']->value['citta'])) {?>
                                                value="<?php echo $_smarty_tpl->tpl_vars['prec']->value['citta'];?>
"
                                            <?php }?>>
                                </div>
                                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Citta']) {?>
                                    <div class="alert alert-warning">
                                        <small >
                                            Lunghezza massima 45 Caratteri.
                                        </small>
                                    </div>
                                <?php }?>
                                <label for="name-input " class="my-auto"><b>CAP</b></label>
                                <div class="col  ">
                                    <input type="text" name="cap" class="form-control" placeholder="CAP"
                                           maxlength="5" size="5"
                                            <?php if (isset($_smarty_tpl->tpl_vars['prec']->value['cap'])) {?>
                                                value="<?php echo $_smarty_tpl->tpl_vars['prec']->value['cap'];?>
"
                                            <?php }?>> </div>
                                <?php if (!$_smarty_tpl->tpl_vars['check']->value['Cap']) {?>
                                    <div class="alert alert-warning">
                                        <small >
                                            Lunghezza massima 5 Caratteri Numerici
                                        </small>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>



                    <div>
                        <div class="form-group row"> <label for="name-input" class="col-2 col-form-label"><b>Aggiungi una Fascia</b></label>

                        </div>

                        <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
                            <a class="btn    btn-primary" data-toggle="collapse" href="#<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
" role="button" aria-expanded="false" aria-controls="#<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                                +
                            </a>

                        <div class="collapse" id="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">
                            <div class="form-group row">
                                <label  class="col-2 col-form-label"><b>Giorno di Inizio</b></label>
                                <div class="col-10">

                                    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
" class="form-control" id="example-date-input" placeholder="gg/mm/aaaa HH:mm:ss" >
                                </div>
                                <label  class="col-2 col-form-label"><b>Giorno di Fine</b></label>
                                <div class="col-10">
                                    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['foo']->value+11;?>
" class="form-control" id="example-date-input" placeholder="gg/mm/aaaa HH:mm:ss" >
                                </div>
                            </div>


                        </div>
                         <?php }
}
?>

                    </div>



                    <div class="form-group row">
                        <label for="checkbox input" class="col-2 col-form-label"><b>Prenotazione</b></label>
                        <div class="pl-4 col-form-label align-content-center pt-3">
                            <input type="checkbox" class="custom-checkbox" id="checkbox input" value="1" name="prenotazione"></div>
                    </div>
                    <div class="form-group">
                        <label for="testo"><b>Descrizione</b></label>
                        <textarea class="form-control" id="testo" name="testo" rows="3"
                                  maxlength="200" size="200"><?php if (isset($_smarty_tpl->tpl_vars['prec']->value['testo'])) {
echo $_smarty_tpl->tpl_vars['prec']->value['testo'];
}?>
                        </textarea>
                        <?php if (!$_smarty_tpl->tpl_vars['check']->value['Descrizione']) {?>
                            <div class="alert alert-warning">
                                <small >
                                    Lunghezza massima 200 Caratteri Numerici
                                </small>
                            </div>
                        <?php }?>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary " >Submit</button></div>
                </div>
            </div>
        </div>
    </form>



</body>
</html><?php }
}
