<?php
require_once("entity.php");

class ImageRating extends Entity
{
  private static $table_name = 'travelimagerating';
  private static $primary_key = 'ImageRatingID';
  public $ImageRatingID, $ImageID, $Rating;
}