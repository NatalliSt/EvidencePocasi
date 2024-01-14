<?php

require "session.php";
require "connection.php";
require "variables.php";

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawInChart);
    google.charts.setOnLoadCallback(drawOutChart);
    google.charts.setOnLoadCallback(drawPressChart);
    google.charts.setOnLoadCallback(drawHumChart);
    google.charts.setOnLoadCallback(drawWindChart);
    google.charts.setOnLoadCallback(drawRainChart);

    function drawInChart() {
        var in_data = google.visualization.arrayToDataTable([
            ['time', 'teplota uvnitř (˚C)'],

            <?php
                $in_month_sql = "select cur_date, temp_in from data_ep where cur_month = (SELECT MONTH(CURRENT_DATE()));";
                $in_month_qry = mysqli_query($con, $in_month_sql);

                while($in_month_row = mysqli_fetch_assoc($in_month_qry)) {
                    $in_date = $in_month_row['cur_date'];
                    $in_temperature = $in_month_row['temp_in'];
                ?>
                
                ['<?php echo $in_date; ?>', <?php echo $in_temperature; ?>],
                
                <?php
                }
            ?>
        ]);

        var in_options = {
           // title: 'Teplota uvnitř:',
            curveType: 'line',
            colors: ['#000000'],
            backgroundColor: '#E4E4E4',
            legend: { position: 'bottom' }
        };

        var in_chart = new google.visualization.LineChart(document.getElementById("tempIn"));

        in_chart.draw(in_data, in_options);
    
    }

    function drawOutChart() {
        var out_data = google.visualization.arrayToDataTable([
            ['time', 'teplota venku (˚C)'],

            <?php
                $out_month_sql = "select cur_date, temp_out from data_ep where cur_month = (SELECT MONTH(CURRENT_DATE()));";
                $out_month_qry = mysqli_query($con, $out_month_sql);

                while($out_month_row = mysqli_fetch_assoc($out_month_qry)) {
                    $out_date = $out_month_row['cur_date'];
                    $out_temperature = $out_month_row['temp_out'];
                ?>
                
                ['<?php echo $out_date; ?>', <?php echo $out_temperature; ?>],
                
                <?php
                }
            ?>
        ]);

        var out_options = {
            curveType: 'line',
            colors: ['#000000'],
            backgroundColor: '#E4E4E4',
            legend: { position: 'bottom' }
        };

        var out_chart = new google.visualization.LineChart(document.getElementById("tempOut"));

        out_chart.draw(out_data, out_options);
         }

         function drawPressChart() {
        var press_data = google.visualization.arrayToDataTable([
            ['time', 'atmosferický tlak (hPa)'],

            <?php
                $press_month_sql = "select cur_date, pressure from data_ep where users_id = '$users_id' and cur_month = (SELECT MONTH(CURRENT_DATE()));";
                $press_month_qry = mysqli_query($con, $press_month_sql);

                while($press_month_row = mysqli_fetch_assoc($press_month_qry)) {
                    $press_date = $press_month_row['cur_date'];
                    $pressure = $press_month_row['pressure'];
                ?>
                
                ['<?php echo $press_date; ?>', <?php echo $pressure; ?>],
                
                <?php
                }
            ?>
        ]);

        var press_options = {
            curveType: 'line',
            colors: ['#000000'],
            backgroundColor: '#E4E4E4',
            legend: { position: 'bottom' }
        };

        var press_chart = new google.visualization.LineChart(document.getElementById("pressure"));

        press_chart.draw(press_data, press_options);
        }


        function drawHumChart() {
        var hum_data = google.visualization.arrayToDataTable([
            ['time', 'vlhkost vzduchu (%)'],

            <?php
                $hum_month_sql = "select cur_date, humidity from data_ep where users_id = '$users_id' and cur_month = (SELECT MONTH(CURRENT_DATE()));";
                $hum_month_qry = mysqli_query($con, $hum_month_sql);

                while($hum_month_row = mysqli_fetch_assoc($hum_month_qry)) {
                    $hum_date = $hum_month_row['cur_date'];
                    $humidity = $hum_month_row['humidity'];
                ?>
                
                ['<?php echo $hum_date; ?>', <?php echo $humidity; ?>],
                
                <?php
                }
            ?>
        ]);

        var hum_options = {
            curveType: 'line',
            colors: ['#000000'],
            backgroundColor: '#E4E4E4',
            legend: { position: 'bottom' }
        };

        var hum_chart = new google.visualization.LineChart(document.getElementById("humidity"));

        hum_chart.draw(hum_data, hum_options);
        }

        
        function drawWindChart() {
        var wind_data = google.visualization.arrayToDataTable([
            ['time', 'vítr (m/s)'],

            <?php
                $wind_month_sql = "select cur_date, wind from data_ep where users_id = '$users_id' and cur_month = (SELECT MONTH(CURRENT_DATE()));";
                $wind_month_qry = mysqli_query($con, $wind_month_sql);

                while($wind_month_row = mysqli_fetch_assoc($wind_month_qry)) {
                    $wind_date = $wind_month_row['cur_date'];
                    $wind = $wind_month_row['wind'];
                ?>
                
                ['<?php echo $wind_date; ?>', <?php echo $wind; ?>],
                
                <?php
                }
            ?>
        ]);

        var wind_options = {
            curveType: 'line',
            colors: ['#000000'],
            backgroundColor: '#E4E4E4',
            legend: { position: 'bottom' }
        };

        var wind_chart = new google.visualization.LineChart(document.getElementById("wind"));

        wind_chart.draw(wind_data, wind_options);
        }


        function drawRainChart() {
        var rain_data = google.visualization.arrayToDataTable([
            ['time', 'srážky (mm/h)'],

            <?php
                $rain_month_sql = "select cur_date, rainfall from data_ep where users_id = '$users_id' and cur_month = (SELECT MONTH(CURRENT_DATE()));";
                $rain_month_qry = mysqli_query($con, $rain_month_sql);

                while($rain_month_row = mysqli_fetch_assoc($rain_month_qry)) {
                    $rain_date = $rain_month_row['cur_date'];
                    $rain = $rain_month_row['rainfall'];
                ?>
                
                ['<?php echo $rain_date; ?>', <?php echo $rain; ?>],
                
                <?php
                }
            ?>
        ]);

        var rain_options = {
            curveType: 'line',
            colors: ['#000000'],
            backgroundColor: '#E4E4E4',
            legend: { position: 'bottom' }
        };

        var rain_chart = new google.visualization.LineChart(document.getElementById("rainfall"));

        rain_chart.draw(rain_data, rain_options);
        }

</script>

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