<?php
include 'db.php';

try {
   $db = new Database();
    $db->deleteKlant($_GET['klantId']);
    header("Location:addklant.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>