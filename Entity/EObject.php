<?php
/**
 * La classe EObject caratterizza un oggetto Entity a partire dal suo Id.
 */
class EObject
{
    /** l'id che identifica l'oggetto*/
    protected $id;

    /**
     * Costruisce un oggetto vuoto
     * @param int $id (opzionale) l'identificativo dell'oggetto Entity
     */
    protected function __construct(int $id=null) {
        $this->id = $id;
    }

    /**
     * @return int l'identificatore dell'oggetto
     */
    function getId() : int {
        if(!$this->id)
            return 0;
        else return $this->id;
    }

    /**
     * @param int $id l'identificatore dell'oggetto Entity
     */
    function setId(int $id) {
        $this->id = $id;
    }

}