<html>
    <head>
        <title>{$title}</title>
    </head>
    <body>
    <br>
        {$message}

    {section name=nr loop=$results}
        <option value="{$results[nr]}">
            {$results[nr]}
        </option>
    {/section}

    </body>
</html>