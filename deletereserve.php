<?php
include 'db.php';

try {
   $db = new Database();
    $db->deleteReserve($_GET['reserveId']);
    header("Location:addreserve.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
