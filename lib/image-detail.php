<?php
require_once(__DIR__."./../dao/post.php");
require_once(__DIR__."./../dao/post-image.php");
require_once(__DIR__."./../dao/image-detail.php");
require_once(__DIR__."./../dao/image.php");
require_once(__DIR__."./../dao/review.php");


if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $error_message = 'Invalid Image';
  include_once('error.php');
  exit;
}

$single_image = ImageDetail::findById($id);
$options = [
  'where' => [
    [
      'key' => 'CountryCodeISO',
      'operand' => '=',
      'value' => $single_image->CountryCodeISO
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
      'operand' => '=',
      'value' => $id
    ],
  ]
];

// Related post having this image
$corresponding_post = PostImage::findAll($options);
$post_id = $corresponding_post[0]->PostID;

$options = [
  'where' => [
    [
      'key' => 'PostID',
      'operand' => '=',
      'value' => $post_id
    ],
  ]
];


$other_image_list_in_same_post = PostImage::findAll($options);
$other_image_ids = [];
foreach($other_image_list_in_same_post as $image) {
  $images_id[] = $image->ImageID;
  $other_image_ids[] = $image->ImageID;
}

$options = [
  'where' => [
    [
      'key' => 'ImageID',
      'operand' => 'IN',
      'value' => $other_image_ids
    ],
  ]
];

$other_image_in_same_post = ImageDetail::findAll($options);

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
$image_urls = [$single_image->ImageID];
foreach($image_list  as $image) {
  $image_urls[$image->ImageID] = $image->Path;
}
$options = [
  'where' => [
    [
      'key' => 'ImageID',
      'operand' => '=',
      'value' => $id
    ],
  ]
];
$reviews = Review::findAll($options);