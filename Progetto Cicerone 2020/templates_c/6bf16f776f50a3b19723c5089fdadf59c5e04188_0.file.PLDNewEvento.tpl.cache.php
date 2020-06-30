<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-30 16:12:12
  from 'C:\xampp\htdocs\Progetto-PW\Progetto Cicerone 2020\templates\PLDNewEvento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efb483c756ca8_52146140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bf16f776f50a3b19723c5089fdadf59c5e04188' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Progetto-PW\\Progetto Cicerone 2020\\templates\\PLDNewEvento.tpl',
      1 => 1593526332,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efb483c756ca8_52146140 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17280672155efb483c71c331_51846229';
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
 src="bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="/Progetto-PW/Pld/now-ui-kit.css" type="text/css">


    <title>Playadice - Home</title>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <ul class="navbar-nav">
            <ul class="navbar-nav">
                <a class="nav-link" href="#download"> &nbsp;Benvenuto NomeUtente</a>
                <a class="nav-link space" href=""> &nbsp;Spazio43</a>
                <a class="nav-link" href="#download"> &nbsp;Eventi</a>
                <a class="nav-link" href="#download"> &nbsp;Giochi</a>
                <a class="nav-link" href="#download"> &nbsp;AreaTWG</a>
            </ul>
        </ul>
    </div>
    <div class="container">
    </div>
    <a class="btn navbar-btn ml-md-2 btn-light text-dark">Login/Logout</a>
    <a href="" class="nav-link space"> &nbsp;Spazio</a>
    <ul class="navbar-nav flex-row justify-content-center mt-2 mt-md-0">
        <li class="nav-item mx-3 mx-md-1">
            <a class="nav-link" href="https://www.facebook.com/Playadice/?epa=SEARCH_BOX" data-placement="bottom" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-fw fa-facebook-official fa-2x"></i>
            </a>
        </li>
        <li class="nav-item ml-1">
            <a class="nav-link" href="https://www.instagram.com/playadiceofficial/?hl=it" data-placement="bottom" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-fw fa-instagram fa-2x"></i>
            </a>
        </li>
    </ul>
</nav>

<div class="card ">

    <form id="c_form-h" class="">
        <div class="py-5">
            <div class="container ">
                <div class="col-md-12">
                    <div class="form-group row"> <label for="name-input" class="col-2 col-form-label"><b>Nome Evento</b></label>
                        <div class="col-10">
                            <input type="text" class="form-control" placeholder="Inserisci qui il Testo"> </div>
                    </div>
                    <div class="form-group row"> <label for="category-input" class="col-2 col-form-label"><b>Categoria</b></label>
                        <div class="col-10 ">
                            <select class="form-control " id="inlineFormCustomSelect">
                                <option selected="" value="Choose...">Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
                                    <input type="text" class="form-control" placeholder="Nome del Luogo">
                                </div>
                                <label for="name-input " class="my-auto"><b>Via</b></label>
                                <div class="col ">
                                    <input type="text" class="form-control" placeholder="Via xxxxxx, #civico"> </div>
                            </div>
                            <div class=" form-group row ">
                                <label for="name-input " class="my-auto px-4 "><b>Città</b></label>
                                <div class="col-5  px-4 ">
                                    <input type="text" class="form-control" placeholder="Città">
                                </div>
                                <label for="name-input " class="my-auto"><b>CAP</b></label>
                                <div class="col  ">
                                    <input type="text" class="form-control" placeholder="CAP"> </div>
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
                                <label for="example-date-input" class="col-2 col-form-label"><b>Giorno</b></label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="example-date-input" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-time-input" class="col-2 col-form-label"><b>Ora</b></label>
                                <div class="col-10">
                                    <input type="time" class="form-control" id="example-date-input"  >
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
                            <input type="checkbox" class="custo-checkbox" id="checkbox input" ></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><b>Descrizione</b></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary " >Submit</button></div>
                </div>
            </div>
        </div>
    </form>

</div>

</body>
</html><?php }
}
