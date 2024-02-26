<?php

require_once "session.php";
require_once "connection.php";
require_once "variables.php";

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

        <!-- menu -->
        <nav class="navBar">
            <ul class="navMenu">
                <li class="navItem">
                    <a href="home.php" class="active">Domů</a>
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
                    <a href="month.php" class="navLink">Měsíc</a>
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
    
    <!-- forumlář pro přidání dat -->
    <div class="form">

    <input id="addData" type="button" value="Přidat nová data"></input>

    <form id="newDataForm" method="POST" action="">
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
if (!empty($_POST["tempIn"])) {
    $tempIn = $_POST["tempIn"];
}
if (!empty($_POST["tempOut"])) {
    $tempOut = $_POST["tempOut"];
}
if (!empty($_POST["pressure"])) {
    $pressure = $_POST["pressure"];
}
if (!empty($_POST["humidity"])) {
    $humidity = $_POST["humidity"];
}
if (!empty($_POST["wind"])) {
    $wind = $_POST["wind"];
}
if (!empty($_POST["rainfall"])) {
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

    <!-- zobrazení nejnovějších dat -->
  
    <div id="gridContainer">

        <div class="grid" id="tempIn">
            <p id='title'>Teplota uvnitř:</p>
            <?php
                if ($in_row) {
                    if ($in != -1000) {
                        echo "<p id='content'>" . $in . " ˚C </p> " . BR;
                    echo "<p id='time'>" . $datetime ."</p>";
                    } else {
                    echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                }
            } else {
                echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
            }
            ?>
        </div>

        <div class="grid" id="tempOut">
            <p id='title'>Teplota venku:</p>
            <?php
                if ($out_row) {
                    if ($out != -1000) {
                        echo "<p id='content'>" . $out .  " ˚C </p>" . BR;
                        echo "<p id='time'>" . $datetime ."</p>";
                    } else {
                        echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                    } 
                } else {
                    echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                }
            ?>
        </div>

        <div class="grid" id="pressure">
            <p id='title'>Atmosferický tlak:</p>
            <?php
                if ($press_row) {
                    if ($press != -1000) {
                        echo "<p id='content'>" . $press . " hPa <p>" . BR;  
                        echo "<p id='time'>" . $datetime ."</p>";
                    } else {
                        echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                    }
                } else {
                    echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                }
            ?>
        </div>

        <div class="grid" id="humidity">
            <p id='title'>Vlhkost vzduchu:</p>
            <?php
                if ($humid_row) {
                    if ($humid != -1000) {
                        echo "<p id='content'>" . $humid . " % </p>" . BR;  
                        echo "<p id='time'>" . $datetime ."</p>";
                    } else {
                        echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                    }                    
                } else {
                    echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                }
            ?>
        </div>

        <div class="grid" id="wind">
            <p id='title'>Vítr:</p>
            <?php
                if ($wind_row) {
                    if ($wind != -1000) {
                        echo "<p id='content'>" . $wind . " m/s </p>" . BR; 
                        echo "<p id='time'>" . $datetime ."</p>"; 
                    } else {
                        echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                    }                    
                } else {
                    echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                }
            ?>
        </div>

        <div class="grid" id="rainfall">
            <p id='title'>Srážky:</p>
            <?php    
                if ($rain_row) {
                    if ($rain != -1000) {
                        echo "<p id='content'>". $rain. " mm/h </p>" . BR;
                        echo "<p id='time'>" . $datetime ."</p>";
                    } else {
                        echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                    }                    
                } else {
                    echo "<p>Nejsou k dispozici žádné hodnoty.</p>";
                }
            ?>
        </div>
            
    </div>

        

<script src="../javaScript/evidencePocasi.js"></script>

</body>
</html>