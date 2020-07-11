<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">


    <title>{$gioco->getNome()}</title>
</head>
<body>

{user->getUsername assign='Username'}
{user->getModeratore assign='Tipo'}




<!-- Navbar here -->

{include file="navbar.tpl"}
<hr>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="px-5 col-lg-6 flex-column align-items-start justify-content-center order-1 order-lg-2" >
                <div class="card ">
                    <div class="card-body">

                        <h5 class="card-title"><b>{$gioco->getNome()}</b></h5>
                        {if $UtenteType == "admin"}
                        <a class="btn btn-primary" href="/playadice/catalogo/modificagioco?{$gioco->getId()}">Modifica</a>
                        {/if}
                        <h6 class="card-subtitle my-2 text-muted">Della: {$gioco->getInfo()->getCasaEditrice()}</h6>
                        <h6 class="card-subtitle my-2 text-muted">{$gioco->getCategoria()}</h6>
                        <h6 class="card-subtitle my-2 text-center">
                            {if $gioco->getVotoMedio()==0}Ancora nessuna recensione
                            {else}
                            Voto della community: {$gioco->getVotoMedio()}
                            {/if}</b></b></h6>
                        <div class="row">

                            <div class="col-xl-6 text-center "><b>Giocatori Minimi </b></div>

                            <div class="col-xl-6 text-center "><b>Giocatori Massimi </b></div>




                            <div class="col-xl-6 text-center  " ><b>{$gioco->getInfo()->getMin()} </b></div>

                            <div class="col-xl-6 text-center "><b>{$gioco->getInfo()->getMax()} </b></div>


                        </div>
                        <p class="card-text mt-sm-3">{$gioco->getInfo()->getDescrizione()}</p>
                        <div class="row justify-content-center">
                            {if $UtenteType=="ospite"}
                                <a class="btn btn-primary " href="/playadice/utente/login">Logga per recensire</a>
                            {elseif $check.Esistente}
                                        <a class="btn btn-block" href="">Hai già recensito</a>
                                {else}
                                <a class="btn btn-primary " href="/playadice/giocoinfo/newrecensione?{$gioco->getId()}">Inserisci recensione</a>
                            {/if}
                        </div>


                    </div>


                </div>
            </div>

        </div>

    </div>

</div>
<!-- Sezione per le recensioni -->
{if   !empty($gioco->getRecensioni()) }
{foreach from=$gioco->getRecensioni() item=$rec}
    <div class="container py-4">
        <div class="card">
            <div class="px-5  flex-column  order-1 order-lg-2" >
                <div class="row text-left">
                    <b> <h4>Voto:  {$rec->getVoto()}</h4></b></div>
                <div class="row">{$rec->getCommento()}
                </div>
                <div class="row py-4">
                    <div class="col-md-3"></div>
                    <div class="col"><b>Utente:{$rec->getEUtente()->getUsername()}</b></div>
                    {if $Username == $rec->getEUtente()->getUsername() || $UtenteType == 'admin'}
                    <div class="col"><a class="btn btn-primary" href="/playadice/giocoinfo/removerecensione?{$rec->getEUtente()->getUsername()}?{$gioco->getId()}">Elimina</a></div>
                    {/if}
                </div>

            </div></div></div>
{/foreach}
{/if}


</body>

</html>

