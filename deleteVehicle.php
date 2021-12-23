 <?php
    session_start();

    $id = $_POST["id"];

    if(empty($_SESSION["name"])){
        header('Location: '.'index.php');
    }
    
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "vehicles";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    if(!$conn->connect_error){
        $sql = "DELETE FROM vehicles WHERE id = $id";
        if ($conn->query($sql) === TRUE){
            header('Location: '.'index.php');
        }
        else{
            //Error
        }
    }
    $conn->close();
 ?>