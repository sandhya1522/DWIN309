<?php
require_once("entity.php");

class Review extends Entity
{
  private static $table_name = 'travelimagereviews';
  private static $primary_key = 'ReviewID';
  public $ReviewID, $Review, $PostedAt, $UID, $ImageID, $Rating;
}