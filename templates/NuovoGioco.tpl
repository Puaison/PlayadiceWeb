
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
    <title>Crea Gioco</title>
</head>

<body>


{user->getUsername assign='Username'}



<!-- Navbar here -->
{include file="navbar.tpl"}


<div class="card ">

    <form method="post" id="newgioco" class="" action="newgioco">
        <div class="py-5">
            <div class="container ">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="name-input" class="col-2 col-form-label"><b>Nome Gioco</b></label>
                        <div class="col-10">
                            <input type="text" name="Nome" class="form-control" maxlength="40" size="40"
                                    {if isset($Gioco->getNome())}
                                        value="{$gioco->getNome()}"
                                    {/if}
                                   placeholder="Inserisci qui il Nome"></div>
                        {if ! $check.Nome}
                        <div class="alert alert-warning">
                            <small >
                                Lunghezza massima 40.
                            </small>
                        </div>
                        {/if}
                    </div>

                    <div class="form-group row">
                        <label for="category-input" class="col-2 col-form-label"><b>Categoria</b></label>
                        <div class="col-10 ">
                            <select class="form-control " name="Categoria" id="inlineFormCustomSelect">
                                <option selected value="Choose...">Choose...</option>
                                <option value="Strategia">Strategia</option>
                                <option value="Party">Party</option>

                            </select>
                        </div>
                        {if ! $check.Categoria}
                            <div class="alert alert-warning">
                                <small >
                                    Scegli una categoria.
                                </small>
                            </div>
                        {/if}
                    </div>
                            <div class=" form-group row">
                                <label for="name-input " class="my-auto px-4 "><b>Descrizione</b></label>
                                <div class="col-4 ">
                                    <textarea name="Descrizione"  class="form-control" placeholder="Piccola descrizione del gioco" maxlength="3000" size="400"></textarea>
                                </div>
                                {if ! $check.Descrizione}
                                    <div class="alert alert-warning">
                                        <small >
                                            Massimo 3000 caratteri.
                                        </small>
                                    </div>
                                {/if}
                            </div>

                            <div class="form-group row"
                                <label for="name-input " class="my-auto"><b>Numero Minimo di giocatori</b></label>
                                <div class="col ">
                                    <input type="text" name="NumeroMin" class="form-control" size="2" >
                                </div>
                            {if ! $check.NumeroMin}
                                <div class="alert alert-warning">
                                    <small >
                                        Minimo 1.
                                    </small>
                                </div>
                            {/if}
                                <label for="name-input " class="my-auto px-4 "><b>Numero Massimo di giocatori</b></label>
                                <div class="col-5  px-4 ">
                                    <input type="text" name="NumeroMax" class="form-control" size="2">
                                </div>
                                {if ! $check.NumeroMax}
                                    <div class="alert alert-warning">
                                        <small >
                                            Massimo 99.
                                        </small>
                                    </div>
                                {/if}
                        </div>

                        <div class="form-group row">
                                <label for="name-input " class="my-auto"><b>Casa Editrice</b></label>
                                <div class="col  ">
                                    <input type="text" name="CasaEditrice" class="form-control" placeholder="CasaEditrice" maxlength="40" size="40"> </div>
                                {if ! $check.CasaEditrice}
                                    <div class="alert alert-warning">
                                        <small >
                                            Massimo 40 caratteri.
                                        </small>
                                    </div>
                                {/if}
                        </div>
            </div>
        </div>

        </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary " >Submit</button>
                    </div>
                </div>
    </form>

</div>

</body>
</html>