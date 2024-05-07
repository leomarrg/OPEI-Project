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

    <title>Contact Form #2 - Page 1</title>
</head>
<body>
    <header></header>
       <!-- Dropdown list -->
<div class="formbold-main-wrapperDept">
    <a class="underline-button" href="tabla3.2.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 3.2 Actividades departamentales para promover el vínculo afectivo con la Institución</h6>       
        <table class="table">
        <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Título&nbsp;de&nbsp;la&nbsp;actividad</th>
                <th scope="col">Tipo de actividad</th>
                <th scope="col">Fecha</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
            <?php
            // Establish a database connection
            $servername = "localhost";
            //$username = "leomar";
            //$password = "italia101pr";
            //$dbname = "opei";
            $username = "leomarrg";
            $password = "1234";
            $dbname = "opei-database";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the database
            $sql = "SELECT * FROM table32a";
            $result = $conn->query($sql);

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['table32aID'] . "</td>";
                echo "<td><input type='text' id='field1_" . $row['table32aID'] . "' value='" . $row['field1'] . "'></td>";
                echo "<td><input type='text' id='field2_" . $row['table32aID'] . "' value='" . $row['field2'] . "'></td>";
                echo "<td><input type='text' id='field3_" . $row['table32aID'] . "' value='" . $row['field3'] . "'></td>";
                echo "<td><a href='javascript:void(0);' onclick='updateTable32aRow(" . $row['table32aID'] . ")'>Update</a></td>";
                echo "<td><a href='tabla3.2_delete.php?id=" . $row['table32aID'] . "'>Borrar</a></td>";
                echo "</tr>";
            }
            // Close connection
            $conn->close();
        ?>
            </tbody>
        </table>
    </div>
  </div>

    
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
</body>
</html>
