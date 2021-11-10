<?php
require_once(__DIR__."./../helpers/init.php");
require_once(__DIR__."./../dao/user-detail.php");
require_once(__DIR__."./../dao/user.php");

// show error when non-admin tries to access this page
if(!isset($is_admin) || !$is_admin) {
  $error_message = 'Only admin users can access this page';
  include_once(__DIR__.'./../error.php');
  exit;
}

if(isset($_POST) && sizeof($_POST) > 0) {
  $id = $_POST['UID'];
} else {
  $error_message = 'Invalid form submission';
  include_once(__DIR__.'./../error.php');
  exit;
}

$user_detail = UserDetail::findById($id);
$user = User::findById($id);
if(!$user_detail || !$user) {
  $error_message = 'Invalid user';
  include_once(__DIR__.'./../error.php');
  exit;
}
$user_detail->FirstName = $_POST['FirstName'];
$user_detail->LastName = $_POST['LastName'];
$user_detail->Email = $_POST['Email'];
$user_detail->Phone = $_POST['Phone'];
$user_detail->Address = $_POST['Address'];
$user_detail->City = $_POST['City'];
$user_detail->Region = $_POST['Region'];
$user_detail->Country = $_POST['Country'];
$user_detail->Postal = $_POST['Postal'];
$user_detail->update();

$user->UserName = $_POST['Email'];
$user->update();
header('Location: /admin/edit-user.php/?id='.$_POST['UID']);
exit();