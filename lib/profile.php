<?php
require_once(__DIR__."/../dao/user-detail.php");

if (!isset($_SESSION) || !$is_logged_in) {
  $error_message = 'Only Logged-in user are allowed to visit this page';
  include_once(__DIR__.'./../error.php');
  exit;
}

$current_user = UserDetail::findById($current_user_id);

if (!$current_user) {
  $error_message = 'Invalid User';
  include_once(__DIR__.'./../error.php');
  exit;
}