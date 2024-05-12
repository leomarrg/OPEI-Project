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
    <!-- Add jQuery UI library -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>UPRA Reports Tabla 5-2 Editar</title>
            <!-- Script for datepicker -->
      <script>
        $(document).ready(function() {
            editRow52();
        });
    </script>
</head>
<body>
        <header> 
            <h1 class="uprareports">UPRA Reports</h1>
            <h2 class="bienvenidosusuario"><?php echo $department['DepartmentName'] ?></h2>
            <h2 class="tablaheader">Tabla 5.2: Iniciativas para recaudación de fondos de su departamento</h2>
            <h2 class="tablaheader"> Editar Informaci&oacute;n en la Tabla 5.2</h2>
        </header>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
        <table class="table">
            <thead>
              <tr>
                <th scope="col" style='display: none;'>#</th>
                <th scope="col">Iniciativas</th>
                <th scope="col">Fondos&nbsp;recaudados</th>
                <th scope="col">Comentario&nbsp;(opcional)</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Establish a database connection
              include 'db_info.php';
      
              // Fetch data from the database
              $sql = "SELECT * FROM table52";
              $result = $conn->query($sql);
      
              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td style='display: none;'>" . $row['table52ID'] . "</td>";
                  echo "<td>" . $row['field1'] . "</td>";
                  echo "<td>" . $row['field2'] . "</td>";
                  echo "<td>" . $row['field3'] . "</td>";
                  echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                  echo "<td><a class='delete-btn' href='../meta-5/tabla5.2_delete.php?id=" . $row['table52ID'] . "'>Borrar</a></td>";
                  echo "</tr>";
              }
              // Close connection
              $conn->close();
          ?>
            </tbody>
        </table>
        </form>
                <div class="formbold-main-wrapperDept">
            <a class="underline-button" href="tabla5.2.php">Volver</a>
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
