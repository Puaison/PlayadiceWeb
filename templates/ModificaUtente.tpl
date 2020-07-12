<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
    <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
    <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
    <title>Modifica {$utente->getUsername()}</title>
</head>
<body>

{user->getUsername assign='Username'}

{include file="navbar.tpl"}

<div class="container text-center">
    <div class="col-sm-3">

    </div>
        <h2>Register</h2>
        <hr>
        <form method="post" enctype="multipart/form-data" action="modifymyutente">


            <div class="form-group row">
                <label for="mail" class="col-sm-5 col-form-label ">Email:</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control " id="mail" name="Mail" placeholder="Insert email..." maxlength="40"
                            {if isset($utente->getMail())}
                        value="{$utente->getMail()}"
                            {/if}>
                </div>
                {if ! $check.Mail}
                    <div class="alert alert-warning">
                        <small >
                            Deve essere un'email(lunghezza max 40).
                        </small>
                    </div>
                {/if}

            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-5 col-form-label ">Nome:</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control " id="mail" name="Nome" placeholder="Insert Name..." maxlength="20"
                            {if isset($utente->getNome())}
                        value="{$utente->getNome()}"
                            {/if}>
                </div>
                {if ! $check.Nome}
                    <div class="alert alert-warning">
                        <small >
                            Solo Caratteri(lunghezza max 20).
                        </small>
                    </div>
                {/if}

            </div>
            <div class="form-group row">
                <label for="cognome" class="col-sm-5 col-form-label ">Cognome:</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control " id="mail" name="Cognome" placeholder="Insert Surname..." maxlength="30"
                            {if isset($utente->getCognome())}
                        value="{$utente->getCognome()}"
                            {/if}>
                </div>
                {if ! $check.Cognome}
                    <div class="alert alert-warning">
                        <small>
                            Solo Caratteri(lunghezza max 20).
                        </small>
                    </div>
                {/if}

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</div>
    <div class="col-sm-3">

    </div>

</body>
</html>
