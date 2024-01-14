<?php

require "session.php";
require "connection.php";
require "variables.php";

?>

<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidence počasí</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    
    <header>
        <div class="Logo">
            <img src="../pictures/logoPocasi.png" class="image">
            <div class="logo"><a href="home.php" style="color: white; border: 0; box-shadow: 0 0 0">EVIDENCE POČASÍ</a></div>
        </div>

        <nav class="navBar">
            <ul class="navMenu">
                <li class="navItem">
                    <a href="home.php" class="active">Domů</a>
                </li>
                <li class="navItem">
                    <a href="today.php" class="navLink">Dnes</a>
                </li>
                
                <li class="navItem">
                    <a href="yesterday.php" class="navLink">Včera</a>
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
    
    <div class="form">

    <input id="addData" type="button" value="Přidat nová data"></input>

    <form id="newDataForm" method="POST" action="">
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
            $tempIn = $_POST["tempIn"];
            $tempOut = $_POST["tempOut"];
            $pressure = $_POST["pressure"];
            $humidity = $_POST["humidity"];
            $wind = $_POST["wind"];
            $rainfall = $_POST["rainfall"];

            $cur_date = date('Y,m,d');
            $cur_time = date('H:i:s');

            $cur_year = date('Y');
            $cur_month = date('m');
            $cur_week = date('W'); 
            $cur_day = date('d');

            $cur_hour = date('H');
            $cur_min = date('i');
            $cur_sec = date('s'); 
            
            
            $sql = "insert into data_ep(users_id, cur_date, cur_time, cur_year, cur_month, cur_week, cur_day, cur_hour, cur_min, cur_sec, temp_in, temp_out, pressure, humidity, wind, rainfall)" .
            "values('".$users_id."','".$cur_date."','".$cur_time."','".$cur_year."','".$cur_month."', '".$cur_week."', '".$cur_day."','".$cur_hour."','".$cur_min."','".$cur_sec."', '".$tempIn."', '".$tempOut."', '".$pressure."', '".$humidity."', '".$wind."', '".$rainfall."')";
    
            /*
            $sql = "insert into data_ep(users_id, cur_date, cur_time, temp_in, temp_out, pressure, humidity, wind, rainfall)" .
            "values('".$users_id."', '".$cur_date."','".$cur_time."','".$tempIn."', '".$tempOut."', '".$pressure."', '".$humidity."', '".$wind."', '".$rainfall."')";
            */

            if(mysqli_query($con, $sql)) {
                echo "<script> alert('Data byla uložena'); window.location.href='home.php'</script>";
            } else {
                echo "<script> alert('Chyba')</script>" .mysqli_error($con).BR;
            }
        
            exit();
        } 

        ?>

    </form>
  
    <div id="gridContainer">

        <div class="grid" id="tempIn">
            <p id='title'>Teplota uvnitř:</p>
            <?php
                if ($in_row) {
                    echo "<p id='content'>" . $in . " ˚C </p> " . BR;
                    echo "<p id='time'>" . $time ."</p>";
                }
            ?>
        </div>

        <div class="grid" id="tempOut">
            <p id='title'>Teplota venku:</p>
            <?php
                if ($out_row) {
                    echo "<p id='content'>" . $out .  " ˚C </p>" . BR;
                    echo "<p id='time'>" . $time ."</p>";
                }
            ?>
        </div>

        <div class="grid" id="pressure">
            <p id='title'>Atmosferický tlak:</p>
            <?php
                if ($press_row) {
                    echo "<p id='content'>" . $press . " hPa <p>" . BR;  
                    echo "<p id='time'>" . $time ."</p>";
                }
            ?>
        </div>

        <div class="grid" id="humidity">
            <p id='title'>Vlhkost vzduchu:</p>
            <?php
                if ($humid_row) {
                    echo "<p id='content'>" . $humid . " % </p>" . BR;  
                    echo "<p id='time'>" . $time ."</p>";
                }
            ?>
        </div>

        <div class="grid" id="wind">
            <p id='title'>Vítr:</p>
            <?php
                if ($wind_row) {
                    echo "<p id='content'>" . $wind . " m/s </p>" . BR; 
                    echo "<p id='time'>" . $time ."</p>"; 
                }
            ?>
        </div>

        <div class="grid" id="rainfall">
            <p id='title'>Srážky:</p>
            <?php    
                if ($rain_row) {
                    echo "<p id='content'>". $rain. " mm/h </p>" . BR;
                    echo "<p id='time'>" . $time ."</p>";
                }
            ?>
        </div>
            
    </div>

        

<script src="../javaScript/evidencePocasi.js"></script>

</body>
</html>