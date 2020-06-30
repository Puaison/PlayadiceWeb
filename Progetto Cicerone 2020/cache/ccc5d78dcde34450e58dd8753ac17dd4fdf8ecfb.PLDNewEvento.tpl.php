<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-25 21:43:24
  from 'C:\xampp\htdocs\Progetto-PW\Progetto Cicerone 2020\templates\PLDNewEvento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef4fe5c17a593_04013270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bf16f776f50a3b19723c5089fdadf59c5e04188' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Progetto-PW\\Progetto Cicerone 2020\\templates\\PLDNewEvento.tpl',
      1 => 1593114203,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5ef4fe5c17a593_04013270 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="/Progetto-PW/Pld/now-ui-kit.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nucleo-icons.css" type="text/css">

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
<div class="card">

<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <form id="c_form-h" class="">
                    
                    <div class="form-group row"> <label for="name-input" class="col-2 col-form-label">Nome Evento</label>
                        <div class="col-10">
                            <input type="text" class="form-control" placeholder="Inserisci qui il Testo"> </div>
                    </div>
                    <div class="form-group row"> <label for="category-input" class="col-2 col-form-label">Categoria</label>
                        <div class="col-10">
                    <select class="form-control " id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    </div>
                    </div>
                    <div class="form-group row"> <label for="category-input" class="col-2 col-form-label">Categoria</label>
                        <div class="col-10">
                            <input type="text" class="form-control" placeholder="Testo" id="category-input"> </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Giorno</label>
                        <div class="col-10">
                            <input type="date" class="form-control" id="example-date-input" value="2011-08-19" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-time-input" class="col-2 col-form-label">Ora</label>
                        <div class="col-10">
                            <input type="time" class="form-control" id="example-date-input" value="13:45:00">
                        </div>
                    </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary ">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html><?php }
}
