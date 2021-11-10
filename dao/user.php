<?php
require_once("entity.php");

class User extends Entity
{
  private static $table_name = 'traveluser';
  private static $primary_key = 'UID';
  public $UID, $UserName, $Pass, $State, $DateJoined, $DateLastModified;
}