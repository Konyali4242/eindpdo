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
        $insertId = $db->insertCar($_POST['merk'], $_POST['model'], $_POST['jaar'], $_POST['kenteken'], $_POST['beschikbaarheid'], $_POST['prijsperdag']);
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
    <h1>Auto toevoegen</h1>
    <form method="POST">
        <input type="text" name="merk" placeholder="Merk"> <br> 
        <input type="text" name="model" placeholder="Model"> <br>
        <input type="text" name="jaar" placeholder="Jaar"> <br> 
        <input type="text" name="kenteken" placeholder="Kenteken"> <br>
        <input type="text" name="beschikbaarheid" placeholder="Beschikbaarheid"> <br>
        <input type="text" name="prijsperdag" placeholder="Prijsperdag"> <br>
        <input type="submit">
    </form>
<br><br><br><br>
    <table class="table dark">
        <tr>
            <th>autoId</th>
            <th>merk</th>
            <th>model</th>
            <th>jaar</th>
            <th>kenteken</th>
            <th>beschikbaarheid</th>
            <th>Prijs/dag</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $cars = $db->selectAllCars(); 
            if ($cars) { 
                foreach ($cars as $car) {?>
            <td><?php echo $car['autoId'];?></td>
            <td><?php echo $car['merk']?></td>
            <td><?php echo $car['model']?></td>
            <td><?php echo $car['jaar'];?></td>
            <td><?php echo $car['kenteken']?></td>
            <td><?php echo $car['beschikbaarheid']?></td>
            <td><?php echo $car['prijsperdag']?></td>
           <td><a href="editcar.php?autoId=<?php echo $car['autoId']; ?>">Edit</a></td>
           <td><a href="deletecar.php?autoId=<?php echo $car['autoId']; ?>">Delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>
</body>
</html>