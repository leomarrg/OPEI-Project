<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Contact Form #2 - Page 1</title>
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
        <?
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
        $sql = "SELECT * FROM table43";
        $result = $conn->query($sql);

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['table43ID'] . "</td>";
            echo "<td><input type='text' id='field1_" . $row['table43ID'] . "' value='" . $row['field1'] . "'></td>";
            echo "<td><input type='text' id='field2_" . $row['table43ID'] . "' value='" . $row['field2'] . "'></td>";
            echo "<td><input type='text' id='field3_" . $row['table43ID'] . "' value='" . $row['field3'] . "'></td>";
            echo "<td><input type='text' id='field2_" . $row['table43ID'] . "' value='" . $row['field2'] . "'></td>";
            echo "<td><input type='text' id='field3_" . $row['table43ID'] . "' value='" . $row['field3'] . "'></td>";
            echo "<td><a href='javascript:void(0);' onclick='updateTable43Row(" . $row['table43ID'] . ")'>Update</a></td>";
            echo "<td><a href='delete.php?id=" . $row['table43ID'] . "'>Borrar</a></td>";
            echo "</tr>";
        }
        // Close connection
        $conn->close();
    ?>
      </tbody>
  </table>

      <!-- Submit button -->
      <button class="formbold-btn">
          Submit
      </button>
  </div>
</div>

    
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
