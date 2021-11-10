<?php
// require_once(__DIR__."./../dao/country.php");
require_once(__DIR__."./../dao/city.php");

require_once(__DIR__."./../dao/image-detail.php");
require_once(__DIR__."./../dao/image.php");

if(isset($_GET['CityCode'])) {
  $id = $_GET['CityCode'];
} else {
  $error_message = 'Invalid City';
  include_once(__DIR__.'./../error.php');
  exit;
}
$city = City::findById($id);
$options = [
  'where' => [
    [
      'key' => 'CityCode',
      'operand' => '=',
      'value' => $city->GeoNameID
    ],
  ]
];
$similar_images = ImageDetail::findAll($options);
$images_id = [];
foreach($similar_images as $image) {
  $images_id[] = $image->ImageID;
}

$options = [
  'where' => [
    [
      'key' => 'ImageID',
      'operand' => 'IN',
      'value' => $images_id
    ],
  ]
];
$image_list = Image::findAll($options);
$image_urls = [];
foreach($image_list  as $image) {
  $image_urls[$image->ImageID] = $image->Path;
}