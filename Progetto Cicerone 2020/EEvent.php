<?php


class EEvent
{
  public string $eventId;
  public string $eventName;
  public string $eventCategory;
  public bool $flagBooking;
  public Place $eventPlace;
  public Date $endTime;
  public Date $startTime;
  public array $listofDate;
  public array $listofBooked;

  public function __construct(){}
  public function deleteEvent()
  public function mod Event()
  public function newBooking(User $EUser)



}
