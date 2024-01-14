<?php
    define("BR" , "</br>\n");

    // výběr hodnoty id přihlášeného uživatele
    $email = $_SESSION['email'];
    $email_sql = "select users_id from users where email='$email'";
    $email_qry = mysqli_query($con, $email_sql);
    $email_row = mysqli_fetch_assoc($email_qry);
    $users_id = $email_row['users_id'];
    // echo $id;

    // výběr poslední hodnoty vnitřní teploty
    $in_sql = "select temp_in from data_ep where users_id = '$users_id' and created = (SELECT MAX(created) FROM data_ep);"; // výběr nejnovějšího záznamu
    $in_qry = mysqli_query($con, $in_sql);
    $in_row = mysqli_fetch_assoc($in_qry);
    $in = $in_row['temp_in'];

    // výběr poslední hodnoty vnější teploty
    $out_sql = "select temp_out from data_ep where users_id = '$users_id' and created = (SELECT MAX(created) FROM data_ep);";
    $out_qry = mysqli_query($con, $out_sql);
    $out_row = mysqli_fetch_assoc($out_qry);
    $out = $out_row['temp_out'];

    // výběr poslední hodnoty atmosferického tlaku
    $press = "select pressure from data_ep where users_id = '$users_id' and created = (SELECT MAX(created) FROM data_ep);";
    $press2 = mysqli_query($con, $press);
    $press_row = mysqli_fetch_assoc($press2);
    $press = $press_row['pressure'];

    // výběr poslední hodnoty vlhkosti vzduchu
    $humid_sql = "select humidity from data_ep where users_id = '$users_id' and created = (SELECT MAX(created) FROM data_ep);";
    $humid_qry = mysqli_query($con, $humid_sql);
    $humid_row = mysqli_fetch_assoc($humid_qry);
    $humid = $humid_row['humidity'];

    // výběr poslední hodnoty větru
    $wind_sql = "select wind from data_ep where users_id = '$users_id' and created = (SELECT MAX(created) FROM data_ep);";
    $wind_qry = mysqli_query($con, $wind_sql);
    $wind_row = mysqli_fetch_assoc($wind_qry);
    $wind = $wind_row['wind'];

    // výběr poslední hodnoty srážek
    $rain_sql = "select rainfall from data_ep where users_id = '$users_id' and created = (SELECT MAX(created) FROM data_ep);";
    $rain_qry = mysqli_query($con, $rain_sql);
    $rain_row = mysqli_fetch_assoc($rain_qry);
    $rain = $rain_row['rainfall'];

    // čas - kdy byl záznam uložen
    $time_sql = "select created from data_ep where users_id = '$users_id' and created = (SELECT MAX(created) FROM data_ep);"; // výběr nejnovějšího záznamu
    $time_qry = mysqli_query($con, $time_sql);
    $time_row = mysqli_fetch_assoc($time_qry);
    $time = $time_row['created']; 

    $in_today_array = array();
    $out_today_array = array();
    $press_today_array = array();
    $hum_today_array = array();
    $wind_today_array = array();
    $rain_today_array = array();

    $in_week_array = array();
    $out_week_array = array();
    $press_week_array = array();
    $hum_week_array = array();
    $wind_week_array = array();
    $rain_week_array = array();

    $in_month_array = array();
    $out_month_array = array();
    $press_month_array = array();
    $hum_month_array = array();
    $wind_month_array = array();
    $rain_month_array = array();
    
   // $cur_time = date('H:i:s');

   $sql_today = "select temp_in from data_ep where users_id = '$users_id' and cur_date = curdate();";
   $query_today = mysqli_query($con, $sql_today);
   $row_today = mysqli_fetch_assoc($query_today);

?>