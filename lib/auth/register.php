<?php
  require_once(__DIR__."/../../dao/user.php");
  require_once(__DIR__."/../../dao/user-detail.php");
  if(isset($_POST) && sizeof($_POST) > 0) {
    
    $user = new User();
    $user->UserName = $_POST['Email'];
    $user->Pass = $_POST['Pass'];
    $user->DateJoined = date('Y-m-d h:i:s');
    $user->DateLastModified = date('Y-m-d h:i:s');
    $user->State = 1;
    $user->create();

    if ($user->UID) {
      // saving to user-detail
      $user_detail = new UserDetail();
      $user_detail->Email = $user->UserName;
      $user_detail->FirstName = $_POST['FirstName'];
      $user_detail->LastName = $_POST['LastName'];
      $user_detail->Phone = $_POST['Phone'];
      $user_detail->Region = $_POST['Region'];
      $user_detail->Address = $_POST['Address'];
      $user_detail->City = $_POST['City'];
      $user_detail->Country = $_POST['Country'];
      $user_detail->Postal = $_POST['Postal'];
      $user_detail->UID = $user->UID;
      $user_detail->Privacy = 1;
      $user_detail->create();

      session_start();
      $_SESSION['current_user'] = [
        'id' => $user_exist[0]->UID,
        'FirstName' => $user_detail->FirstName
      ];
      header('Location: /index.php');
      exit();
    }
  } else {
    header('Location: /register.php');
    exit();
  }
  