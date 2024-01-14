<?php

session_start();
include ('connection.php');

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    $hash = md5($pw);

    $sql="select * from users where email='$email' and pw='$hash'";

    $query = mysqli_query($con, $sql) or die(mysqli_error($con).mysqli_error($sql));
     
    if(mysqli_num_rows($query) == 1) {          
        $_SESSION['email'] = $email;
        header('location: home.php');
    } else {
        echo "<script>alert('Chybný E-mail nebo heslo!')</script>";
    }
    }      

?>

<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidence počasí</title>
    <link rel="stylesheet" href="../css/index.css"/>
</head>
<body class="body">
    <div class="container">
        <!-- 
        <div class="languages">
            <img src="Pictures/czechFlag.png" style="height: 10px;"/>
            <a href="#" language="czech" class="active"> CZ </a>
            <img src="Pictures/britishFlag.png" style="height: 10px;"/>
            <a href="#" language="english"> ENG </a>
        </div> -->
        <div class="grid-container">
            <div class="title">EVIDENCE POČASÍ</div>
            <div class="logIn">
                <img src="../pictures/logoPocasi.png" class="image">
                <form method="POST" action="">
                <p>
                    <!-- <label>E-mail:</label> -->
                    <input type="email" placeholder="E-mail" name="email"  value="<?php if (isset($_COOKIE["email"])){echo $_COOKIE["email"];}?>" required>
                </p>
                <p>
                    <!-- <label class="password">Heslo:</label> -->
                    <input type="password" placeholder="Heslo" name="pw" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" required>
                </p>
                <!--
                    <p style="font-size: 20px;">
                        <a href="" class="forgot">Zapomenuté heslo?</a>
                    </p>
                -->
                <p>
                    <input type="submit" class="logInButton" name="submit" id="submit" value="Přihlásit se">
                </p>
                <p style="font-size: 20px;"><a href="registration.php" class="register" style="color:white">Zaregistrovat se</a></p>
                
                </form>

            </div>
        </div>
    </div>
</body>
</html>