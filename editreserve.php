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
        $db->updateReserve($_POST['klantId'], $_POST['autoId'], $_POST['vanaf'], $_POST['tot'], $_POST['totaal'], 
        $_GET['reserveId']);
        header("Location:addreserve.php");
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
    <title>Edit reservation</title>
</head>
<body>
<form method="POST">
        <input type="text" name="klantId" placeholder="KlantId"> <br> 
        <input type="text" name="autoId" placeholder="AutoId"> <br>
        <input type="text" name="vanaf" placeholder="Vanaf"> <br> 
        <input type="text" name="tot" placeholder="Tot"> <br>
        <input type="text" name="totaal" placeholder="Totaal"> <br> 
        <input type="submit">
</form>
</body>
</html> 