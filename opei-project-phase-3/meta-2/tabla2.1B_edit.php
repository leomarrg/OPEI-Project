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
    <a class="underline-button" href="../meta-2/tabla2.1B.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 2.1 B Actividades de creación divulgadas llevadas a cabo por la facultad</h6>
      <form action="https://formbold.com/s/FORM_ID" method="POST">
        
        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Profesor</th>
              <th scope="col">Título&nbsp;de&nbsp;la&nbsp;actividad</th>
              <th scope="col">Fecha</th>
              <th scope="col">Clasificación&nbsp;de&nbsp;actividad&nbsp;de&nbsp;creación&nbsp;y&nbsp;divulgación</th>
              <th scope="col">Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
              <th scope="col">Lugar&nbsp;de&nbsp;divulgación</th>
              <th scope="col">Editar</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              // Establish a database connection
              include 'db_info.php';

              // Fetch data from the database
              $sql = "SELECT * FROM table21b";
              $result = $conn->query($sql);

              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['table21bID'] . "</td>";
                  echo "<td><input type='text' id='field1_" . $row['table21bID'] . "' value='" . $row['field1'] . "'></td>";
                  echo "<td><input type='text' id='field2_" . $row['table21bID'] . "' value='" . $row['field2'] . "'></td>";
                  echo "<td><input type='text' id='field3_" . $row['table21bID'] . "' value='" . $row['field3'] . "'></td>";
                  echo "<td><input type='text' id='field4_" . $row['table21bID'] . "' value='" . $row['field4'] . "'></td>";
                  echo "<td><input type='text' id='field5_" . $row['table21bID'] . "' value='" . $row['field5'] . "'></td>";
                  echo "<td><input type='text' id='field6_" . $row['table21bID'] . "' value='" . $row['field6'] . "'></td>";
                  echo "<td><a href='javascript:void(0);' onclick='updateTable21bRow(" . $row['table21bID'] . ")'>Update</a></td>";
                  echo "<td><a href='delete.php?id=" . $row['table21bID'] . "'>Borrar</a></td>";
                  echo "</tr>";
              }
              // Close connection
              $conn->close();
          ?>
            </tr>
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
