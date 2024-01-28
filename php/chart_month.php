<?php
require_once "session.php";
require "month_calendar.php";
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

    /*
    var prev = document.getElementById("prev");

    prev.addEventListener("click", prevMonth);
    */

    function drawInChart() {
        <?php
        $in_month_sql = "select cur_date, temp_in from data_ep where users_id = '$users_id' and cur_month = $month and cur_year = $year;";
        $in_month_qry = mysqli_query($con, $in_month_sql);
        // Check if there is data available
        if (mysqli_num_rows($in_month_qry) > 0) {
        ?>

        var in_data = google.visualization.arrayToDataTable([
            ['time', 'teplota uvnitř (˚C)'],

            <?php
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
        <?php
        } else {
            // If no data, display a sentence instead of drawing the graph
            echo 'document.getElementById("tempIn").innerHTML = "Nejsou k dispozici žádné hodnoty.";';
        }
    ?>
    
    }

    function drawOutChart() {
        <?php
        $out_month_sql = "select cur_date, temp_out from data_ep where users_id = '$users_id' and cur_month = $month and cur_year = $year;";
        $out_month_qry = mysqli_query($con, $out_month_sql);
        // Check if there is data available
        if (mysqli_num_rows($out_month_qry) > 0) {
            ?>

        var out_data = google.visualization.arrayToDataTable([
            ['time', 'teplota venku (˚C)'],

            <?php
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
        <?php
        } else {
            // If no data, display a sentence instead of drawing the graph
            echo 'document.getElementById("tempOut").innerHTML = "Nejsou k dispozici žádné hodnoty.";';
        }
    ?>
        }

         function drawPressChart() {
            <?php
    $press_month_sql = "select cur_date, pressure from data_ep where users_id = '$users_id' and cur_month = $month and cur_year = $year;";
    $press_month_qry = mysqli_query($con, $press_month_sql);
            // Check if there is data available
        if (mysqli_num_rows($press_month_qry) > 0) {
            ?>

        var press_data = google.visualization.arrayToDataTable([
            ['time', 'atmosferický tlak (hPa)'],

            <?php
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
        <?php
        } else {
            // If no data, display a sentence instead of drawing the graph
            echo 'document.getElementById("pressure").innerHTML = "Nejsou k dispozici žádné hodnoty.";';
        }
    ?>
        }


        function drawHumChart() {
        <?php
            $hum_month_sql = "select cur_date, humidity from data_ep where users_id = '$users_id' and cur_month = $month and cur_year = $year;";
            $hum_month_qry = mysqli_query($con, $hum_month_sql);
            // Check if there is data available
        if (mysqli_num_rows($hum_month_qry) > 0) {
            ?>

        var hum_data = google.visualization.arrayToDataTable([
            ['time', 'vlhkost vzduchu (%)'],

            <?php

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
        <?php
        } else {
            // If no data, display a sentence instead of drawing the graph
            echo 'document.getElementById("humidity").innerHTML = "Nejsou k dispozici žádné hodnoty.";';
        }
    ?>
        }

        
        function drawWindChart() {
            <?php
                $wind_month_sql = "select cur_date, wind from data_ep where users_id = '$users_id' and cur_month = $month and cur_year = $year;";
                $wind_month_qry = mysqli_query($con, $wind_month_sql);
                // Check if there is data available
        if (mysqli_num_rows($wind_month_qry) > 0) {
            ?>

        var wind_data = google.visualization.arrayToDataTable([
            ['time', 'vítr (m/s)'],

            <?php
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
        <?php
        } else {
            // If no data, display a sentence instead of drawing the graph
            echo 'document.getElementById("wind").innerHTML = "Nejsou k dispozici žádné hodnoty.";';
        }
    ?>
        }


        function drawRainChart() {
            <?php
                $rain_month_sql = "select cur_date, rainfall from data_ep where users_id = '$users_id' and cur_month = $month and cur_year = $year;";
                $rain_month_qry = mysqli_query($con, $rain_month_sql);
            // Check if there is data available
        if (mysqli_num_rows($rain_month_qry) > 0) {
            ?>

        var rain_data = google.visualization.arrayToDataTable([
            ['time', 'srážky (mm/h)'],

            <?php
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
        <?php
        } else {
            // If no data, display a sentence instead of drawing the graph
            echo 'document.getElementById("rainfall").innerHTML = "Nejsou k dispozici žádné hodnoty.";';
        }
    ?>
        }

</script>
