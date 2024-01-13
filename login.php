<?php
    include 'db.php';

    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $emailadres = htmlspecialchars($_POST['emailadres']);
        $db = new Database();
        $klant = $db->login($emailadres);

        if ($klant) {
            $wachtwoord = $_POST['wachtwoord'];
            $verify = password_verify($wachtwoord, $klant['wachtwoord']);
        
            if ($verify) {
                session_start();
                $_SESSION['klantId'] = $klant['klantId'];
                $_SESSION['naam'] = $klant['naam'];
                $_SESSION['usertype'] = $klant['usertype'];

                if ($klant['usertype'] == "admin") {
                    header("location:adminhome.php?ingelogd");
                } else {
                    header("location:home.php?ingelogd");
                }
            } else {
                echo "incorrect password or email";
            }
        } else {
            echo "incorrect password or email";
        }
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
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" name="emailadres" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="wachtwoord" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <p>Nog geen account?</p> <a href="aanmelden.php">Aanmelden</a>
</form>
</body>
</html>