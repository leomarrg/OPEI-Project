<?php
    // Start session
    session_start();
    
    // Check if the user is logged in
    if (!isset($_SESSION['UserID'])) {
        // Redirect the user to the login page if they are not logged in
        header("Location: ../signin.html");
        exit; // Ensure that script execution stops after redirection
    }


    // Include database connection using MySQLi
    include_once "db_info.php";

    // Prepare and execute query to fetch User details
$UserID = $_SESSION['UserID'];
$sql = "SELECT `Name`, `DepartmentID` FROM `usuario` WHERE `UserID` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $UserID);
$stmt->execute();
$result = $stmt->get_result();
$userDetails = $result->fetch_assoc();

// Store user's name and department ID in session variables
$_SESSION['userName'] = $userDetails['Name'];
$_SESSION['DepartmentID'] = $userDetails['DepartmentID'];

// Check if DepartmentID exists in the session
if (isset($_SESSION['DepartmentID'])) {
    // Retrieve the DepartmentID of the logged-in user from the session
    $departmentID = $_SESSION['DepartmentID'];

    // Query the departamento table to get the department name
    $sql = "SELECT DepartmentName FROM departamento WHERE DepartmentID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $departmentID);
    $stmt->execute();
    $result = $stmt->get_result();
    $department = $result->fetch_assoc();
} 

// Check if department name is retrieved
if (isset($department['DepartmentName'])) {
    // Store department name in a variable
    $departmentName = $department['DepartmentName'];
} else {
    // Handle the case where department name is not retrieved
    $departmentName = "Unknown Department";
}

// Get current year
$year = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-sidemenu.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- Add jQuery UI library -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>UPRA Reports Tabla 2-1A Editar</title>

    <script>
      $(document).ready(function() {
        editRow21a();
      });
    </script>
</head>
<body>
    <header>
        <h1 class="uprareports">UPRA Annual Report</h1>
        <h2 class="bienvenidosusuario"><?php echo $department['DepartmentName'] ?></h2>
    </header>


    <!-- Main form -->
    <div class="formbold-main-wrapper-edit">
        <div class="formbold-form-wrapper-edit">
        <h4 class="header1">Editar Informaci&oacute;n<br>  <br>Tabla 2.1A: Actividades de publicación divulgadas llevadas a cabo por la facultad</h4>
           
            <table class="table" style='margin: 0 auto;'>
                <thead>
                    <tr>
                        <th scope="col" style='display: none;'>#</th>
                        <th scope="col">Profesor</th>
                        <th scope="col">Título de la actividad</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Publicada</th>
                        <th scope="col">Clasificación de la publicación</th>
                        <th scope="col">*Tipo de Publicación</th>
                        <th scope="col">Auspiciada por el CIC</th>
                        <th scope="col">Entidad que publica</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // SQL query to retrieve data from table12 based on department and year
                        $sql = "SELECT * FROM table21a WHERE DepartmentID = ? AND year = ?";

                        // Prepare the statement
                        $stmt = $conn->prepare($sql);

                        // Bind the parameters
                        $stmt->bind_param("si", $departmentID, $year);

                        // Execute the query
                        $stmt->execute();

                        // Get the result
                        $result =$stmt->get_result();

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='display: none;'>" . $row['table21aID'] . "</td>";
                            echo "<td class='breve-description'>" . $row['field1'] . "</td>";
                            echo "<td class='breve-description'>" . $row['field2'] . "</td>";
                            echo "<td class='breve-description'>" . $row['field3'] . "</td>";
                            echo "<td class='breve-description'>" . $row['field4'] . "</td>";
                            echo "<td class='breve-description'>" . $row['field5'] . "</td>";
                            echo "<td class='breve-description'>" . $row['field6'] . "</td>";
                            echo "<td class='breve-description'>" . $row['field7'] . "</td>";
                            echo "<td  class='breve-description'>" . $row['field8'] . "</td>";
                            echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                            echo "<td><a class='delete-btn' href='../meta-2/tabla2.1a_delete.php?id=" . $row['table21aID'] . "'>Borrar</a></td>";
                            echo "</tr>";
                        }
                        // Close connection
                        $conn->close();
                    ?>
                </tbody>
            </table>
                    <div class="formbold-main-wrapperDept">
                <a class="underline-button" href="../meta-2/tabla2.1A.php">Volver</a>
            </div>
        </div>
    </div>

    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
</body>
</html>
