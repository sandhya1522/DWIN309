<?php 
  require_once(__DIR__."/../dao/image-rating.php");

// echo "<pre>";print_r($_SERVER);print_r($_POST);exit;

if(isset($_POST) && sizeof($_POST) > 0) {
  // first check UID is set or not
  if(!isset($_POST['UID'])) {
    die('User need to be logged in to rate');
  }

  $rating = new ImageRating();
  $rating->ImageID = $_POST['ImageID'];
  $rating->Rating = $_POST['rating'];
  $rating->create();
  redirectToCurrent();
  // check user has alredy rated this image
}


function redirectToCurrent() {
  header('Location: '.$_SERVER['HTTP_REFERER']);
  exit();
}
