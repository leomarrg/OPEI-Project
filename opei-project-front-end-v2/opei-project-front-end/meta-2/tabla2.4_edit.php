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
    <a class="underline-button" href="tabla2.4.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 2.4 Proyectos estudiantiles de investigación y creación*</h6>
      <form action="https://formbold.com/s/FORM_ID" method="POST">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Título&nbsp;del&nbsp;trabajo&nbsp;de&nbsp;investigación&nbsp;o&nbsp;creación</th>
              <th scope="col" colspan="2">Clasificación</th>
              <th scope="col">Fecha</th>
              <th scope="col">Profesor&nbsp;(mentor&nbsp;o&nbsp;supervisor)</th>
              <th scope="col">Número&nbsp;de&nbsp;estudiantes&nbsp;investigadores&nbsp;por&nbsp;proyecto</th>
              <th scope="col">Editar</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Establish a database connection
            include 'db_info.php';

            // Fetch data from the database
            $sql = "SELECT * FROM table24";
            $result = $conn->query($sql);

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['table24ID'] . "</td>";
                echo "<td><input type='text' id='field1_" . $row['table24ID'] . "' value='" . $row['field1'] . "'></td>";
                echo "<td><input type='text' id='field2_" . $row['table24ID'] . "' value='" . $row['field2'] . "'></td>";
                echo "<td><input type='text' id='field3_" . $row['table24ID'] . "' value='" . $row['field3'] . "'></td>";
                echo "<td><input type='text' id='field4_" . $row['table24ID'] . "' value='" . $row['field4'] . "'></td>";
                echo "<td><input type='text' id='field5_" . $row['table24ID'] . "' value='" . $row['field5'] . "'></td>";
                echo "<td><a href='javascript:void(0);' onclick='updateTable24Row(" . $row['table24ID'] . ")'>Update</a></td>";
                echo "<td><a href='delete.php?id=" . $row['table24ID'] . "'>Borrar</a></td>";
                echo "</tr>";
            }
            // Close connection
            $conn->close();
        ?>
          </tbody>
      </table>

        <!-- Submit button -->
        <button class="formbold-btn">Submit</button>
      </form>
    </div>
  </div>

    
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
</body>
</html>
