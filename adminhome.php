<?php

include "db.php";
session_start();

    try {
        if ($_SESSION['usertype'] == "admin") {
            $db = new Database();
        } else {
            header("location:home.php?ingelogd");
        }

    } catch (\Exception $e) {
        echo $e->getMessage();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Home of Admins</title>
</head>
<body>
    
    <div class="d-flex flex-column align-items-center">
        <h1>Welkom, Admin.</h1>
        <a href="addklant.php?ingelogd">Voeg klanten toe</a> <br>
        <a href="addcar.php?ingelogd">Voeg autos toe</a> <br>  
        <a href="addreserve.php?ingelogd">Reserveer klanten</a> <br>
    </div>

</body>
</html>