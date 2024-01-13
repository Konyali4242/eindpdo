<?php
include 'db.php';
session_start();

if ($_SESSION['usertype'] == "admin") {
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
        $insertId = $db->insertKlant($_POST['naam'], $hash, $_POST['emailadres'], $_POST['rijbewijsnummer'], $_POST['telefoonnummer'], $_POST['adres'],  $_POST['usertype']);
        echo "Successfully added " . $insertId;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Welcome admin</title>
</head>
<body>
    <br> <br><br>
    <h1>User toevoegen</h1>
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
<br><br><br><br>
    <table class="table dark">
        <tr>
            <th>KlantId</th>
            <th>Naam</th>
            <th>Emailadres</th>
            <th>wachtwoord</th>
            <th>Rijbewijsnummer</th>
            <th>Telefoonnummer</th>
            <th>Adres</th>
            <th>Usertype</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $users = $db->selectAllKlant(); 
            if ($users) { 
                foreach ($users as $user) {?>
            <td><?php echo $user['klantId'];?></td>
            <td><?php echo $user['naam']?></td>
            <td><?php echo $user['emailadres']?></td>
            <td><?php echo $user['wachtwoord']?></td>
            <td><?php echo $user['rijbewijsnummer'];?></td>
            <td><?php echo $user['telefoonnummer']?></td>
            <td><?php echo $user['adres']?></td>
            <td><?php echo $user['usertype']?></td>
           <td><a href="editklant.php?klantId=<?php echo $user['klantId']; ?>">Edit</a></td>
           <td><a href="deleteklant.php?klantId=<?php echo $user['klantId']; ?>">Delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>
</body>
</html>