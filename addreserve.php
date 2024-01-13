<?php
include 'db.php';
session_start();
$db = new Database();



if ($_SESSION['klantId']) {
    if ($_SESSION['usertype'] == 'admin') {
    echo "Ingelogd als: " . $_SESSION['klantId'];
    echo "<br><a href=logout.php>Logout</a>";
    echo "<br><a href=adminhome.php>Terug naar adminhome</a>";
    } 
} else {
    header("Location:login.php");
    exit();
} 

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertId = $db->insertReserve($_POST['klantId'], $_POST['autoId'], $_POST['vanaf'], $_POST['tot'], $_POST['totaal']);
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
    <h1>Reservering toevoegen</h1>
    <form method="POST">
        <input type="text" name="klantId" placeholder="KlantId"> <br> 
        <input type="text" name="autoId" placeholder="AutoId"> <br>
        <input type="text" name="vanaf" placeholder="Vanaf"> <br> 
        <input type="text" name="tot" placeholder="Tot"> <br>
        <input type="text" name="totaal" placeholder="Totaal"> <br> 
        <input type="submit">
    </form>
<br><br><br><br>
    <table class="table dark">
        <tr>
            <th>reserveId</th>
            <th>klantId</th>
            <th>autoId</th>
            <th>vanaf</th>
            <th>tot</th>
            <th>totaal</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $reserves = $db->selectAllReserves(); 
            if ($reserves) { 
                foreach ($reserves as $reserve) {?>
            <td><?php echo $reserve['reserveId'];?></td>
            <td><?php echo $reserve['autoId']?></td>
            <td><?php echo $reserve['klantId']?></td>
            <td><?php echo $reserve['vanaf'];?></td>
            <td><?php echo $reserve['tot']?></td>
            <td><?php echo $reserve['totaal']?></td>
           <td><a href="editreserve.php?reserveId=<?php echo $reserve['reserveId']; ?>">Edit</a></td>
           <td><a href="deletereserve.php?reserveId=<?php echo $reserve['reserveId']; ?>">Delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>
</body>
</html>