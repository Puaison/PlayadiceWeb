<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../Resources/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
    <title>{$results[0]->getNome()}</title>
</head>
<body>

{user->getUsername assign='Username'}
{user->getModeratore assign='Tipo'}


<!-- Navbar here -->

{include file="navbar.tpl"}
{if $check}<hr>
    <div class="alert alert-warning text-center">
        <br>Prenotazione avvenuta con successo <br></div> {/if}
{if is_null($error)}
    {else}
{if $error==true}<hr>
    <div class="alert alert-warning text-center">
        <br>Ti sei già prenotato! <br></div>
{else}<div class="alert alert-warning text-center">
    <br>Hai già disdetto la prenotazione<br></div>{/if}{/if}
{if $book}<hr>
    <div class="alert alert-warning text-center">
        <br>Eliminazione Prenotazione effettuata con successo <br></div> {/if}


{$prenotazioni=$results[0]->getPrenotazioni()}
{$check=false}
{foreach from=$prenotazioni item=$value}
    {$nome=$value->getUtente()->getUsername()}
    {if ($nome == $Username)}
        {$id=$value->getId()}
        {$check=true}
    {/if}
{/foreach}


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 p-0">
                <img class="img-fluid d-block" src="../templates/assets/{$results[0]->getId()}.png" style="" h="100" w="100">
            </div>
            <div class="px-5 col-lg-6 flex-column align-items-start justify-content-center order-1 order-lg-2" >
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><b>{$results[0]->getNome()}</b></h5>
                        <h6 class="card-subtitle my-2 text-muted">{$results[0]->getCategoria()}</h6>
                        <h6 class="card-subtitle my-2 text-">{$results[0]->getLuogo()}</h6>
                        {if boolval($results[0]->getFlag()) && $UtenteType == "admin"}
                        <form action="/playadice/evento/prenotazioni?{$results[0]->getId()}" method="post">
                            <button type="submit"  class="btn btn-primary">Prenotazioni
                            </button>
                        </form>

                        {/if}

                        <div class="row justify-content-center">
                        <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q={$results[0]->getLuogo()->getVia()}%20{$results[0]->getLuogo()->getCitta()}+({$results[0]->getLuogo()->getNome()})&amp;;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="520" height="400" frameborder="0"></iframe>
                        <a href='http://maps-generator.com/it'>Maps-Generator</a>
                        <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=5155081843cd47bdd51e595e649f398d71de3958'></script>
                        </div>
                        <div class="row">
                            {$fasce=$results[0]->getFasce()}
                            {if !empty(($fasce))}

                            <div class="col-xl-12 text-center border-secondary  "><b>Orari</b></div>
                            <div class="col-xl-6 text-center "><b>Inizio </b></div>

                            <div class="col-xl-6 text-center "><b>Fine </b></div>



                            <!----inizio selezione fasce---->
                            <!----Data Inizio--->

                            {foreach from=$fasce item=$fascia}
                            <div class="col-xl-6 text-center  " ><b>{$fascia->getDataStr()} </b></div>

                                <div class="col-xl-6 text-center "><b>{$fascia->getFine()} </b></div>

                            {/foreach}
                            {/if}
                        </div>
                        <p class="card-text mt-sm-3">{$results[0]->getTesto()}</p>
                        {$data=$results[0]->getStartDate()}
                        {if $data>date_create()}
                        <div class='row '>
                            {if $UtenteType == "admin"}
                            <div class="col"> <form action="/playadice/evento/delete?{$results[0]->getId()}" method="post"> <button class="btn btn-primary" type="submit" >Annulla</button></form></div>
                            <div class="col"> <a class="btn btn-primary" type="submit" href="/playadice/evento/modify?{$results[0]->getId()}">Modifica</a></div>
                            {/if}
                            {if boolval($results[0]->getFlag())}
                                    {if !$check}
                                        <div class="col">
                                            <!-- Button trigger modal -->
                                            <div class="text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" href="#prenotati">
                                                Prenotati
                                            </button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="text-center">
                                                <div class="modal fade" id="prenotati" tabindex="-1" role="dialog" aria-labelledby="prenotati" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="prenotati">Ciao {user->getUsername}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Vuoi prenotarti a questo evento?
                                                            </div>
                                                            {if $UtenteType == "ospite"}
                                                            <div class="modal-body">
                                                                Devi aver effettuato il Login per farlo!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a type="submit" href="../utente/login" class="btn btn-primary">Login</a>
                                                            </div>
                                                                {else}
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="../evento/booking?{$results[0]->getId()}" method="post">
                                                                <button type="submit"  class="btn btn-primary">Si
                                                                </button>
                                                            </form>
                                                            </div>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {else}
                                        <div class="col text-right">
                                            <button type="button" class="btn btn-primary " data-toggle="modal" href="#sprenotati" >Già Prenotato</button>
                                        </div>
                                            <!-- Modal -->
                                            <div class="text-center">

                                                <div class="modal fade" id="sprenotati" tabindex="-1" role="dialog" aria-labelledby="sprenotati" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="sprenotati">Ciao {user->getUsername}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Vuoi disdire la tua prenotazione?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="../evento/delBooking?{$id}?{$results[0]->getId()}" method="post">
                                                                    <button type="submit"  class="btn btn-primary">Si
                                                                    </button>
                                                                </form>
                                                            </div>
                                        </div>
                                    {/if}
                            {/if}

                        </div>


                    </div>


                </div>
            </div>

        </div>
                        {/if}
    </div>
</div>


</body>

</html>

