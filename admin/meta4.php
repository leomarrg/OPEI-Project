<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPRA Reports</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
    <header>
      <?php $year = $_GET['year']; ?>
      <a href='Website.html' class="backmainmenu"><h1>UPRA Reports</h1></a>
      <h2 class="metaheader" id="departmentHeader">Nombre del departamento</h2>
      <h2 class="metaheader">Meta 4 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
    </header>
      <!--Table 4.1-->
      <h2>Table 4.1</h2>
      <?php
        session_start();
        include 'db_info.php';

        $department = $_GET['department'];
        $year = $_GET['year'];

        // Check if the delete button was clicked
        if (isset($_GET['actionA']) && $_GET['actionA'] == 'delete' && isset($_GET['idA'])) {
          $id = $_GET['idA'];
          $sql = "DELETE FROM table41 WHERE table41ID = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $stmt->close();
          
          
      }

        // SQL query to retrieve data from table41 based on department and year
        $sql = "SELECT * FROM table41 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table' style='margin: 0 auto;'>
                    <thead>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Título&nbsp;de&nbsp;la&nbsp;Actividad</th>
                        <th scope='col' colspan='2'>Clasificación</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Coordinador&nbsp;de&nbsp;la&nbsp;Actividad</th>
                        <th scope='col'>Número&nbsp;de&nbsp;participantes</th>
                        <th scope='col'>Editar</th>
                        <th scope='col'>Borrar</th>
                      </tr>
                    </thead>
                    <tbody>";

            // Initialize counter
            $counter = 1;

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'>" . $counter . "</th>
                        <td>" . $row["field1"]. "</td>
                        <td colspan='2'>" . $row["field2"]. "</td>
                        <td>" . $row["field3"]. "</td>
                        <td>" . $row["field4"]. "</td>
                        <td>" . $row["field5"]. "</td>
                        <td><a href='#'>Editar</a></td>
                        <td><a href='?actionA=delete&idA=" . $row["table41ID"] . "&department=$department&year=$year'>Borrar</a></td>
                      </tr>";
                
                // Increment counter
                $counter++;
            }
            echo "</tbody></table>";
        } else {
          echo "<table class='table' style='margin: 0 auto;'>
                    <thead>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Título&nbsp;de&nbsp;la&nbsp;Actividad</th>
                        <th scope='col' colspan='2'>Clasificación</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Coordinador&nbsp;de&nbsp;la&nbsp;Actividad</th>
                        <th scope='col'>Número&nbsp;de&nbsp;participantes</th>
                        <th scope='col'>Editar</th>
                        <th scope='col'>Borrar</th>
                      </tr>
                    </thead>
                    </table>";
          echo "<h3 style='margin: 0 auto;text-align: center;
          padding: 10px;'>0 RESULTADOS</h3>";
        }
      ?>
      <br>
      <!--Table 4.2-->
      <h2>Table 4.2</h2>
      <?php
      include 'db_info.php';

      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionB']) && $_GET['actionB'] == 'delete' && isset($_GET['idB'])) {
      $id = $_GET['idB'];
      $sql = "DELETE FROM table42 WHERE table42ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

      // SQL query to retrieve data from table42 based on department and year
      $sql = "SELECT * FROM table42 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Título del curso</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Educación Continua Primer Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Educación Continua Segundo Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Certificaciones Profesionales Primer Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Certificaciones Profesionales Segundo Semestre</th>
                      <th scope='col'>Editar</th>
                      <th scope='col'>Borrar</th>
                    </tr>
                  </thead>
                  <tbody>";

          // Initialize counter
          $counter = 1;

          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <th scope='row'>" . $counter . "</th>
                      <td>" . $row["field1"]. "</td>
                      <td>" . $row["field2"]. "</td>
                      <td>" . $row["field3"]. "</td>
                      <td>" . $row["field4"]. "</td>
                      <td>" . $row["field5"]. "</td>
                      <td><a href='#'>Editar</a></td>
                      <td><a href='?actionB=delete&idB=" . $row["table42ID"] . "&department=$department&year=$year'>Borrar</a></td>
                    </tr>";
              
              // Increment counter
              $counter++;
          }
          echo "</tbody></table>";
      } else {
        echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Título del curso</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Educación Continua Primer Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Educación Continua Segundo Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Certificaciones Profesionales Primer Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Certificaciones Profesionales Segundo Semestre</th>
                      <th scope='col'>Editar</th>
                      <th scope='col'>Borrar</th>
                    </tr>
                  </thead>
                  </table>";
        echo "<h3 style='margin: 0 auto;text-align: center;
        padding: 10px;'>0 RESULTADOS</h3>";
      }
      ?>
      <br>
      <!--Table 4.3-->
      <h2>Table 4.3</h2>
      <?php
      include 'db_info.php';

      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionC']) && $_GET['actionC'] == 'delete' && isset($_GET['idC'])) {
      $id = $_GET['idC'];
      $sql = "DELETE FROM table43 WHERE table43ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

      // SQL query to retrieve data from table43 based on department and year
      $sql = "SELECT * FROM table43 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>4.1&nbsp;Promover&nbsp;la&nbsp;participación en actividades sociales y culturales con la comunidad externa e interna</th>
                      <th scope='col'>4.2&nbsp;Adoptar&nbsp;estrategias de comunicación para fortalecer la imagen institucional</th>
                      <th scope='col' colspan='2'>4.3&nbsp;Integrar&nbsp;la&nbsp;comunidad universitaria en la prestación de servicios a la comunidad externa</th>
                      <th scope='col'>4.4&nbsp;Posicionar&nbsp;la&nbsp;DECEP&nbsp;como&nbsp;centro&nbsp;de&nbsp;educación continua de excelencia para atender las necesidades de adiestramiento de la industria, el comercio y el gobierno, entre otros</th>
                      <th scope='col'>4.5&nbsp;Propiciar&nbsp;una&nbsp;cultura&nbsp;de avalúo en las actividades académicas, sociales y culturales</th>
                      <th scope='col'>Editar</th>
                      <th scope='col'>Borrar</th>
                    </tr>
                  </thead>
                  <tbody>";

          // Initialize counter
          $counter = 1;

          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <th scope='row'>" . $counter . "</th>
                      <td>" . $row["field1"]. "</td>
                      <td>" . $row["field2"]. "</td>
                      <td colspan='2'>" . $row["field3"]. "</td>
                      <td>" . $row["field4"]. "</td>
                      <td>" . $row["field5"]. "</td>
                      <td><a href='#'>Editar</a></td>
                      <td><a href='?actionC=delete&idC=" . $row["table43ID"] . "&department=$department&year=$year'>Borrar</a></td>
                    </tr>";
              
              // Increment counter
              $counter++;
          }
          echo "</tbody></table>";
      } else {
        echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>4.1&nbsp;Promover&nbsp;la&nbsp;participación en actividades sociales y culturales con la comunidad externa e interna</th>
                      <th scope='col'>4.2&nbsp;Adoptar&nbsp;estrategias de comunicación para fortalecer la imagen institucional</th>
                      <th scope='col' colspan='2'>4.3&nbsp;Integrar&nbsp;la&nbsp;comunidad universitaria en la prestación de servicios a la comunidad externa</th>
                      <th scope='col'>4.4&nbsp;Posicionar&nbsp;la&nbsp;DECEP&nbsp;como&nbsp;centro&nbsp;de&nbsp;educación continua de excelencia para atender las necesidades de adiestramiento de la industria, el comercio y el gobierno, entre otros</th>
                      <th scope='col'>4.5&nbsp;Propiciar&nbsp;una&nbsp;cultura&nbsp;de avalúo en las actividades académicas, sociales y culturales</th>
                      <th scope='col'>Editar</th>
                      <th scope='col'>Borrar</th>
                    </tr>
                  </thead>
                  </table>";
        echo "<h3 style='margin: 0 auto;text-align: center;
        padding: 10px;'>0 RESULTADOS</h3>";
      }
      ?>
      <br>
    <br> <br> <br>
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
    <script src="js/mainmenu.js"></script>
    <script src="js/metapage.js"></script>
</body>
</html>
