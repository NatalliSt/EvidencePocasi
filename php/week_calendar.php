<?php 
require "session.php";

if(!isset( $_SESSION["week"] ) ) {
    $_SESSION["week"]= date('W');
}
if(!isset($_SESSION["year"])) {
    $_SESSION["year"] = date('Y');
}


if( isset( $_POST['next'] ) ) {
    if($_SESSION["week"]== 52) {
        $_SESSION["week"] = 1;
        $_SESSION["year"]++;
    } else {
        $_SESSION["week"]++;
    }
    
} elseif( isset( $_POST['prev'] ) ){
    if ($_SESSION["week"] == 1) {
        $_SESSION["week"] = 52;
        $_SESSION["year"]--;
    } else {
        $_SESSION["week"]--;
    }
    
} elseif (isset($_POST['today'])) {
    $_SESSION["week"] = date('W');
    $_SESSION["year"] = date('Y');
}

$week = $_SESSION["week"];
$year = $_SESSION["year"];


?>