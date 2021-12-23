<?php
    session_start();
    $user = $_POST["user"];
    $password = $_POST["pass"];
    
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "vehicles";

    if (empty($user) || empty($password)){
        header('Location: '.'index.php');
    }
    else{
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        $result = [];
        if(!$conn->connect_error){
            $sql = "SELECT id FROM user WHERE user = '$user' and password = '$password' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                header('Location: '.'home.php');
                $_SESSION["name"] = $user;
                $_SESSION["error"] = false;
            }
            else{
                header('Location: '.'index.php');
                $_SESSION["error"] = true;
            }
        }
        $conn->close();
    }
?>