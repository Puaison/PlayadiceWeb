<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
    <title>Modifica {$utente->getUsername()}</title>
</head>
<body>

{user->getUsername assign='Username'}

{include file="navbar.tpl"}

<div class="container text-center">
    <div class="col-sm-3">

    </div>
        <h2>Modifica Password</h2>
        <hr>
        <form method="post" enctype="multipart/form-data" action="modifymypassword">


            <div class="form-group row">
                <label for="mail" class="col-sm-5 col-form-label ">Password attuale:</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control " id="mail" name="OldPassword"  maxlength="20">
                </div>
                {if ! $check.OldPassword}
                    <div class="alert alert-warning">
                        <small >
                            Password attuale non corretta
                        </small>
                    </div>
                {/if}

            </div>
            <div class="form-group row">
                <label for="nome" class="col-sm-5 col-form-label ">Nuova Password:</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control " id="mail" name="Password"  maxlength="20">
                </div>
                {if ! $check.Password}
                    <div class="alert alert-warning">
                        <small>
                            6-20 Caratteri Alphanumerici.
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
