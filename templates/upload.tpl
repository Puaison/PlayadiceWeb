<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../Resources/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Resources/now-ui-kit.css" type="text/css">
    <title>Crea Evento</title>
</head>

<body>


{user->getUsername assign='Username'}
<!-- Navbar here -->
{include file="navbar.tpl"}
{if $error}
    {$error}
{/if}

<form action="upload?{$results}" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
{if $check}
    <form action="showAll" method="post" >
        <input type="submit" value="Non caricare" name="submit">
    </form>
{/if}


</body>
</html>
