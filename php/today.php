<?php

require "session.php";
require "connection.php";
require "variables.php";
require "chart_today.php";

?>


<!DOCTYPE html>
<html lang="cs-cz">
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
                    <a href="today.php" class="active">Dnes</a>
                </li>
                <!--
                <li class="navItem">
                    <a href="yesterday.php" class="navLink">Včera</a>
                </li>
                -->
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
        <div class="grid">
            <div id="title">Teplota uvnitř:</div>
            <div class="charts" id="tempIn"></div>
        </div>

        <div class="grid">
            <div id="title">Teplota venku:</div>
            <div class="charts" id="tempOut">
            </div>
        </div>
        <div class="grid">
            <div id="title">Atmosferický tlak: </div>
            <div class="charts" id="pressure"></div>
        </div>
        <div class="grid">
            <div id="title">Vlhkost vzduchu:</div>
            <div class="charts" id="humidity"></div>
        </div>
        <div class="grid">
            <div id="title">Vítr:</div>
            <div class="charts" id="wind"></div>
        </div>
        <div class="grid">
            <div id="title">Srážky:</div>
            <div class="charts" id="rainfall"></div>
        </div>
    </div>

<script src="../javaScript/graphs.js"></script>
</body>
</html>
