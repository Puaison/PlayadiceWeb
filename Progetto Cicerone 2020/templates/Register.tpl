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
    <title>Html Test</title>
</head>
<body>

{user->getUsername assign='Username'}

{include file="navbar.tpl"}

<div class="container text-center">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-7 well">
        {if $error}
            <div class="alert alert-warning">
                <strong>Warning!</strong><br>Wrong combination of user and password. <br>Please retry.
            </div>
        {/if}
        <h2>Register</h2>
        <hr>
        <form method="post" enctype="multipart/form-data" action="signup">

            <div class="form-group row">
                <label for="user" class="col-sm-2 col-form-label {if !$check.name} text-danger{/if}">User: *</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control is-invalid" id="user" name="name" placeholder="Insert username...">
                </div>
                {if ! $check.name}
                    <div class="col-sm-3 well">
                        <small id="userHelp" class="text-danger">
                            Must be 3-20 characters long.
                        </small>
                    </div>
                {/if}
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label {if !$check.pwd} text-danger{/if}">Password:</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control is-invalid" id="inputPassword" name="pwd" placeholder="Password">
                </div>
                {if ! $check.pwd}
                    <div class="col-sm-3 well">
                        <small id="passwordHelp" class="text-danger">
                            Must be 8-20 characters long.
                        </small>
                    </div>
                {/if}
            </div>

            <div class="form-group row">
                <label for="mail" class="col-sm-2 col-form-label {if !$check.mail} text-danger{/if}">Mail: *</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control is-invalid" id="mail" name="mail" placeholder="Insert email...">
                </div>
                {if ! $check.mail}
                    <div class="col-sm-3 well">
                        <small id="mailHelp" class="text-danger">
                            Must be an email.
                        </small>
                    </div>
                {/if}
            </div>
            <hr>
            <h2 id="important">User Type:</h2>
            <br>
            <div class="form-check">
                <label class="form-check-label"> <input type="radio"
                                                        class="form-check-input" name="type" value="listener" checked>
                    Listener
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label"> <input type="radio"
                                                        class="form-check-input" name="type" value="musician">
                    Musician
                </label>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <div class="col-sm-3">

    </div>

</body>
</html>
