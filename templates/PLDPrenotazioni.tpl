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
    <title>Prenotazioni</title>
</head>

<body>

{user->getUsername assign='Username'}
{user->getModeratore assign='Tipo'}

<!-- Navbar here -->

{include file="navbar.tpl"}

<div class="py-5">
    <div class="container">
        <div class="row ">
            {if empty($results)}Non sono presenti prenotazioni{/if}
            {section name=k loop=$results}
            <div class="col-md-12">
                <div class="row border">
                    <span class="col text-center border ">
                            <span class="px-5" >
                                {$nome=$results[k]->getUtente()}
                            {$nome->getusername()}</span></span>
                        <span class="col text-center border">{$results[k]->getDataStr()}</span>

                </div>
            </div>
            {/section}
        </div>
    </div>
</div>

</body>
</html>