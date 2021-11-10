<?php
require_once(__DIR__."./../helpers/init.php");
require_once(__DIR__."./../dao/user-detail.php");

// show error when non-admin tries to access this page
if(!isset($is_admin) || !$is_admin) {
  $error_message = 'Only admin users can access this page';
  include_once(__DIR__.'./../error.php');
  exit;
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $error_message = 'Need to select the user first';
  include_once(__DIR__.'./../error.php');
  exit;
}

$user = UserDetail::findById($id);