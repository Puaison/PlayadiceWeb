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
        <div class="row">
            <div class="px-5 col-lg-6 flex-column align-items-start justify-content-center order-1 order-lg-2" >
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><b>{$gioco->getNome()}</b></h5>
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
                        <!--
                        <div class='row '>
                            {if $UtenteType == "admin"}
                            <div class="col"> <a class="btn btn-primary" href="">Modifica</a></div>
                            {/if}

                        </div>
                        -->


                    </div>


                </div>
            </div>

        </div>
    </div>
</div>


</body>

</html>

