<?php
require_once("entity.php");

class Post extends Entity
{
  private static $table_name = 'travelpost';
  private static $primary_key = 'PostID';
  public $PostID, $UID, $ParentPost, $Title, $Message, $PostTime;
}