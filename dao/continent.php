<?php
require_once("entity.php");

class Continent extends Entity
{
  private static $table_name = 'geocontinents';
  private static $primary_key = 'ContinentCode';
  public $ContinentCode, $ContinentName, $GeoNameId;
}