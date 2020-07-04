<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">

    <title>{$results[0]->getNome()}</title>
</head>
<body>

{user->getUsername assign='Username'}
{user->getModeratore assign='Tipo'}


<!-- Navbar here -->

{include file="navbar.tpl"}

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 p-0"> <img class="img-fluid d-block" src="https://static.pingendo.com/cover-moon.svg" style="" h="100" w="100"> </div>
            <div class="px-5 col-lg-6 d-flex flex-column align-items-start justify-content-center order-1 order-lg-2" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>{$results[0]->getNome()}</b></h5>
                        <h6 class="card-subtitle my-2 text-muted">{$results[0]->getCategoria()}</h6>
                        <h6 class="card-subtitle my-2 text-">{$results[0]->getLuogo()}</h6>

                        <div class="row">

                            <div class="col-xl-12 text-center border-secondary  "><b>orari</b></div>
                            <div class="col-xl-6 text-center "><b>Inizio </b></div>

                            <div class="col-xl-6 text-center "><b>Fine </b></div>

                            {$fasce=$results[0]->getFasce()}

                            <!----inizio selezione fasce---->
                            <!----Data Inizio--->
                            {foreach from=$fasce item=$fascia}
                            <div class="col-xl-6 text-center  " ><b>{$fascia->getDataStr()} </b></div>

                                <div class="col-xl-6 text-center "><b>{$fascia->getFine()} </b></div>

                            {/foreach}
                        </div>


                        <p class="card-text mt-sm-3">{$results[0]->getTesto()}</p>
                        <div class='row'>
                            {if $Tipo}
                            <div class="col"> <a class="btn btn-primary" type="submit" href="/playadice/evento/delete?{$results[0]->getId()}">Annulla</a></div>
                            <div class="col"> <a class="btn btn-primary" type="submit" href="/playadice/evento/modify?{$results[0]->getId()}">Modifica</a></div>{/if}

                        <div class="pull-right"><button class="btn btn-primary pi-draggable" type="submit"style="text-end" href="#" draggable="true">Prenotati</button>
                            <button class="btn btn-primary " type="submit" style="text-end" href="#" draggable="true" disabled>Già Prenotato</button></div></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

