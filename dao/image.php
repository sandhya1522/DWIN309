<?php
require_once("entity.php");

class Image extends Entity
{
  private static $table_name = 'travelimage';
  private static $primary_key = 'ImageID';
  public $ImageID, $UID, $Path, $ImageContent;
}