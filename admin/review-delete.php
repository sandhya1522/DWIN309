<?php
include_once(__DIR__.'/../helpers/init.php');

require_once(__DIR__."/../dao/review.php");

if (!isset($_SESSION) || !$is_admin) {
  $error_message = 'You need to be logged-in as admin to delete the reviews';
  include_once(__DIR__.'./../error.php');
}

if(isset($_POST) && sizeof($_POST) > 0) {
  // check if list already has this ImageID
  $review_id = $_POST['ReviewID'];
  $review = Review::findByID($review_id);
  $review->delete();
  header('Location: /image-detail.php/?id='.$_POST['ImageID']);
  exit();
}