<html>
    <head>
        <title>{$title}</title>
    </head>
    <body>
    <br>
        {$message}
    <br>


        {section name=k loop=$results}
             {$results[k]->getNome()}

             {$results[k]->getCognome()}

             {$results[k]->getUsername()}

             {$results[k]->getPassword()}

             <br>
        {/section}
    <br>
         {$message}

    </body>
</html>