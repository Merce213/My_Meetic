<?php
if (!isset($_SESSION)) {
  session_start();
}

function redirect($location)
{
  header("Location: " . $location);
  exit();
}
