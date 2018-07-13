<?php
session_start();

if ($_SESSION['user']=="supuz") {
    echo '{"status": true}';
  } else {
    echo '{"status": false}';
  }
 ?>
