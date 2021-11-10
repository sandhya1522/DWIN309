<?php 
require_once(__DIR__."/../dao/continent.php");
require_once(__DIR__."/../db/create-rating-table.php");
session_start();
$is_logged_in = false;
$current_user_id = '';
$current_favorites = [];
$is_admin = false;
// print_r($_SESSION);exit;


if(isset($_SESSION) && isset($_SESSION['current_user'])) {
  $is_logged_in = true;
  $current_user_id = $_SESSION['current_user']['id'];
  $is_admin = ($current_user_id == 1);
  $current_user_name = $_SESSION['current_user']['FirstName'];
  $current_favorites = isset($_SESSION['favorite_images']) ? $_SESSION['favorite_images'] : [];
}

$continents = Continent::findAll();
$raw_query = "SELECT tid.CountryCodeISO, gc.CountryName FROM `travelimagedetails` as tid
  inner join geocountries as gc on gc.ISO=tid.CountryCodeISO
  group by tid.CountryCodeISO;"; 
$countries = Continent::rawQuery($raw_query);

$raw_query = "SELECT gc.`AsciiName`, gc.`GeoNameID` FROM `travelimagedetails` as tid
  inner join `geocities` as gc on gc.GeoNameID=tid.CityCode
  group by tid.CityCode;";
$cities = Continent::rawQuery($raw_query);
// echo "<pre>";print_r($cities);exit;