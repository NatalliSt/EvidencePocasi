<?php
require_once "session.php";
require "today_calendar.php";
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
        $in_today_sql = "select cur_time, temp_in from data_ep where users_id = '$users_id' and cur_day = $day and cur_year = $year";
        $in_today_qry = mysqli_query($con, $in_today_sql);

        // Check if there is data available
        if (mysqli_num_rows($in_today_qry) > 0) {
    ?>
        var in_data = google.visualization.arrayToDataTable([
            ['time', 'teplota uvnitř (˚C)'],

            <?php

                while($in_today_row = mysqli_fetch_assoc($in_today_qry)) {
                    $in_time = $in_today_row['cur_time']." UTC";
                    $in_temperature = $in_today_row['temp_in'];
                ?>
                
                ['<?php echo $in_time; ?>', <?php echo $in_temperature; ?>],
                
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
        $out_today_sql = "select cur_time, temp_out from data_ep where users_id = '$users_id' and cur_day = $day and cur_year = $year;";
        $out_today_qry = mysqli_query($con, $out_today_sql);

        // Check if there is data available
        if (mysqli_num_rows($out_today_qry) > 0) {
    ?>
        var out_data = google.visualization.arrayToDataTable([
            ['time', 'teplota venku (˚C)'],

            <?php
                while($out_today_row = mysqli_fetch_assoc($out_today_qry)) {
                    $out_time = $out_today_row['cur_time']." UTC";
                    $out_temperature = $out_today_row['temp_out'];
                ?>
                
                ['<?php echo $out_time; ?>', <?php echo $out_temperature; ?>],
                
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
        $press_today_sql = "select cur_time, pressure from data_ep where users_id = '$users_id' and cur_day = $day and cur_year = $year;";
        $press_today_qry = mysqli_query($con, $press_today_sql);

        // Check if there is data available
        if (mysqli_num_rows($press_today_qry) > 0) {
            ?>
        var press_data = google.visualization.arrayToDataTable([
            ['time', 'atmosferický tlak (hPa)'],

            <?php
                while($press_today_row = mysqli_fetch_assoc($press_today_qry)) {
                    $press_time = $press_today_row['cur_time']." UTC";
                    $pressure = $press_today_row['pressure'];
                ?>
                
                ['<?php echo $press_time; ?>', <?php echo $pressure; ?>],
                
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
        $hum_today_sql = "select cur_time, humidity from data_ep where users_id = '$users_id' and cur_day = $day and cur_year = $year;";
        $hum_today_qry = mysqli_query($con, $hum_today_sql);

        // Check if there is data available
        if (mysqli_num_rows($hum_today_qry) > 0) {
    ?>
        var hum_data = google.visualization.arrayToDataTable([
            ['time', 'vlhkost vzduchu (%)'],

            <?php
                while($hum_today_row = mysqli_fetch_assoc($hum_today_qry)) {
                    $hum_time = $hum_today_row['cur_time']." UTC";
                    $humidity = $hum_today_row['humidity'];
                ?>
                
                ['<?php echo $hum_time; ?>', <?php echo $humidity; ?>],
                
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
        $wind_today_sql = "select cur_time, wind from data_ep where users_id = '$users_id' and cur_day = $day and cur_year = $year;";
        $wind_today_qry = mysqli_query($con, $wind_today_sql);

        // Check if there is data available
        if (mysqli_num_rows($wind_today_qry) > 0) {
    ?>
        var wind_data = google.visualization.arrayToDataTable([
            ['time', 'vítr (m/s)'],

            <?php
                while($wind_today_row = mysqli_fetch_assoc($wind_today_qry)) {
                    $wind_time = $wind_today_row['cur_time']." UTC";
                    $wind = $wind_today_row['wind'];
                ?>
                
                ['<?php echo $wind_time; ?>', <?php echo $wind; ?>],
                
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
        $rain_today_sql = "select cur_time, rainfall from data_ep where users_id = '$users_id' and cur_day = $day and cur_year = $year;";
        $rain_today_qry = mysqli_query($con, $rain_today_sql);


        // Check if there is data available
        if (mysqli_num_rows($rain_today_qry) > 0) {
    ?>
        var rain_data = google.visualization.arrayToDataTable([
            ['time', 'srážky (mm/h)'],

            <?php
                while($rain_today_row = mysqli_fetch_assoc($rain_today_qry)) {
                    $rain_time = $rain_today_row['cur_time']." UTC";
                    $rain = $rain_today_row['rainfall'];
                ?>
                
                ['<?php echo $rain_time; ?>', <?php echo $rain; ?>],
                
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
