<!DOCTYPE html>
<html lang="en">
<head>
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
    <!-- Script for datepicker -->
    <script>
    $(document).ready(function() {
        editRow43();
    });
    </script>
</head>
<body>
   <header></header>

       <!-- Dropdown list -->
<div class="formbold-main-wrapperDept">
    <a class="underline-button" href="tabla4.3.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
  <div class="formbold-form-wrapper-edit">
      <h6>Tabla 4.3 Otros logros alcanzados por Objetivo y Actividad en la Meta 4</h6>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">4.1&nbsp;Promover&nbsp;la&nbsp;participación en actividades sociales y culturales con la comunidad externa e interna</th>
          <th scope="col">4.2&nbsp;Adoptar&nbsp;estrategias de comunicación para fortalecer la imagen institucional</th>
          <th scope="col">4.3&nbsp;Integrar&nbsp;la&nbsp;comunidad universitaria en la prestación de servicios a la comunidad externa</th>
          <th scope="col">4.4&nbsp;Posicionar&nbsp;la&nbsp;DECEP&nbsp;como&nbsp;centro&nbsp;de&nbsp;educación continua de excelencia para atender las necesidades de adiestramiento de la industria, el comercio y el gobierno, entre otros</th>
          <th scope="col">4.5&nbsp;Propiciar&nbsp;una&nbsp;cultura&nbsp;de avalúo en las actividades académicas, sociales y culturales</th>
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Establish a database connection
        include 'db_info.php';

        // Fetch data from the database
        $sql = "SELECT * FROM table43";
        $result = $conn->query($sql);

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['table43ID'] . "</td>";
            echo "<td>" . $row['field1'] . "</td>";
            echo "<td>" . $row['field2'] . "</td>";
            echo "<td>" . $row['field3'] . "</td>";
            echo "<td>" . $row['field4'] . "</td>";
            echo "<td>" . $row['field5'] . "</td>";
            echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
            echo "<td><a href='../meta-4/tabla4.3_delete.php?id=" . $row['table43ID'] . "'>Borrar</a></td>";
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
