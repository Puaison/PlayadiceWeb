<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Error Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
</head>
<body>

{user->getUsername assign='Username'}

{include file="navbar.tpl"}

<br>

<div class="container text-center well">
    <h3>Ooooops! Something went wrong!</h3>
    <p>{$error}, Per favore torna nella <a href="/playadice/">home</a>
    </p>

</div>

</body>
</html>