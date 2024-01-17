<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>homepagepdo</title>
</head>
<body>  
    
    <div class="banner">
    <div class="navbar">
        <img src="logo.jpg" class="logo">
<h2>Welcome</h2>
    <ul>
        <li><a href="">AUTOS</a></li>
        <li><a href="login.php">INLOGGEN</a></li>
        <li><a href="aanmelden.php">AANMELDEN</a></li>
    </ul>
</div>

<div class="container">
    <h2>AUTOS</h2>

    <div class="box-container">
     
        <div class="box">
            <img src="auto1.jpg" alt="Auto 1">
            <p>Auto beschrijving hier.</p>
            <a href="login.php" class="buy-now-btn">Koop nu</a>
        </div>

       
        <div class="box">
            <img src="auto2.jpg" alt="Auto 2">
            <p>Auto beschrijving hier.</p>
            <a href="login.php" class="buy-now-btn">Koop nu</a>
        </div>

        
        <div class="box">
            <img src="auto3.jpg" alt="Auto 3">
            <p>Auto beschrijving hier.</p>
            <a href="login.php" class="buy-now-btn">Koop nu</a>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section about">
                <h3>Over Ons</h3>
                <p>Wij zijn een toonaangevend bedrijf in de autoverhuurbranche. Ontdek de wereld met comfort en stijl.</p>
            </div>
            <div class="footer-section contact">
                <h3>Contactgegevens</h3>
                <p>Email: info@rentacar.com</p>
                <p>Telefoon: +31 123 456 789</p>
            </div>
            <div class="footer-section social">
                <h3>Volg Ons</h3>
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
</div>



<div class="container">

<style>
*{

    font-family: 'Arial', cursive;
}



.container{

    display: flex;
flex-direction: column;
align-items: center;

}

.navbar{
    width: 85%;
    margin: auto;
    padding: 35px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.banner{
    width: 100%;
    height: 100vh;
   
    background-size: cover;
    background-position: center;

}.logo{
    width: 120px;
    cursor: pointer;
}
.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative;

}
.navbar ul li a{
text-decoration: none;
color: aliceblue;
text-transform: uppercase;
}
.navbar ul li::after{
    content:'';
    height: 3px;
    width: 0;
    background:#009688;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}
.navbar ul li:hover:after{
    width: 100%;
}



body {
    font-family: Arial;
  
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.container, .container1 {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}

.iphone-container {
    width: 300px;
    background-color: #ccc;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin: 10px;
}


h1, h2 {
    text-align: center;
    padding: 20px;
    color: black;
}

.add-to-cart {
    color: #fff;
    background-color: orange;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

.add-to-cart:hover {
    background-color: #555;
}


.navbar {
background-color: white;
 color: #555;
    padding: 15px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    display: inline-block;
    margin: 0 20px;
    position: relative;
}

.navbar ul li a {
    text-decoration: none;
  color: #555;
    text-transform: uppercase;
}

.navbar ul li::after {
    content: '';
    height: 3px;
    width: 0;
    background: #009688;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}

.navbar ul li:hover::after {
    width: 100%;
}

.box-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .box {
            text-align: center;
            width: 30%;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .box img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .box p {
            width: 75%;
            margin-top: 100px;
            color: #555;
        }

        .buy-now-btn {
            display: block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: orange;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .buy-now-btn:hover {
            background-color: #555;
        }

        .footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .footer {
            background-color: black;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .footer-section {
            width: 30%;
            padding: px;
            box-sizing: border-box;
        }

    </style>

</style>


</div>

</body>
</html>

