<?php
  require_once(__DIR__."/../dao/review.php");
  require_once(__DIR__."/../helpers/init.php");
  
  if(isset($_POST) && sizeof($_POST) > 0) {
    // check if user is logged in or not
    if(isset($is_logged_in) && $is_logged_in === false) {
      $error_message = 'Only logged-in users can provide review.';
      include_once(__DIR__."/../error.php");
      exit;
    }

    // check if user has already posted rating/review for this user
    $options = [
      'where' => [
        [
          'key' => 'UID',
          'operand' => '=',
          'value' => $current_user_id
        ],
        [
          'key' => 'ImageID',
          'operand' => '=',
          'value' => $_POST['ImageID']
        ]
      ]
    ];
    $old_review = Review::findAll($options);
    
    if(isset($old_review) && count($old_review) > 0) {
      $error_message = 'Only one review per user is allowed.';
      include_once(__DIR__."/../error.php");
      exit;
    }
    
    $review = new Review();
    $review->UID = $current_user_id;
    $review->ImageID = $_POST['ImageID'];
    $review->Rating = $_POST['rating'];
    $review->Review = $_POST['Review'];
    $review->PostedAt = date('Y-m-d h:i:s');
    $review->create();
    header('Location: /image-detail.php/?id='.$_POST['ImageID']);
    exit();
  } else {
    $error_message = 'Only logged-in users can provide review.';
    include_once(__DIR__."/../error.php");
    exit;
  }
  