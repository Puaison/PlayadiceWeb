<!DOCTYPE html>
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




                            <div class="col-xl-6 text-center  " ><b>{$fascia->getData()} </b></div>

                                <div class="col-xl-6 text-center "><b>{$fascia->getFine()} </b></div>

                            {/foreach}
                        </div>
                        </span>


                        <p class="card-text mt-sm-3">Some quick example text to build on the card title and make up the bulk of the card's content.
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                            Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        <div class="text-right"><button class="btn btn-primary pi-draggable" type="submit"style="text-end" href="#" draggable="true">Prenotati</button>
                            <button class="btn btn-primary pi-draggable" type="submit"style="text-end" href="#" draggable="true" disabled>Già Prenotato</button></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

