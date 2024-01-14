<?php

include ('connection.php');

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
    <div class="grid-container">
        <div class="title">EVIDENCE POČASÍ</div>
        <!-- 
        <div class="languages">
            <img src="Pictures/czechFlag.png" style="height: 10px;"/>
            <a href="#" language="czech" class="active"> CZ </a>
            <img src="Pictures/britishFlag.png" style="height: 10px;"/>
            <a href="#" language="english"> ENG </a>
        </div> -->
        <div class="logIn">
            <img src="../pictures/logoPocasi.png" class="image">
            <!--
            <p>
                <label class="label" id="name">Jméno: </label>
                <input class="input2" type="text" required>
            </p>
            <p>
                <label class="label" id="surname">Příjmení: </label>
                <input class="input2" type="text" required>
            </p>
            -->
            <form method="POST" action="">
            <p>
                <input type="email" placeholder="E-mail" id="email" name="email" required>
            </p>
            <p>
                <input type="password" placeholder="Heslo" id="pw" name="pw" required>
            </p>
            <p>
                <input type="password" placeholder="Potvrdit heslo" id="pw2" name="pw2" required>
            </p>
            <p>
                <input type="submit" class="logInButton" id="submit" name="submit" value="Registrovat se">
            </p>
            <p style="font-size: 20px;"><a href="index.php" class="register" style="color: white">Přihlásit se</a></p>


            <?php 
                // require "connection.php";
                // require "functions.php";

                /* if($_SERVER['REQUEST_METHOD'] == "POST") {
                    $email = $_POST["email"];
                    $pw = $_POST["pw"]; // heslo
                    $pw2 = $_POST["pw2"]; // potvrzení hesla

                    if ($pw == $pw2) { 
                        $pw_hashed = md5($pw); // šifrování hesla
                        $reg = "insert into users(email, pw) values('".$email."', '".$pw_hashed."')";
                        mysqli_query($query);
                        header("location: index.php");
                        die;
                        } else {
                              echo "<script> alert('Hesla se neshodují')</script>";
                        }

                        if(mysqli_query($con, $reg)) {
                            echo "<script> alert('Byli jste zaregistrováni'); window.location.href='index.php'</script>"; // potvrzení registrace, vrácení se k login stránce
                        } else {
                            echo "chyba:".mysqli_error($con).BR;
                        }
                    
                        exit();
                } */
    
                if(isset($_POST["submit"])) {
                   $email = $_POST["email"];
                   $pw = $_POST["pw"]; // heslo
                   $pw2 = $_POST["pw2"]; // potvrzení hesla
                   
                   if ($pw == $pw2) { 
                    $pw_hashed = md5($pw); // šifrování hesla
                    $reg = "insert into users(email, pw) values('".$email."', '".$pw_hashed."')"; // uložení do databáze
                    } else {
                      echo "<script> alert('Hesla se neshodují')</script>";
                    }
                
                    if(mysqli_query($con, $reg)) {
                        echo "<script> alert('Byli jste zaregistrováni'); window.location.href='index.php'</script>"; // potvrzení registrace, vrácení se k login stránce
                    } else {
                        // echo "chyba:".mysqli_error($con).BR;
                        echo "<script>alert('Tento email již někdo používá.')</script>";
                    }
                
                    exit();
                }

            ?> 
            </form>
        </div>
    </div>
    </div>
</body>
</html>