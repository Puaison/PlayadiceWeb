<!DOCTYPE html>
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
        <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
        <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
        <link rel="stylesheet" href="Pld/assets/css/nucleo-icons.css" type="text/css">
        <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
        <title>Playadice Home</title>
</head>

<body class="">

{user->getUsername assign='Username'}

<!-- Navbar here -->
{include file="navbar.tpl"}

<!-- Sezione immagini here -->
<div class="column" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
        <div class="container py-5">
                <div class="container py-5">
                        <div class="row">
                                <img class="img-fluid d-block pi-draggable" src="templates/assets/Giocodatavolo.jpg">
                                <div class="card pi-draggable ">
                                        <div class="card-body ">{if   !empty($giochi) }

                                                <h5 class="card-title"><b>Top 5 Games</b></h5>

                                                        <ol class=""><h6>
                                                        {foreach from=$giochi item=$gioco}
                                                        <li>{$gioco->getNome()}</li>
                                                        {/foreach}</h6>
                                                        </ol>
                                                        {else}
                                                        Nessun gioco da mostrare
                                                        {/if}

                                                <a href="/playadice/catalogo/catalogocompleto" class="btn btn-primary justify-content-center">Vai al catalogo</a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="container py-5">
                <div class="container py-5">
                        <div class="row">
                                <img class="img-fluid d-block pi-draggable" src="https://static.pingendo.com/img-placeholder-1.svg">
                                <div class="card pi-draggable">
                                        <div class="card-body">
                                                <h5 class="card-title"><b>Titolo Sezione</b></h5>
                                                <h6 class="card-subtitle my-2 text-muted">Sottotitolo</h6>
                                                <p class="card-text">Messagino</p>
                                                <a href="#" class="card-link">Link alla sezione</a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="container py-5">
                <div class="container py-5">
                        <div class="row">
                                <img class="img-fluid d-block pi-draggable" src="https://static.pingendo.com/img-placeholder-1.svg">
                                <div class="card pi-draggable">
                                        <div class="card-body">
                                                <h5 class="card-title"><b>Titolo Sezione</b></h5>
                                                <h6 class="card-subtitle my-2 text-muted">Sottotitolo</h6>
                                                <p class="card-text">Messagino</p>
                                                <a href="#" class="card-link">Link alla sezione</a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <!-- Sezione Our Team -->
        <div class="py-5 pi-draggable text-center text-white" style="background: transparent">
                <div class="container">
                        <div class="row">
                                <div class="mx-auto col-md-12">
                                        <h1 class="mb-3">Il nostro team</h1>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="https://static.pingendo.com/img-placeholder-1.svg" alt="Card image cap" width="200">
                                        <h4> <b>Antonio M. Marottoli</b> </h4>
                                        <p class="mb-0">CEO e fondatore</p>
                                </div>
                                <div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="templates/assets/LucaDelSignore.jpg" alt="Card image cap" width="200">
                                        <h4> <b>Luca Del Signore</b> </h4>
                                        <p class="mb-0">Il Presidentissimo</p>
                                </div>
                                <div class="col-lg-4 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="https://static.pingendo.com/img-placeholder-3.svg" width="200">
                                        <h4> <b>Alessio Perozzi</b> </h4>
                                        <p class="mb-0">Detto "Esperozzi"</p>
                                </div>
                        </div>
                </div>
        </div>

</div>

</body>

</html>