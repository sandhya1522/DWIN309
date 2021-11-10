<?php 
require_once(__DIR__."/../dao/user-detail.php");

if (!$is_admin) {
  $error_message = 'Only admin are allowed to see this page';
  include_once(__DIR__.'/../error.php');
  exit;
} 

// echo "<pre>";print_r($_SERVER);print_r($_POST);exit;

if(isset($_POST) && sizeof($_POST) > 0) {
  // user update
}

$users = UserDetail::findAll();
