<?php
declare(strict_types=1);

class EEvent
{
  public int $eventId;
  public string $eventName;
  public string $eventCategory;
  public bool $flagBooking;
  public EPlace $eventPlace;
  public array $listofDate;

  public function __construct(int $lastEventId, string $name, string $category, bool $flag, EDate $startTime,
                              EDate $endTime, EPlace $location, EDate ...$dates){
      $this->eventPlace=$location;
      $this->eventId=$lastEventId+1;
      $this->eventName=$name;
      $this->eventCategory=$category;
      $this->flagBooking=$flag;

      array_push($this->listofDate,"$startTime","$dates","$endTime");

  }
  public function deleteEvent(EEvent $event){
      //elimina evento
  }



    public function setId(int $id){$this->eventId=$id;}
    public function setName(string $name){$this->eventName=$name;}
    public function setCategory(string $category){$this->eventCategory=$category;}
    public function setFlag(bool $flag){
      $this->flagBooking=$flag;
      if ($this->flagBooking!=true)
          $this->listofBooked=array();
  }
    public function setPlace(EPlace $place){$this->eventPlace=$place;}
    public function setMinutes(string $minutes){$this->thisMinutes=$minutes;}
    public function setDate(EDate $day){array_splice($this->listofDate,-1 ,0,"$day");}
    public function setStartDate(EDate $day){array_splice($this->listofDate,0 ,1,"$day");}
    public function setEndDate(EDate $day){array_splice($this->listofDate,count($this->listofDate)-1 ,1,"$day");}
    public function getId(){return $this->eventId;}
    public function getName(){return $this->eventName;}
    public function getCategory(){return $this->eventCategory;}
    public function getFlag(){return $this->flagBooking;}
    public function getPlace(){return $this->eventPlace;}
    public function getStartDate(){return $this->listofDate[0];}
    public function getEndDate(){return $this->listofDate[count($this->listofDate)-1];}
    public function getDate(){return $this->listofDate;}
    public function getBooking(){return $this->listofBooked;}
    public function __toString(){
      $booked="";
      $date="";
      foreach ($this->listofBooked as $value){
          $booked.= $booked." ".$value->__toString()."\n";
      }

        foreach ($this->listofDate as $value){
            $date.= " ".$value->__toString()."\n";
        }
      return $print= "NOME: " . $this->getName() . " | CATEGORIA: " . $this->getCategory() . " | DATA DI INIZIO: ". $this->getStartDate() . " | DATA DI FINE: " . $this->getEndDate().
        " | DATE: ". $date . " | PRENOTATI: ". $booked ;}

}
