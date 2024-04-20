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
      <h2 class="metaheader">Meta 5 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
    </header>
<!--Table 5.1-->
      <h2>Table 5.1</h2>
      <?php
      include 'db_info.php';
      
      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionA']) && $_GET['actionA'] == 'delete' && isset($_GET['idA'])) {
      $id = $_GET['idA'];
      $sql = "DELETE FROM table51 WHERE table51ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

      // SQL query to retrieve data from table51 based on department and year
      $sql = "SELECT * FROM table51 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Título&nbsp;de&nbsp;la&nbsp;Actividad</th>
                      <th scope='col'>Clasificación</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Lugar</th>
                      <th scope='col'>Cantidad&nbsp;de&nbsp;participantes</th>
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
                      <td><a href='?actionA=delete&idA=" . $row["table51ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                      <th scope='col'>Clasificación</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Lugar</th>
                      <th scope='col'>Cantidad&nbsp;de&nbsp;participantes</th>
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
      <!--Table 5.2-->
      <h2>Table 5.2</h2>
      <?php
        include 'db_info.php';

        $department = $_GET['department'];
        $year = $_GET['year'];

        // Check if the delete button was clicked
    if (isset($_GET['actionB']) && $_GET['actionB'] == 'delete' && isset($_GET['idB'])) {
      $id = $_GET['idB'];
      $sql = "DELETE FROM table52 WHERE table52ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

        // SQL query to retrieve data from table52 based on department and year
        $sql = "SELECT * FROM table52 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table' style='margin: 0 auto;'>
                    <thead>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Iniciativas</th>
                        <th scope='col'>Fondos&nbsp;recaudados</th>
                        <th scope='col'>Comentario&nbsp;(opcional)</th>
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
                        <td><a href='#'>Editar</a></td>
                        <td><a href='?actionB=delete&idB=" . $row["table52ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                        <th scope='col'>Iniciativas</th>
                        <th scope='col'>Fondos&nbsp;recaudados</th>
                        <th scope='col'>Comentario&nbsp;(opcional)</th>
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
      <!--Table 5.3-->
      <h2>Table 5.3</h2>
      <?php
       include 'db_info.php';

       $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionC']) && $_GET['actionC'] == 'delete' && isset($_GET['idC'])) {
      $id = $_GET['idC'];
      $sql = "DELETE FROM table53 WHERE table53ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

      // SQL query to retrieve data from table53 based on department and year
      $sql = "SELECT * FROM table53 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Nombre&nbsp;de&nbsp;Estudiante</th>
                      <th scope='col'> Iniciativa/Proyecto&nbsp;de&nbsp;Innovación&nbsp;o&nbsp;Emprendimiento</th>
                      <th scope='col'>Describa&nbsp;brevemente</th>
                      <th scope='col'>Año&nbsp;de&nbsp;Creación</th>
                      <th scope='col'>Dirección&nbsp;Física&nbsp;de&nbsp;la&nbsp;empresa&nbsp;o&nbsp;enlace&nbsp;virtual&nbsp;del&nbsp;proyecto</th>
                      <th scope='col'>Tipo&nbsp;de&nbsp;Empresa</th>
                      <th scope='col'>Comentarios</th>
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
                      <td>" . $row["field6"]. "</td>
                      <td>" . $row["field7"]. "</td>
                      <td><a href='#'>Editar</a></td>
                      <td><a href='?actionC=delete&idC=" . $row["table53ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                      <th scope='col'>Nombre&nbsp;de&nbsp;Estudiante</th>
                      <th scope='col'> Iniciativa/Proyecto&nbsp;de&nbsp;Innovación&nbsp;o&nbsp;Emprendimiento</th>
                      <th scope='col'>Describa&nbsp;brevemente</th>
                      <th scope='col'>Año&nbsp;de&nbsp;Creación</th>
                      <th scope='col'>Dirección&nbsp;Física&nbsp;de&nbsp;la&nbsp;empresa&nbsp;o&nbsp;enlace&nbsp;virtual&nbsp;del&nbsp;proyecto</th>
                      <th scope='col'>Tipo&nbsp;de&nbsp;Empresa</th>
                      <th scope='col'>Comentarios</th>
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
      <!--Table 5.4-->
      <h2>Table 5.4</h2>
      <?php
          include 'db_info.php';

          $department = $_GET['department'];
          $year = $_GET['year'];

          // Check if the delete button was clicked
          if (isset($_GET['actionD']) && $_GET['actionD'] == 'delete' && isset($_GET['idD'])) {
            $id = $_GET['idD'];
            $sql = "DELETE FROM table54 WHERE table54ID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            
            
        }

          // SQL query to retrieve data from table54 based on department and year
          $sql = "SELECT * FROM table54 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // Output data of each row
              echo "<table class='table' style='margin: 0 auto;'>
                      <thead>
                        <tr>
                          <th scope='col'>#</th>
                          <th scope='col'>5.1 Incrementar las fuentes internas y externa para generar nuevos ingresos y alcanzar las metas propuestas de sustentabilidad financiera</th>
                          <th scope='col'>5.2 Desarrollar un ecosistema de empresarismo, innovación y emprendimiento a través de cursos, actividades extracurriculares, centros de apoyos, alianzas, investigaciones y trabajos con asociaciones estudiantiles, entre otros, con el fin de expandir la mentalidad emprendedora</th>
                          <th scope='col'>5.3 Fomentar la internacionalización a través de acuerdos de colaboración entre universidades locales y del exterior</th>
                          <th scope='col'>5.4 Fortalecer los recursos humanos y tecnológicos de las oficinas de apoyo administrativo y de servicio para agilizar sus procesos internos</th>
                          <th scope='col'>5.5 Propiciar el mejoramiento continuo de las capacidades, competencias y destrezas del personal docente y no docente</th>
                          <th scope='col'>5.6 Promover una cultura de avalúo de renovación institucional y sustentabilidad</th>
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
                          <td>" . $row["field6"]. "</td>
                          <td><a href='#'>Editar</a></td>
                          <td><a href='?actionD=delete&idD=" . $row["table54ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                <th scope='col'>5.1 Incrementar las fuentes internas y externa para generar nuevos ingresos y alcanzar las metas propuestas de sustentabilidad financiera</th>
                <th scope='col'>5.2 Desarrollar un ecosistema de empresarismo, innovación y emprendimiento a través de cursos, actividades extracurriculares, centros de apoyos, alianzas, investigaciones y trabajos con asociaciones estudiantiles, entre otros, con el fin de expandir la mentalidad emprendedora</th>
                <th scope='col'>5.3 Fomentar la internacionalización a través de acuerdos de colaboración entre universidades locales y del exterior</th>
                <th scope='col'>5.4 Fortalecer los recursos humanos y tecnológicos de las oficinas de apoyo administrativo y de servicio para agilizar sus procesos internos</th>
                <th scope='col'>5.5 Propiciar el mejoramiento continuo de las capacidades, competencias y destrezas del personal docente y no docente</th>
                <th scope='col'>5.6 Promover una cultura de avalúo de renovación institucional y sustentabilidad</th>
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
