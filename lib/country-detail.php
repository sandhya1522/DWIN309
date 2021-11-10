<?php
require_once(__DIR__."./../dao/country.php");
require_once(__DIR__."./../dao/image-detail.php");
require_once(__DIR__."./../dao/image.php");

if(isset($_GET['CountryCodeISO'])) {
  $id = $_GET['CountryCodeISO'];
} else {
  $error_message = 'Invalid Country';
  include_once(__DIR__.'./../error.php');
  exit;
}

$country = Country::findById($id);
// echo "<pre>";print_r($country);exit;
$options = [
  'where' => [
    [
      'key' => 'CountryCodeISO',
      'operand' => '=',
      'value' => $country->ISO
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