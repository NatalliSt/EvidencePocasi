<?php 
require_once "session.php";

if(!isset( $_SESSION["day"] ) ) {
    $_SESSION["day"]= date('z')+1;
}
if(!isset($_SESSION["year"])) {
    $_SESSION["year"] = date('Y');
}


if( isset( $_POST['next'] ) ) {
    if($_SESSION["day"] == 365) {
        $_SESSION["day"] = 1;
        $_SESSION["year"]++;
    } else {
        $_SESSION["day"]++;
    }
    
} elseif( isset( $_POST['prev'] ) ){
    if ($_SESSION["day"] == 1) {
        $_SESSION["day"] = 365;
        $_SESSION["year"]--;
    } else {
        $_SESSION["day"]--;
    }
    
} elseif (isset($_POST['today'])) {
    $_SESSION["day"] = date('z')+1;
    $_SESSION["year"] = date('Y');
}

$day = $_SESSION["day"];
$year = $_SESSION["year"];


?>