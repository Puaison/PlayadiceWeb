<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>TVG Home</title>
</head>

<body class="">

{user->getUsername assign='Username'}

<!-- Navbar here -->
{include file="navbar.tpl"}

<!-- Alert-->

<!-- Sezione Ricerca here -->
<div class="container-fluid" draggable="true" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">

        <div class="container-fluid" style="background: red" >
                <div class="row justify-content-center" style=" margin-top: 15px; margin-bottom: 15px ">
                        <div class="col-sm-8 align-self-center" >
                        <!-- FORM -->
                                <form method="post" id="Ricercaform" action="search">
                                        <div class="row">
                                                <label for="Parametro">Parametro:</label><br>
                                                <input type="text" id="Parametro" name="Parametro">
                                                <label for="Tipo">Scegli un tipo di ricerca:</label>
                                                <select id="Tipo" name="TipoRicerca" form="Ricercaform">
                                                        <option value="Nome">Nome</option>
                                                        <option value="Autore">Autore</option>
                                                </select>
                                                <button href="/playadice/ricerca/Search" > Cerca </button>
                                        </div>
                                </form>
                        </div>

                        <div class="col-sm-4">
                          <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/create" style=" margin-top: 5px; margin-bottom: 5px "> New </a>
                        </div>
                </div>
        </div>

        <div class="container-fluid" style="background: purple">
                <div class="row justify-content-around">
                        <div class="col"><p style="color:White;">Nome</p></div>
                        <div class="col"><p style="color:White;">Classe</p></div>
                        <div class="col"><p style="color:White;">Livello</p></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                </div>
        </div>


        <!-- Sezione I miei PG here

                <div class="row pi-draggable">
                        <div class="col-md-2 " style="Text-align:center">
                                <p style="color:White;">Nome</p>
                        </div>
                        <div class="col-md-2" style="Text-align:center">
                                <p style="color:White;">Classe</p>
                        </div>
                        <div class="col-md-2" style="Text-align:center">
                                <p style="color:White;">Livello</p>
                        </div>
                </div>

                        <div class="row pi-draggable">
                                <div class="col-md-2" style="Text-align:center">
                                        <p style="color:White;">Nome</p>
                                </div>
                                <div class="col-md-2" style="Text-align:center">
                                        <p style="color:White;">Classe</p>
                                </div>
                                <div class="col-md-2" style="Text-align:center">
                                        <p style="color:White;">Livello</p>
                                </div>
                                <div class="col-md-2" style="Text-align:center">
                                        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/details?">Dettagli</a>
                                </div>
                                <div class="col-md-2" style="Text-align:center">
                                        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/modify?">Modifica</a>
                                </div>
                                <div class="col-md-2" style="Text-align:center">
                                        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/avatar/delete?">Elimina</a>
                                </div>
                        </div>

        <br>
        <br>

         Fine Sezione -->
</div>
<!-- Sezione Our Team -->

</body>

</html>