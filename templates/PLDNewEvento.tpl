
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
    <title>Playadice - Home</title>
</head>

<body>


{user->getUsername assign='Username'}


<!-- Navbar here -->
{include file="navbar.tpl"}


<div class="card ">

    <form method="post" id="c_form-h" class="" action="store">
        <div class="py-5">
            <div class="container ">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="name-input" class="col-2 col-form-label"><b>Nome Evento</b></label>
                        <div class="col-10">
                            <input type="text" name="nome" class="form-control" placeholder="Inserisci qui il Testo"> </div>
                    </div>
                    <div class="form-group row">
                        <label for="category-input" class="col-2 col-form-label"><b>Categoria</b></label>
                        <div class="col-10 ">
                            <select class="form-control " name="categoria" id="inlineFormCustomSelect">
                                <option selected="" value="Choose...">Choose...</option>
                                <option value="Torneo">Torneo</option>
                                <option value="Free Play">Free Play</option>

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
                                    <input type="text" name="nomeluogo" class="form-control" placeholder="Nome del Luogo">
                                </div>
                                <label for="name-input " class="my-auto"><b>Via</b></label>
                                <div class="col ">
                                    <input type="text" name="via" class="form-control" placeholder="Via xxxxxx, #civico"> </div>
                            </div>
                            <div class=" form-group row ">
                                <label for="name-input " class="my-auto px-4 "><b>Città</b></label>
                                <div class="col-5  px-4 ">
                                    <input type="text" name="citta" class="form-control" placeholder="Città">
                                </div>
                                <label for="name-input " class="my-auto"><b>CAP</b></label>
                                <div class="col  ">
                                    <input type="text" name="cap" class="form-control" placeholder="CAP"> </div>
                            </div>
                        </div>
                    </div>



                    <div>
                        <div class="form-group row"> <label for="name-input" class="col-2 col-form-label"><b>Aggiungi una Fascia</b></label>

                        </div>

                        {for $foo=1 to 10}
                            <a class="btn    btn-primary" data-toggle="collapse" href="#{$foo}" role="button" aria-expanded="false" aria-controls="#{$foo}">
                                +
                            </a>

                        <div class="collapse" id="{$foo}">
                            <div class="form-group row">
                                <label  class="col-2 col-form-label"><b>Giorno di Inizio</b></label>
                                <div class="col-10">

                                    <input type="text" name="{$foo}" class="form-control" id="example-date-input" placeholder="gg/mm/aaaa HH:mm:ss" >
                                </div>
                                <label  class="col-2 col-form-label"><b>Giorno di Fine</b></label>
                                <div class="col-10">
                                    <input type="text" name="{$foo+11}" class="form-control" id="example-date-input" placeholder="gg/mm/aaaa HH:mm:ss" >
                                </div>
                            </div>


                        </div>
                         {/for}

                    </div>



                    <div class="form-group row">
                        <label for="checkbox input" class="col-2 col-form-label"><b>Prenotazione</b></label>
                        <div class="pl-4 col-form-label align-content-center pt-3">
                            <input type="checkbox" class="custom-checkbox" id="checkbox input" value="1" name="prenotazione"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><b>Descrizione</b></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="testo" rows="3"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary " >Submit</button></div>
                </div>
            </div>
        </div>
    </form>

</div>

</body>
</html>