<?php
declare(strict_types=1);

class EEvent
{
  public string $eventId;
  public string $eventName;
  public string $eventCategory;
  public bool $flagBooking;
  public EPlace $eventPlace;
  public EDate $endTime;
  public EDate $startTime;
  public array $listofDate;
  public array $listofBooked;

  public function __construct(int $lastEventId, string $name, string $category, string $flag, EDate $startTIme, EDate $endTime, EPlace $location){
      $this->startTime=$startTIme;
      $this->endTime=$endTime;
      $this->eventPlace=$location;
      $this->eventId=$lastEventId+1;
      $this->eventName=$name;
      $this->eventCategory=$category;
      $this->flagBooking=$flag;


  }
  public function deleteEvent()
  public function mod Event()
  public function newBooking(User $EUser)



}
