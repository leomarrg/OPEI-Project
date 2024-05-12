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
    <title>UPRA Reports Tabla 2-5 Editor</title>

    <script>
        $(document).ready(function() {
            editRow25();
        });
    </script>

</head>
<body>
        <header>
            <h1 class="uprareports">UPRA Reports</h1>
            <h2 class="bienvenidosusuario"><?php echo $department['DepartmentName'] ?></h2>
            <h2 class="tablaheader">Tabla 2.5: Otros logros alcanzados por Objetivo y Actividad en la Meta 2</h2>
            <h2 class="tablaheader"> Editar Informaci&oacute;n en la Tabla 2.5</h2>
        </header>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" style='display: none;'>#</th>
                <th scope="col">2.1&nbsp;Desarrollar&nbsp;y&nbsp;apoyar&nbsp;la divulgación&nbsp;de&nbsp;investigaciones&nbsp;científicas y proyectos de&nbsp;creación en&nbsp;conferencias, foros, revistas arbitradas y publicaciones aplicables.</th>
                <th scope="col">2.2&nbsp;Propiciar&nbsp;alianzas y acuerdos&nbsp;de&nbsp;colaboración&nbsp;entre los&nbsp;investigadores y&nbsp;creadores de&nbsp;UPRA y&nbsp;otras universidades e instituciones.</th>
                <th scope="col">2.3 Apoyar proyectos de investigación&nbsp;y&nbsp;creación dirigidos a&nbsp;la captación de fondos.</th>
                <th scope="col">2.4&nbsp;Propiciar&nbsp;la&nbsp;investigación&nbsp;estudiantil&nbsp;y&nbsp;las actividades de creación estudiantil bajo la mentoría de los profesores.</th>
                <th scope="col">2.5 Fomentar una cultura de avalúo en&nbsp;la&nbsp;investigación y creación.</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Establish a database connection
            include 'db_info.php';
            
            // Fetch data from the database
            $sql = "SELECT * FROM table25";
            $result = $conn->query($sql);
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='display: none;'>" . $row['table25ID'] . "</td>";
                echo "<td>" . $row['field1'] . "</td>";
                echo "<td>" . $row['field2'] . "</td>";
                echo "<td>" . $row['field3'] . "</td>";
                echo "<td>" . $row['field4'] . "</td>";
                echo "<td>" . $row['field5'] . "</td>";
                echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                echo "<td><a class='delete-btn' href='../meta-2/tabla2.5_delete.php?id=" . $row['table25ID'] . "'>Borrar</a></td>";
                echo "</tr>";
            }
            // Close connection
            $conn->close();
            ?>
            </tbody>
        </table>
                <div class="formbold-main-wrapperDept">
            <a class="underline-button" href="tabla2.5.php">Volver</a>
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
