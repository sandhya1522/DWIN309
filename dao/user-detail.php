<?php
require_once("entity.php");

class UserDetail extends Entity
{
  private static $table_name = 'traveluserdetails';
  private static $primary_key = 'UID';
  public $UID, $FirstName, $LastName, $Address, $City,
    $Region, $Country, $Postal, $Phone, $Email, $Privacy;
  
  public function getFullname() {
    return $this->FirstName. " ". $this->LastName;
  }
}