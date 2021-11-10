<?php
require_once("entity.php");

class City extends Entity
{
  private static $table_name = 'geocities';
  private static $primary_key = 'GeoNameID';
  public $GeoNameID, $AsciiName, $CountryCodeISO, $Latitude, $Longitude, $FeatureCode, $Admin1Code, $Admin2Code, $Population, $Elevation, $TimeZone;
}