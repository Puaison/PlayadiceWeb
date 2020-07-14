<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
    <title>Nuova Recensione</title>
</head>

<body class="">

{user->getUsername assign='Username'}

{include file="navbar.tpl"}

<div class="container text-center ">
    <div class="col-sm-3">
    </div>

        <h2>Nuova Recensione</h2>

        <!-- FORM -->
        <form class="form-horizontal" method="post" action="newrecensione?{$gioco->getId()}">
            <!-- Voto -->
            <div class="form-group row">
                <label for="user" class="col-md-5 col-form-label">Voto:</label>
                <div class="col">
                    <select class="form-control " name="Voto">
                        <option selected="" value="Choose...">Choose...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </div>
                {if ! $check.Voto}
                    <div class="alert alert-warning">
                        <small >
                            Scegli un voto dalla lista<br>Campo obbligatorio
                        </small>
                    </div>
                {/if}
            </div>
            <div class="form-group row">
                <!-- Commento -->
                <label class="col-sm-5 col-form-label col">Commento:</label>
                <div class="col">
                    <textarea class="form-control border-primary" name="Commento" placeholder="Dicci cosa ne pensi" maxlength="500"></textarea>
                </div>
                {if ! $check.Commento}
                    <div class="alert alert-warning">
                        <small >
                            Massimo 500 caratteri<br>Campo obbligatorio
                        </small>
                    </div>
                {/if}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Invia</button>
            </div>
            <input type="hidden" name="IdGioco" value="{$gioco->getId()}">
        </form>

</div>
</div>
</body>
</html>