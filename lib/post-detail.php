<?php
require_once(__DIR__."./../dao/post.php");
require_once(__DIR__."./../dao/post-image.php");
require_once(__DIR__."./../dao/image-detail.php");
require_once(__DIR__."./../dao/image.php");


if(isset($_GET['id'])) {
  $post_id = $_GET['id'];
} else {
  $error_message = 'Invalid post';
  include_once('error.php');
  exit;
}

$post = Post::findById($post_id);
$options = [
  'where' => [
    [
      'key' => 'PostID',
      'operand' => '=',
      'value' => $post->PostID
    ],
  ]
];
$post_images = PostImage::findAll($options);
$images_id = [];

foreach($post_images  as $image) {
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
$images = ImageDetail::findAll($options);
$image_list = Image::findAll($options);
$image_urls = [];
foreach($image_list  as $image) {
  $image_urls[$image->ImageID] = $image->Path;
}


// echo "<pre>";print_r($images);exit;
