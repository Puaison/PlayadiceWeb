<?php
declare(strict_types=1);

class EEvento
{
  public int $id;
  public string $nomeEvento;
  public string $categoria;
  public bool $flagPrenotazione;
  public ELuogo $luogoEvento;
  public array $listaFasce;
  public array $listaPrenotazioni;

  public function __construct(int $eventId, string $name, string $category, bool $flag, EFascia ...$fascia){
      $this->luogoEvento=$location;
      $this->id=$eventId;
      $this->nomeEvento=$name;
      $this->categoria=$category;
      $this->flagPrenotazione=$flag;
      array_push($this->listaFasce,"$fascia");

  }
    public function setId(int $id){$this->id=$id;}
    public function setNome(string $name){$this->nomeEvento=$name;}
    public function setCategoria(string $category){$this->categoria=$category;}
    public function setFlag(bool $flag){
      $this->flagPrenotazione=$flag;
      if ($this->flagPrenotazione!=true)
          $this->listaPrenotazioni=array();
  }
    public function setLuogo(ELuogo $place){$this->luogoEvento=$place;}
    public function newFascia(EFascia $fascia){array_push($this->listaFasce,"$fascia");}
    public function newPrenotazione(EPrenotazione $prenotazione){array_push($this->listaPrenotazioni,"$prenotazione");}
    public function getId(){return $this->id;}
    public function getNome(){return $this->nomeEvento;}
    public function getCategory(){return $this->categoria;}
    public function getFlag(){return $this->flagPrenotazione;}
    public function getLuogo(){return $this->luogoEvento;}
    public function getStartDate(){return $this->listaFasce[0];}
    public function getEndDate(){return $this->listaFasce[count($this->listaFasce)-1];}
    public function getFasce(){return $this->listaFasce;}
    public function getPrenotazioni(){return $this->listaPrenotazioni;}
    public function __toString(){
      $prenotazioni="";
      $date="";
      foreach ($this->getPrenotazioni() as $value){
          $prenotazioni.= $prenotazioni." ".$value->__toString()."\n";
      }
      foreach ($this->getFasce() as $value){
          $date.= " ".$value->__toString()."\n";
        }
      return $print= "NOME: " . $this->getNome() . " | CATEGORIA: " . $this->getCategory() . " | DATA DI INIZIO: ". $this->getStartDate() . " | DATA DI FINE: " . $this->getEndDate().
        " | FASCE ORARIE: ". $date . " | PRENOTATI: ". $prenotazioni ;
  }
}
