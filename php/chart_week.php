<?php
require_once "session.php";
require "week_calendar.php";

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
        <?php
        $in_week_sql = "select dateNumber, temp_in from data_ep where users_id = '$users_id' and weekNumber = $week and yearNumber = $year and temp_in != -1000 order by dateNumber asc;";
        $in_week_qry = mysqli_query($con, $in_week_sql);

        // Check if there is data available
        if (mysqli_num_rows($in_week_qry) > 0) {
        ?>

        var in_data = google.visualization.arrayToDataTable([
            ['time', 'teplota uvnitř (˚C)'],

            <?php
                while($in_week_row = mysqli_fetch_assoc($in_week_qry)) {
                    $in_date = $in_week_row['dateNumber'];
                    $in_temperature = $in_week_row['temp_in'];
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
        $out_week_sql = "select dateNumber, temp_out from data_ep where users_id = '$users_id' and weekNumber = $week and yearNumber = $year and temp_out != -1000 order by dateNumber asc;";
        $out_week_qry = mysqli_query($con, $out_week_sql);
        // Check if there is data available
        if (mysqli_num_rows($out_week_qry) > 0) {
        ?>
        
        var out_data = google.visualization.arrayToDataTable([
            ['time', 'teplota venku (˚C)'],

            <?php
                while($out_week_row = mysqli_fetch_assoc($out_week_qry)) {
                    $out_date = $out_week_row['dateNumber'];
                    $out_temperature = $out_week_row['temp_out'];
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
            $press_week_sql = "select dateNumber, pressure from data_ep where users_id = '$users_id' and weekNumber = $week and yearNumber = $year and pressure != -1000 order by dateNumber asc;";
            $press_week_qry = mysqli_query($con, $press_week_sql);
            // Check if there is data available
            if (mysqli_num_rows($press_week_qry) > 0) {
            ?>
        var press_data = google.visualization.arrayToDataTable([
            ['time', 'atmosferický tlak (hPa)'],

            <?php

                while($press_week_row = mysqli_fetch_assoc($press_week_qry)) {
                    $press_date = $press_week_row['dateNumber'];
                    $pressure = $press_week_row['pressure'];
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
            $hum_week_sql = "select dateNumber, humidity from data_ep where users_id = '$users_id' and weekNumber =  $week and yearNumber = $year and humidity != -1000 order by dateNumber asc;";
            $hum_week_qry = mysqli_query($con, $hum_week_sql);
            // Check if there is data available
            if (mysqli_num_rows($hum_week_qry) > 0) {
            ?>
        var hum_data = google.visualization.arrayToDataTable([
            ['time', 'vlhkost vzduchu (%)'],

            <?php
                while($hum_week_row = mysqli_fetch_assoc($hum_week_qry)) {
                    $hum_date = $hum_week_row['dateNumber'];
                    $humidity = $hum_week_row['humidity'];
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
            $wind_week_sql = "select dateNumber, wind from data_ep where users_id = '$users_id' and weekNumber =  $week and yearNumber = $year and wind != -1000 order by dateNumber asc;";
            $wind_week_qry = mysqli_query($con, $wind_week_sql);
            // Check if there is data available
            if (mysqli_num_rows($wind_week_qry) > 0) {
        ?>

        var wind_data = google.visualization.arrayToDataTable([
            ['time', 'vítr (m/s)'],

            <?php

                while($wind_week_row = mysqli_fetch_assoc($wind_week_qry)) {
                    $wind_date = $wind_week_row['dateNumber'];
                    $wind = $wind_week_row['wind'];
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
            $rain_week_sql = "select dateNumber, rainfall from data_ep where users_id = '$users_id' and weekNumber =  $week and yearNumber = $year and rainfall != -1000 order by dateNumber asc;";
            $rain_week_qry = mysqli_query($con, $rain_week_sql);
            // Check if there is data available
            if (mysqli_num_rows($rain_week_qry) > 0) {
            ?>
        
        var rain_data = google.visualization.arrayToDataTable([
            ['time', 'srážky (mm/h)'],

            <?php
                while($rain_week_row = mysqli_fetch_assoc($rain_week_qry)) {
                    $rain_date = $rain_week_row['dateNumber'];
                    $rain = $rain_week_row['rainfall'];
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