
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
    <title>Nuovo Gioco</title>
</head>

<body>


{user->getUsername assign='Username'}



<!-- Navbar here -->
{include file="navbar.tpl"}


<div class="card ">

    <form method="post"  class="" action="newgioco">
        <div class="py-5">
            <div class="container ">
                <div class="col-md-12">

                    <!-- Nome Gioco -->
                    <div class="form-group row">
                        <label for="name-input" class="col-2 col-form-label"><b>Nome Gioco</b></label>
                        <div class="col-10">
                            <input type="text" name="Nome" class="form-control" maxlength="40" size="40"
                                   placeholder="Inserisci qui il Nome"
                                    {if isset($gioco->getNome())}
                                        value="{$gioco->getNome()}"
                                    {/if}
                                   ></div>
                        {if ! $check.Nome}
                            <div class="alert alert-warning">
                                <small >
                                    Lunghezza massima 40.<br> Campo obbligatorio
                                </small>
                            </div>
                        {/if}
                    </div>

                    <!-- Nome Categoria -->
                    <div class="form-group row">
                        <label for="category-input" class="col-2 col-form-label"><b>Categoria</b></label>
                        <div class="col-10 ">
                            <select class="form-control " name="Categoria" id="inlineFormCustomSelect">
                                <option value="Strategia"{if $gioco->getCategoria()=="Strategia"} selected{/if}}>Strategia</option>
                                <option value="Party"{if $gioco->getCategoria()=="Party"} selected{/if}>Party</option>
                            </select>
                        </div>
                        {if ! $check.Categoria}
                            <div class="alert alert-warning">
                                <small >
                                    Scegli una categoria.<br> Campo obbligatorio
                                </small>
                            </div>
                        {/if}
                    </div>

                    <!-- Descrizione -->
                    <div class="container-fluid row" >
                        <label for="name-input" class="col-2 col-form-label"><b>Descrizione</b></label>
                        <div class="col">
                            <textarea name="Descrizione" class="form-control" placeholder="Piccola descrizione del gioco" maxlength="3000" style="min-height: 100px">{if isset($gioco->getInfo()->getDescrizione())}{$gioco->getInfo()->getDescrizione()}{/if}</textarea>
                        </div>
                        {if ! $check.Descrizione}
                            <div class="alert alert-warning">
                                <small >
                                    Massimo 3000 caratteri.<br> Campo obbligatorio
                                </small>
                            </div>
                        {/if}

                    </div>

                    <!-- MinMax players -->
                    <div class="form-group row" style="margin-top: 10px">

                        <label for="name-input " class="my-auto"><b>Numero Minimo di giocatori</b></label>
                        <div class="col ">
                            <input type="text" name="NumeroMin" class="form-control" size="2"
                                    {if isset($gioco->getInfo()->getMin())}
                                        value="{$gioco->getInfo()->getMin()}"
                                    {/if}
                                    >
                        </div>
                        {if ! $check.NumeroMin}
                            <div class="alert alert-warning">
                                <small >
                                    Minimo 1,Massimo 99.<br> Campo obbligatorio
                                </small>
                            </div>
                        {/if}

                        <label for="name-input " class="my-auto px-4 "><b>Numero Massimo di giocatori</b></label>
                        <div class="col  px-4 ">
                            <input type="text" name="NumeroMax" class="form-control" size="2"
                                    {if isset($gioco->getInfo()->getMax())}
                                        value="{$gioco->getInfo()->getMax()}"
                                    {/if}
                                    >
                        </div>
                        {if ! $check.NumeroMax}
                            <div class="alert alert-warning">
                                <small >
                                    Minimo1,Massimo 99.<br> Campo obbligatorio
                                </small>
                            </div>
                        {/if}

                    </div>

                    <!-- CasaEditrice -->
                    <div class="form-group row">
                            <label for="name-input " class="my-auto"><b>Casa Editrice</b></label>
                            <div class="col  ">
                                <input type="text" name="CasaEditrice" class="form-control" placeholder="CasaEditrice" maxlength="40" size="40"
                                        {if isset($gioco->getInfo()->getCasaEditrice())}
                                            value="{$gioco->getInfo()->getCasaEditrice()}"
                                        {/if}
                                        > </div>
                        {if ! $check.CasaEditrice}
                            <div class="alert alert-warning">
                                <small >
                                    Massimo 40 caratteri.<br> Campo obbligatorio
                                </small>
                            </div>
                        {/if}

                    </div>
               </div>
           </div>
        </div>


        <div class="justify-content-around" style="text-align: center"  >
            <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20px;margin-right: 20px;">Submit</button>
        </div>
    </form>

    <br>
    <br>

</div>

</body>
</html>