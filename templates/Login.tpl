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
    <title>Login/SignUp</title>
</head>

<body class="">

{user->getUsername assign='Username'}

{include file="navbar.tpl"}

<div class="container text-center ">
    <div class="col-sm-3">
    </div>

        <h2>Login</h2>
        <hr> {if $error}
        <div class="alert alert-warning">
            <!-- Errore-->
            <strong>Attenzione!</strong><br>Username o Password errati. <br>Per favore riprova. </div> {/if}

        <!-- FORM -->
        <form class="form-horizontal" method="post" action="login">
            <!-- Nickname -->
            <div class="form-group row">
                <label for="user" class="col-md-5 col-form-label">Username:</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control border-primary" id="user" name="Username" placeholder="Username"  maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <!-- Campo password -->
                <label for="inputPassword" class="col-sm-5 col-form-label col">Password:</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control border-primary" id="inputPassword" name="Password" placeholder="Password" maxlength="20">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>

        <a href="/playadice/utente/signup">
            Clicca qui per registrarti
        </a>

</div>
</div>
</body>
</html>