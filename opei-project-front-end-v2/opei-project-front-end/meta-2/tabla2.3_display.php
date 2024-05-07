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

    <script>
      $(document).ready(function() {
        editRow23();
      });
    </script>

</head>
<body>
    <header></header>

       <!-- Dropdown list -->
<div class="formbold-main-wrapperDept">
    <a class="underline-button" href="tabla2.3.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 2.3 Proyectos de Investigación y propuestas. Solo incluya las propuestas sometidas de fondos externos.
        Aquellas que tienen fondos asignados, favor de completar la tabla administrativa correspondiente a Finanzas</h6>        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Título&nbsp;del&nbsp;proyecto&nbsp;de&nbsp;fondos&nbsp;externos</th>
              <th scope="col">Agencia</th>
              <th scope="col">Estatus</th>
              <th scope="col">Total de fondos</th>
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
              $sql = "SELECT * FROM table23";
              $result = $conn->query($sql);

              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['table23ID'] . "</td>";
                  echo "<td>" . $row['field1'] . "</td>";
                  echo "<td>" . $row['field2'] . "</td>";
                  echo "<td>" . $row['field3'] . "</td>";
                  echo "<td>" . $row['field4'] . "</td>";
                  echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                  echo "<td><a href='../meta-2/tabla2.3_delete.php?id=" . $row['table23ID'] . "'>Borrar</a></td>";
                  echo "</tr>";

              }
              // Close connection
              $conn->close();
            ?>
            </tr>
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
