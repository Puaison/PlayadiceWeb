<?php

/**
 * Semplice classe che identifica un amministratore
 */
class EAdmin extends EUtente
{

    /**
     * @return bool 1 poichè è moderatore
     */
    static function getModeratore() : bool
    {
        return true;
    }

}