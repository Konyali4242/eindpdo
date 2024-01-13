<?php
include 'db.php';

try {
   $db = new Database();
    $db->deleteCar($_GET['autoId']);
    header("Location:addcar.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>