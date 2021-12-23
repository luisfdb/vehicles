<?php
    session_start();

    $action = $_POST["action"];
    $owner = $_POST["owner"];
    $carPlate = $_POST["carPlate"];
    $year = $_POST['year'];
    $id = $_POST['id'];

    if(empty($_SESSION["name"])){
        header('Location: '.'index.php');
    }
    
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "vehicles";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    if(!$conn->connect_error){
        if($action == "upd"){
            $sql = "UPDATE vehicles set owner = '$owner', car_plate = '$carPlate', year = '$year' WHERE id = '$id';";
        }
        else{
            $sql = "INSERT INTO vehicles(owner, car_plate, year) VALUES ('$owner', '$carPlate', $year);";
        }
        if ($conn->query($sql) === TRUE){
            header('Location: '.'index.php');
        }
        else{
            //Error
        }
    }
    $conn->close();
?>