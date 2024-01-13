<?php
session_start(); 

if (isset($_SESSION['klantId'])) {
        unset($_SESSION['klantId']);
 
        header("Location: login.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>