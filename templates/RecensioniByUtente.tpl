<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../Resources/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
    <title>Recensioni di {$user->getUsername()}</title>
</head>
<body>

{user->getUsername assign='Username'}
{user->getModeratore assign='Tipo'}




<!-- Navbar here -->

{include file="navbar.tpl"}
<hr>


<!-- Sezione per le recensioni -->
{if   !empty($Recensioni) }
{foreach from=$Recensioni item=$rec}
    <div class="container py-4">
        <div class="card">
            <div class="px-5  flex-column  order-1 order-lg-2" >
                <div class="row text-left">
                    <b> <h4>Voto:  {$rec->getVoto()}</h4></b></div>
                <div class="row">{$rec->getCommento()}
                </div>
                <div class="row py-4">
                    <div class="col-md-3"></div>
                    <div class="col"><b>Gioco associato:{$rec->getEGioco()->getNome()}</b></div>
                    {if $Username == $rec->getEUtente()->getUsername() || $UtenteType == 'admin'}
                    <div class="col"><a class="btn btn-primary" href="/playadice/giocoinfo/removerecensione?{$rec->getEUtente()->getUsername()}?{$gioco->getId()}">Elimina</a></div>
                    {/if}
                </div>

            </div></div></div>
{/foreach}
    {else}
    Questo Utente non ha fatto nessuna recensione
{/if}


</body>

</html>

