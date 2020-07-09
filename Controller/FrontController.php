<?php


/**
 * La classe FrontController effettua il dispatching verso i metodi dei vari controller
 * a seconda dell'url richiesta dal client.
 */
class FrontController
{
    /**
     * La funzione run effettua il dispatching verso i metodi di un determinato controller.
     * Un URL ha il seguente formato:
     *                  /playadice/controller/method/(params)
     * dove i parametri possono essere per un massimo di tre e possono essere delimitati da caratteri come '&' o '?'
     * Se l'URL non e' valida, l'utente viene reindirizzato alla pagina principale
     */
    function run()
    {
        $resources = preg_split("#[][&?/]#", $_SERVER['REQUEST_URI']); // individua le componenti dell'url

        $controller = 'C' . ucfirst($resources[2]); // costruisce il nome della classe del Controller
        if (class_exists($controller)) // se la classe esiste
        { // verifica che il metodo sia valido
            $method = $resources[3];
            if (method_exists($controller, $method)) // se il metodo e' valido...
            { // verifica la presenza di eventuali parametri
                $param1 = NULL; $param2 = NULL; $param3 = NULL;

                if(isset($resources[4]))
                    $param1 = $resources[4];
                if(isset($resources[5])) // se anche un secondo parametro e' definito
                    $param2 = $resources[5];
                if(isset($resources[6])) // se anche un terzo parametro e' definito
                    $param3 = $resources[6];

                if($param3) // se tutti i parametri sono definiti...
                    $controller::$method($param1, $param2, $param3);
                elseif($param2) // se solo due sono definiti...
                    $controller::$method($param1, $param2);
                elseif($param1) // se solo uno e' definito
                    $controller::$method($param1);
                else // se nessun parametro e' definito
                    $controller::$method();
            }
            else // se il metodo non esiste, si viene reindirizzati alla pagina principale
            {
                $user = CSession::getUserFromSession();
                $smarty = SmartyConfig::configure();
                $smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
                $smarty->registerObject('user', $user);
                $smarty->display('index.tpl');
            }
        }
        else // se la classe non esiste, si viene reindirizzati alla pagina principale
        {
            $user = CSession::getUserFromSession();
            $smarty = SmartyConfig::configure();
            $smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
            $smarty->registerObject('user', $user);
            $smarty->display('index.tpl');
        }
        exit;
    }
}