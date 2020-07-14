<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="Resources/now-ui-kit.css" type="text/css">
</head>

<body >
<div class="container text-center content">
        <div class="col">
                <div class="well">
                        <h1 id="important"> Applicazione Web Playadice </h1>
                        <h4>Corso Programmazione Web 2019 - 2020</h4>
                        <h4 id="important">Autori:</h4> Luca Del Signore<br> Antonio Marottoli<br> Alessio Perozzi<br><br>
                        <p>Questa applicazione richiede che i cookie siano abilitati</p>
                </div> {if $version} <h2> Installation </h2>
                        <hr>
                        {if $errorMessage}
                                <div class="alert alert-warning">
                                        <!-- Notifica l'errore che ha riscontrato-->
                                        <strong>Attenzione!</strong><br>{$errorMessage}<br>Conttata il tuo Web Master per maggiori informazioni
                                </div>
                        {/if}
                        <form class="form-horizontal" method="post" action="install">
                                <div class="form-group">
                                        <label class="control-label " for="user">Username(per accedere al tuo DataBase):</label> <input type="text" class="form-control" id="user" placeholder="Enter username" name="admin">
                                </div>
                                <div class="form-group">
                                        <label class="control-label" for="pwd">Password(per accedere al tuo DataBase):</label> <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                </div>
                                <div class="form-group">
                                        <label class="control-label " for="db">DB Name:</label> <input type="text" class="form-control" id="db" placeholder="Enter database name" name="database">
                                </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form> {else} <p>This application requires at least the 7.4 version of PHP</p> {/if}
        </div>
        <div class="col-sm-3">
        </div>
</div>
</body>

</html>