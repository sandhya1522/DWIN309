<?php
require_once(__DIR__."/../dao/image.php");
require_once(__DIR__."/../dao/image-detail.php");

if (!isset($_SESSION)) {
  die('Not logged in');
}

$current_favorites = isset($_SESSION['favorite_images']) ? $_SESSION['favorite_images'] : [];
if(isset($_POST) && sizeof($_POST) > 0) {
  // check if list already has this ImageID
  if (($key = array_search($_POST['ImageID'], $current_favorites)) !== false) {
    unset($current_favorites[$key]);
  } else {
    array_push($current_favorites, $_POST['ImageID']);
  }

  $_SESSION['favorite_images'] = $current_favorites;
}
$current_favorites_images = [];
$all_image_url_list = [];
$image_urls = [];

if (count($current_favorites) > 0) {
  $options = [
    'where' => [
      [
        'key' => 'ImageID',
        'operand' => 'IN',
        'value' => $current_favorites
      ],
    ]
  ];

  $current_favorites_images = ImageDetail::findAll($options);

  $all_image_url_list = Image::findAll($options);

  foreach ($all_image_url_list as $val) {
    $image_urls[$val->ImageID] = $val->Path;
  }
}

// echo "<pre>";print_r($current_favorites_images);exit; 

