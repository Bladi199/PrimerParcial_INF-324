<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'BDBladimir'
) or die(mysqli_error($mysqli));

?>