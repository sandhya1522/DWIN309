<?php
  require_once(__DIR__."/../../helpers/init.php");

  session_unset();
  session_destroy();

  header('Location: /login.php');
  exit();