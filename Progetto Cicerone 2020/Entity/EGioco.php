<?php



class EGioco extends EObject
{
    /** Il Nome del Gioco */
    private $Nome;

    /** Il voto medio calcolato attraverso le recensioni */
    private $VotoMedio = null;

    /** La categoria del gioco */
    private  $Categoria;

    /** EGiocoInfo rappresentante informazioni più complete dell'oggetto EGioco */
    private $GiocoInfo;

    /** Lista di ERecensioni effettuate sul EGioco */
    private $Recensioni=array();

    /****************************************** GETTER **************************************************/

    /**
     * @return string Il Nome del Gioco
     */
    function getNome() : string {
        return $this->Nome;
    }

    /**
     * @return float Il voto medio del Gioco
     */
    function getVotoMedio() : float {
        return $this->VotoMedio;
    }

    /**
     * @return EGiocoCategoria La categoria del Gioco
     */
    function getCategoria() : EGiocoCategoria {
        return $this->Categoria;
    }

    /**
     * @return EGiocoInfo Le informazioni dettagliate del gioco
     */
    function getInfo() : EGiocoInfo{
        return $this->GiocoInfo;
    }

    /**
     * @return array Tutte le recensioni di quel gioco
     */
    function getRecensioni() : array{
        return $this->Recensioni;
    }

    /********************************************** SETTER ************************************************/

    /**
     * @param string $nome il nome del Gioco
     */
    function setNome(string $nome) {
        $this->Nome=$nome;
    }



    /**
     * @param float $valore il valore del voto medio del gioco
     */
    function setVotoMedio(float $valore) {
        $this->VotoMedio=$valore;
    }



    /**
     * @param EGiocoCategoria $categoria il valore del voto medio del gioco
     */
    function setCategoria(EGiocoCategoria $categoria) {
        $this->Categoria=$categoria;
    }



    /**
     * @param EGiocoInfo $info il valore del voto medio del gioco
     */
    function setInfo(EGiocoInfo $info) {
        $this->GiocoInfo=$info;
    }

    /**
     * @param ERecensione ...$recensioni Recensioni che devono essere aggiunte al gioco
     */
    function setRecensioni(ERecensione ...$recensioni) {

        $this->Recensioni= clone $recensioni;
    }
    /********************************************** ALTRE FUNZIONI ************************************************/

    function addRecensione(ERecensione $rec) {
        $this->Recensioni[]=$rec;
    }

    function CalcolaVotoMedio() :float {
        $somma=0;

        foreach ($this->Recensioni as $rec)
        {
            $voto=$rec->getVoto();
            $somma=$somma+$voto;
        }
        $numerorec=count($this->Recensioni);
        $votomedio=$voto/$numerorec;
        return $votomedio;

    }



}