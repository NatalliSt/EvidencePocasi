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
                $in_today_sql = "select cur_time, temp_in from data_ep where users_id = '$users_id' and cur_date = curdate();";
                $in_today_qry = mysqli_query($con, $in_today_sql);

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
    
    }

    function drawOutChart() {
        var out_data = google.visualization.arrayToDataTable([
            ['time', 'teplota venku (˚C)'],

            <?php
                $out_today_sql = "select cur_time, temp_out from data_ep where users_id = '$users_id' and cur_date = curdate();";
                $out_today_qry = mysqli_query($con, $out_today_sql);

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
         }

         function drawPressChart() {
        var press_data = google.visualization.arrayToDataTable([
            ['time', 'atmosferický tlak (hPa)'],

            <?php
                $press_today_sql = "select cur_time, pressure from data_ep where users_id = '$users_id' and cur_date = curdate();";
                $press_today_qry = mysqli_query($con, $press_today_sql);

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
        }


        function drawHumChart() {
        var hum_data = google.visualization.arrayToDataTable([
            ['time', 'vlhkost vzduchu (%)'],

            <?php
                $hum_today_sql = "select cur_time, humidity from data_ep where users_id = '$users_id' and cur_date = curdate();";
                $hum_today_qry = mysqli_query($con, $hum_today_sql);

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
        }

        
        function drawWindChart() {
        var wind_data = google.visualization.arrayToDataTable([
            ['time', 'vítr (m/s)'],

            <?php
                $wind_today_sql = "select cur_time, wind from data_ep where users_id = '$users_id' and cur_date = curdate();";
                $wind_today_qry = mysqli_query($con, $wind_today_sql);

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
        }


        function drawRainChart() {
        var rain_data = google.visualization.arrayToDataTable([
            ['time', 'srážky (mm/h)'],

            <?php
                $rain_today_sql = "select cur_time, rainfall from data_ep where users_id = '$users_id' and cur_date = curdate();";
                $rain_today_qry = mysqli_query($con, $rain_today_sql);

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
        }

</script>