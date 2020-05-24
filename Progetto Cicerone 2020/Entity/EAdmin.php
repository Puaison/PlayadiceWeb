<?php


class EAdmin extends EUtente
{

    /**
     * @return bool 1 poichè è moderatore
     */
    function getModeratore() : bool
    {
        return true;
    }

}