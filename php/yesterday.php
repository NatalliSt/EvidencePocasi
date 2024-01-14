<?php

require "session.php";
require "connection.php";
require "variables.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidence počasí</title>
    <link rel="stylesheet" href="../css/graphs.css">
    

</head>
<body>
    
    
    <header>
        <div class="Logo">
            <img src="../pictures/logoPocasi.png" class="image">
            <div class="logo">EVIDENCE POČASÍ</div>
        </div>

        <nav class="navBar">
            <ul class="navMenu">
                <li class="navItem">
                    <a href="home.php" class="navLink">Domů</a>
                </li>
                <li class="navItem">
                    <a href="today.php" class="navLink">Dnes</a>
                </li>
                <li class="navItem">
                    <a href="yesterday.php" class="active">Včera</a>
                </li>
                <li class="navItem">
                    <a href="week.php" class="navLink">Týden</a>
                </li>
                <li class="navItem">
                    <a href="month.php" class="navLink">Měsíc</a>
                </li>
                <li class="navItem">
                    <a href="logout.php" class="navLink">Odhlásit se</a>
                </li>
            
            </ul>
        </nav>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>
    
    <div id="gridContainer">
        <div class="grid" id="tempIn">
            <p id="title">Teplota uvnitř:</p>
        </div>
        <div class="grid" id="tempOut">
            <p id="title">Teplota venku:</p>
        </div>
        <div class="grid" id="pressure">
            <p id="title">Atmosferický tlak: </p>
        </div>
        <div class="grid" id="humidity">
            <p id="title">Vlhkost vzduchu:</p>
        </div>
        <div class="grid" id="wind">
            <p id="title">Vítr:</p>
        </div>
        <div class="grid" id="rainfall">
            <p id="title">Srážky:</p>
        </div>
    </div>

<script src="../javaScript/graphs.js"></script>
</body>
</html>