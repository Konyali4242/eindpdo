<?php
include 'db.php';
session_start();

if (isset($_SESSION['klantId'])) {
    echo "Ingelogd als: " . $_SESSION['klantId'];
    echo "<br><a href=logout.php>Logout</a>";
    echo "<br><a href=adminhome.php>Terug naar Adminhome</a>";
} else {
    header("Location:home.php");
    exit();
}

try {
   $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db->updateCar($_POST['merk'], $_POST['model'], $_POST['jaar'], $_POST['kenteken'], $_POST['beschikbaarheid'], $_POST['prijsperdag'],
        $_GET['autoId']);
        header("Location:addcar.php");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
</head>
<body>
<form method="POST">
        <input type="text" name="merk" placeholder="Merk"> <br> 
        <input type="text" name="model" placeholder="Model"> <br>
        <input type="text" name="jaar" placeholder="Jaar"> <br> 
        <input type="text" name="kenteken" placeholder="Kenteken"> <br>
        <input type="text" name="beschikbaarheid" placeholder="Beschikbaarheid"> <br> 
        <input type="text" name="prijsperdag" placeholder="Prijsperdag"> <br>
        <input type="submit">
</form>
</body>
</html>