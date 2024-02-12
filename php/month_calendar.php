<?php 
require_once "session.php";

if(!isset( $_SESSION["month"] ) ) {
    $_SESSION["month"]=date('n');
}
if(!isset($_SESSION["year"])) {
    $_SESSION["year"] = date('Y');
}

if( isset( $_POST['next'] ) ) {
    if($_SESSION["month"] == 12) {
        $_SESSION["month"] = 1;
        $_SESSION["year"]++;
    } else {
        $_SESSION["month"]++;
    }
    
} elseif( isset( $_POST['prev'] ) ){
    if ($_SESSION["month"] == 1) {
        $_SESSION["month"] = 12;
        $_SESSION["year"]--;
    } else {
        $_SESSION["month"]--;
    }
    
} elseif (isset($_POST['today'])) {
    $_SESSION["month"] = date('n');
    $_SESSION["year"] = date('Y');
}

$month = $_SESSION["month"];
$year = $_SESSION["year"];

?>