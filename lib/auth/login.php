<?php
  require_once(__DIR__."/../../dao/user.php");
  require_once(__DIR__."/../../dao/user-detail.php");
  if(isset($_POST) && sizeof($_POST) > 0) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $options = [
      'where' => [
        [
          'key' => 'UserName',
          'operand' => '=',
          'value' => $email
        ],
        [
          'key' => 'Pass',
          'operand' => '=',
          'value' => $password
        ]
      ]
    ];
    $user_exist = User::findAll($options);

    if ($user_exist && count($user_exist) > 0) {
      $user_detail = UserDetail::findById($user_exist[0]->UID);
      
      session_start();
      $_SESSION['current_user'] = [
        'id' => $user_exist[0]->UID,
        'FirstName' => $user_detail->FirstName
      ];
      // print_r($_SESSION);exit;
      header('Location: /index.php');
      exit();
    } else {
      header('Location: /login.php');
      exit();
    }
  }
  