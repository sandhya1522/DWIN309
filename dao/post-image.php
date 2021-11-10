<?php
require_once("entity.php");

class PostImage extends Entity
{
  private static $table_name = 'travelpostimages';
  private static $primary_key = 'PostID';
  public $PostID, $ImageID;
}