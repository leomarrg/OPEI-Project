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
    <!-- Script for datepicker -->
    <script>
      $(document).ready(function() {
          editRow42();
      });
    </script>
</head>
<body>
   <header></header>

       <!-- Dropdown list -->
<div class="formbold-main-wrapperDept">
    <a class="underline-button" href="tabla4.2.html">Volver</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 4.2 Cursos ofrecidos a la comunidad externa</h6>
      </table>        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Título del curso</th>
              <th scope="col">Número de estudiantes matriculados en cursos o programas en Educación Continua Primer Semestre</th>
              <th scope="col">Número de estudiantes matriculados en cursos o programas en Educación Continua Segundo Semestre</th>
              <th scope="col">Número de estudiantes matriculados en cursos o programas en Cerfificaciones Profesionales Primer Semestre</th>
              <th scope="col">Número de estudiantes matriculados en cursos o programas en Cerfificaciones Profesionales Primer Semestre</th>
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
            $sql = "SELECT * FROM table42";
            $result = $conn->query($sql);
  
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['table42ID'] . "</td>";
                echo "<td>" . $row['field1'] . "</td>";
                echo "<td>" . $row['field2'] . "</td>";
                echo "<td>" . $row['field3'] . "</td>";
                echo "<td>" . $row['field4'] . "</td>";
                echo "<td>" . $row['field5'] . "</td>";
                echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                echo "<td><a href='../meta-4/tabla4.2_delete.php?id=" . $row['table42ID'] . "'>Borrar</a></td>";
                echo "</tr>";
            }
            // Close connection
            $conn->close();
        ?>
          </tbody>
      </table>
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