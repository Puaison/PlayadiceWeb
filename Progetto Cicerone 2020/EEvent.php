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


}
