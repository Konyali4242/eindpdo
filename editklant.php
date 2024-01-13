<?php
include 'db.php';
session_start();

if (isset($_SESSION['klantId'])) {
    echo "Ingelogd als: " . $_SESSION['klantId'];
    echo "<br><a href=logout.php>Logout</a>";
    echo "<br><a href=adminhome.php>Terug naar adminhome</a>";
} else {
    header("Location:home.php");
    exit();
}

try {
   $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
        $db->updateKlant($_POST['naam'], $hash, $_POST['emailadres'], $_POST['rijbewijsnummer'], $_POST['telefoonnummer'], $_POST['adres'], $_POST['usertype'],
        $_GET['klantId']);
        header("Location:addklant.php");
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
    <title>Edit Klant</title>
</head>
<body>
<form method="POST">
        <input type="text" name="naam" placeholder="Naam"> <br> 
        <input type="password" name="wachtwoord" placeholder="Wachtwoord"> <br>
        <input type="text" name="emailadres" placeholder="Emailadres"> <br> 
        <input type="text" name="rijbewijsnummer" placeholder="Rijbewijsnummer"> <br>
        <input type="text" name="telefoonnummer" placeholder="Telefoonnummer"> <br> 
        <input type="text" name="adres" placeholder="Adres"> <br>
        <input type="text" name="usertype" placeholder="Usertype"> <br> 
        <input type="submit">
</form>
</body>
</html>