<?php
    session_start();


    if(empty($_SESSION["name"])){
        header('Location: '.'index.php');
    }

    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "vehicles";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    $vehicles = [];

    if(!$conn->connect_error){
        $sql = "SELECT id, owner, car_plate, year FROM vehicles";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                array_push($vehicles, $row);
            }
        }
    }
    $conn->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>Vehículos</title>
</head>
<body>
    <div class = "main-container">
        <div class = "add-bg">
            <div class = "add-container">
                <form method = "post" action="addVehicle.php">
                    <p id = "p-id">Nuevo Vehículo</p>
                    <input class = "entries" type = "text" placeholder = "Dueño" name = "owner" id = "owner-id">
                    <input class = "entries" type = "text" placeholder = "Matricula" name = "carPlate" id = "carPlate-id">
                    <input class = "entries" type = "number" placeholder = "Año" name = "year" id="year-id">
                    <input name = "id" value = "-1" style="display:none;" id = "element-id">
                    <input name = "action" value = "add" style="display:none;" id = "action-id">
                    <input class = "btn" type = "submit" value = "Aceptar">
                    <input class = "exit-btn" type = "button" value = "Cancelar">
                </form>
            </div>
        </div>

        <div class = "second-container">
            <h1>Vehículos</h1>
            <span class="material-icons" id = "add-Element">add</span>
            <table id = "vehicle-table">
                <tr>
                    <td><b>id</b></td>
                    <td><b>Dueño</b></td>
                    <td><b>Matricula</b></td>
                    <td><b>Año</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    foreach ($vehicles as $key => $element){
                        echo '<tr>';
                        echo '<td>'.$element['id'].'</td>';
                        echo '<td>'.$element['owner'].'</td>';
                        echo '<td>'.$element['car_plate'].'</td>';
                        echo '<td>'.$element['year'].'</td>';
                        echo '<td class = "edit"><span class="material-icons">edit</span></td>';
                        echo '<td class = "delete"><span class="material-icons">clear</span></td>';
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>