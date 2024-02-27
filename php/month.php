<?php

require_once "session.php";
require "connection.php";
require "variables.php";
require "chart_month.php";


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
            <div class="logo"><a href="home.php" style="color: white; border: 0; box-shadow: 0 0 0">EVIDENCE POČASÍ</a></div>
        </div>

        <!-- menu -->
        <nav class="navBar">
            <ul class="navMenu">
                <li class="navItem">
                    <a href="home.php" class="navLink">Domů</a>
                </li>
                <li class="navItem">
                    <a href="today.php" class="navLink">Dnes</a>
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
                    <a href="month.php" class="active">Měsíc</a>
                </li>
                <li class="navItem">
                    <a id="newDataLink" class="navLink">Nová data</a>
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

    <!-- přecházení mezi jednotlivými měsíci -->
    <form action="" method="post" class="calendar" id="calendar">
        <input type="submit" name="prev" value="&lt">
        <input type="submit" name="today" value="Dnes">
        <input type="submit" name="next" value="&gt">
    </form>
    
    <!-- zobrazení grafů -->
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


            <!-- forumlář pro přidání dat -->
<div class="form">

<form id="newDataForm" method="POST" action="">
    <input id="back" type="button" value="Zpět"></input>
    <p>
        <label for="date" class="label">Datum:</label>
        <input type="date('YYYY-mm-dd')" id="date"  name="date" class="input" placeholder="YYYY-MM-DD"></input>
    </p>
    <p>
        <label for="time" class="label">Čas:</label>
        <input type="time('H:i:s')" id="time"  name="time" class="input" placeholder="HH:MM:SS"></input>
    </p>
    <p>
        <label for="tempIn" class="label">Teplota uvnitř:</label>
        <input type="float" id="tempIn"  name="tempIn" class="input" placeholder="˚C"></input>
    </p>
    <p>
        <label for="tempOut" class="label">Teplota venku:</label>
        <input type="float" id="tempOut"  name="tempOut" class="input" placeholder="˚C"></input>
    </p>
    <p>
        <label for="pressure" class="label">Atmosferický tlak:</label>
        <input type="float" id="pressure" name="pressure" class="input" placeholder="hPa"></input>
    </p>
    <p>
        <label for="humidity" class="label">Vlhkost vzduchu:</label>
        <input type="float" id="humidity" name="humidity" class="input" placeholder="%"></input>
    </p>
    <p>
    <label for="wind" class="label">Vítr:</label>
    <input type="float" id="wind" name="wind" class="input" placeholder="m/s"></input>
    </p>
    <p>
        <label for="rainfall" class="label">Srážky:</label>
        <input type="float" id="rainfall" name="rainfall" class="input" placeholder="mm/h"></input>
</p>
<p>
        <input type="submit" id="submit" value="Uložit" class="input" name="submit">
    </p>
    
    <?php

    if(isset($_POST["submit"])) {
        if (!empty($_POST["date"]) && !empty($_POST["time"])) {
            $date = $_POST["date"];
            $time = $_POST["time"];
            $dayNumber = date('z', strtotime($date))+1;
            $weekNumber = date('W', strtotime($date));
            $monthNumber = date('m', strtotime($date));
            $yearNumber = date('Y', strtotime($date));
        } elseif (!empty($_POST["date"])){
            $date = $_POST["date"];
            $time = date('H:i:s');
            $dayNumber = date('z', strtotime($date))+1;
            $weekNumber = date('W', strtotime($date));
            $monthNumber = date('m', strtotime($date));
            $yearNumber = date('Y', strtotime($date));
        } elseif (!empty($_POST["time"])) {
            $date = date('Y,m,d');
            $time = $_POST["time"];
            $yearNumber = date('Y');
            $monthNumber = date('m');
            $weekNumber = date('W'); // vrátí číslo týdne v roce
            $dayNumber = date('z')+1; // vrátí číslo dne v roce (1-365/366)
        }
        else {
            $date = date('Y,m,d');
            $time = date('H:i:s');
            $yearNumber = date('Y');
            $monthNumber = date('m');
            $weekNumber = date('W'); // vrátí číslo týdne v roce
            $dayNumber = date('z')+1; // vrátí číslo dne v roce (1-365/366)
        }

$tempIn = -1000;
$tempOut = -1000;
$pressure = -1000;
$humidity = -1000;
$wind = -1000;
$rainfall = -1000;

// Check each input field and update the corresponding variable if it's not empty
if (!empty($_POST["tempIn"]) || $_POST["tempIn"] === '0') {
    $tempIn = $_POST["tempIn"];
}
if (!empty($_POST["tempOut"]) || $_POST["tempOut"] === '0') {
    $tempOut = $_POST["tempOut"]; 
}
if (!empty($_POST["pressure"]) || $_POST["pressure"] === '0') {
    $pressure = $_POST["pressure"];
}
if (!empty($_POST["humidity"]) || $_POST["humidity"] === '0') {
    $humidity = $_POST["humidity"];
}
if (!empty($_POST["wind"]) || $_POST["wind"] === '0') {
    $wind = $_POST["wind"];
}
if (!empty($_POST["rainfall"]) || $_POST["rainfall"] === '0') {
    $rainfall = $_POST["rainfall"];
}

$sql = "insert into data_ep(users_id, dateNumber, timeNumber, yearNumber, monthNumber, weekNumber, dayNumber, temp_in, temp_out, pressure, humidity, wind, rainfall)" .
"values('".$users_id."','".$date."','".$time."','".$yearNumber."','".$monthNumber."', '".$weekNumber."', '".$dayNumber."', '".$tempIn."', '".$tempOut."', '".$pressure."', '".$humidity."', '".$wind."', '".$rainfall."')";


        if(mysqli_query($con, $sql)) {
            echo "<script> alert('Data byla uložena'); window.location.href='home.php'</script>";
        } else {
            echo "<script> alert('Chyba')</script>" .mysqli_error($con).BR;
        }
    
        exit();
    } 

    ?>

</form>

<script src="../javaScript/graphs.js"></script>
<!-- <script src="../javaScript/month_calendar.js"></script> -->
</body>
</html>
