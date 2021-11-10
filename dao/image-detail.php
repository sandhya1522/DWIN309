<?php
require_once("entity.php");

class ImageDetail extends Entity
{
  private static $table_name = 'travelimagedetails';
  private static $primary_key = 'ImageID';
  public $ImageID, $Title, $Description, $Latitude, $Longitude, $CityCode, $CountryCodeISO;
}