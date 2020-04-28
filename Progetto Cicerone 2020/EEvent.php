<?php
declare(strict_types=1);

class EEvent
{
  public string $eventId;
  public string $eventName;
  public string $eventCategory;
  public bool $flagBooking;
  public EPlace $eventPlace;
  public array $listofDate;
  public array $listofBooked;

  public function __construct(int $lastEventId, string $name, string $category, string $flag, DateTime $startTime,
                              DateTime $endTime, DateTime ...$dates, EPlace $location, EUser ...$users){
      $this->eventPlace=$location;
      $this->eventId=$lastEventId+1;
      $this->eventName=$name;
      $this->eventCategory=$category;
      $this->flagBooking=$flag;
      if ($this->flagBooking){
          array_push($this->listofBooked,"$users");
      }
      array_push($this->listofDate,"$startTime","$endTime","$dates");

  }
  public function deleteEvent(EEvent $event){
      //elimina evento
  }
  public function mod Event()
  public function newBooking(User $EUser){
      if ()
      array_push($this->listofBooked,"$users");
  }
  private function __destruct()



}
