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
      <a href='Website.html' class="backmainmenu"><h1>UPRA Reports</h1></a>
      <h2 class="metaheader" id="departmentHeader">Nombre del departamento</h2>
      <h2 class="metaheader">Meta 2 <span id="year"></span></h2>
    </header>
<!--Table 2.1A-->
      <h2>Table 2.1A</h2>
      <?php
      session_start();
      include 'db_info.php';

      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionA']) && $_GET['actionA'] == 'delete' && isset($_GET['idA'])) {
      $id = $_GET['idA'];
      $sql = "DELETE FROM table21a WHERE table21aID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

      // SQL query to retrieve data from table21a based on department and year
      $sql = "SELECT * FROM table21a WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Profesor</th>
                      <th scope='col' colspan='2'>Título&nbsp;de&nbsp;la&nbsp;actividad</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Publicada</th>
                      <th scope='col'>Clasificación&nbsp;de&nbsp;la&nbsp;publicación</th>
                      <th scope='col'>*Tipo&nbsp;de&nbsp;Publicación</th>
                      <th scope='col'>Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
                      <th scope='col'>Entidad&nbsp;que&nbsp;publica</th>
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
                      <td>" . $row["field6"]. "</td>
                      <td>" . $row["field7"]. "</td>
                      <td>" . $row["field8"]. "</td>
                      <td><a href='#'>Editar</a></td>
                      <td><a href='?actionA=delete&idA=" . $row["table21aID"] . "&department=$department&year=$year'>Borrar</a></td>
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
            <th scope='col'>Profesor</th>
            <th scope='col' colspan='2'>Título&nbsp;de&nbsp;la&nbsp;actividad</th>
            <th scope='col'>Fecha</th>
            <th scope='col'>Publicada</th>
            <th scope='col'>Clasificación&nbsp;de&nbsp;la&nbsp;publicación</th>
            <th scope='col'>*Tipo&nbsp;de&nbsp;Publicación</th>
            <th scope='col'>Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
            <th scope='col'>Entidad&nbsp;que&nbsp;publica</th>
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
      <!--Table 2.1B-->
      <h2>Table 2.1B</h2>
      <?php
      include 'db_info.php';
    
      $department = $_GET['department'];
      $year = $_GET['year'];
      
      // Check if the delete button was clicked
    if (isset($_GET['actionB']) && $_GET['actionB'] == 'delete' && isset($_GET['idB'])) {
      $id = $_GET['idB'];
      $sql = "DELETE FROM table21b WHERE table21bID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

      // SQL query to retrieve data from table21b based on department and year
      $sql = "SELECT * FROM table21b WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";
      
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Profesor</th>
                      <th scope='col' colspan='2'>Título&nbsp;de&nbsp;la&nbsp;actividad</th>
                      <th scope='col'>Estrategia&nbsp;o&nbsp;instrumento&nbsp;de&nbsp;avalúo</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Clasificación&nbsp;de&nbsp;actividad&nbsp;de&nbsp;creación&nbsp;y&nbsp;divulgación</th>
                      <th scope='col'>Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
                      <th scope='col'>Lugar&nbsp;de&nbsp;divulgación</th>
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
                      <td>" . $row["field6"]. "</td>
                      <td>" . $row["field7"]. "</td>
                      <td><a href='#'>Editar</a></td>
                      <td><a href='?actionB=delete&idB=" . $row["table21bID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                      <th scope='col'>Profesor</th>
                      <th scope='col' colspan='2'>Título&nbsp;de&nbsp;la&nbsp;actividad</th>
                      <th scope='col'>Estrategia&nbsp;o&nbsp;instrumento&nbsp;de&nbsp;avalúo</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Clasificación&nbsp;de&nbsp;actividad&nbsp;de&nbsp;creación&nbsp;y&nbsp;divulgación</th>
                      <th scope='col'>Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
                      <th scope='col'>Lugar&nbsp;de&nbsp;divulgación</th>
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
      <!--Table 2.2-->
      <h2>Table 2.2</h2>
      <?php
       include 'db_info.php';

      $department = $_GET['department'];
      $year = $_GET['year'];
      
      // Check if the delete button was clicked
    if (isset($_GET['actionC']) && $_GET['actionC'] == 'delete' && isset($_GET['idC'])) {
      $id = $_GET['idC'];
      $sql = "DELETE FROM table22 WHERE table22ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }
      // SQL query to retrieve data from table22 based on department and year
      $sql = "SELECT * FROM table22 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";
      
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Título&nbsp;del&nbsp;convenio&nbsp;o&nbsp;alianza*</th>
                      <th scope='col' colspan='2'>Agencia&nbsp;o&nbsp;institución</th>
                      <th scope='col'>Estatus</th>
                      <th scope='col'>Total&nbsp;de&nbsp;fondos</th>
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
                      <td><a href='#'>Editar</a></td>
                      <td><a href='?actionC=delete&idC=" . $row["table22ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                      <th scope='col'>Título&nbsp;del&nbsp;convenio&nbsp;o&nbsp;alianza*</th>
                      <th scope='col' colspan='2'>Agencia&nbsp;o&nbsp;institución</th>
                      <th scope='col'>Estatus</th>
                      <th scope='col'>Total&nbsp;de&nbsp;fondos</th>
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
      <!--Table 2.3-->
      <h2>Table 2.3</h2>
      <?php
       include 'db_info.php';

       $department = $_GET['department'];
        $year = $_GET['year'];

        // Check if the delete button was clicked
    if (isset($_GET['actionD']) && $_GET['actionD'] == 'delete' && isset($_GET['idD'])) {
      $id = $_GET['idD'];
      $sql = "DELETE FROM table23 WHERE table23ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

        // SQL query to retrieve data from table23 based on department and year
        $sql = "SELECT * FROM table23 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table' style='margin: 0 auto;'>
                    <thead>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Título&nbsp;del&nbsp;proyecto&nbsp;de&nbsp;fondos&nbsp;externos</th>
                        <th scope='col' colspan='2'>Agencia</th>
                        <th scope='col'>Estatus</th>
                        <th scope='col'>Total de fondos</th>
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
                        <td><a href='#'>Editar</a></td>
                        <td><a href='?actionD=delete&idD=" . $row["table23ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                        <th scope='col'>Título&nbsp;del&nbsp;proyecto&nbsp;de&nbsp;fondos&nbsp;externos</th>
                        <th scope='col' colspan='2'>Agencia</th>
                        <th scope='col'>Estatus</th>
                        <th scope='col'>Total de fondos</th>
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
      <!--Table 2.4-->
      <h2>Table 2.4</h2>
      <?php
      include 'db_info.php';

      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionE']) && $_GET['actionE'] == 'delete' && isset($_GET['idE'])) {
      $id = $_GET['idE'];
      $sql = "DELETE FROM table24 WHERE table24ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }
      
      // SQL query to retrieve data from table24 based on department and year
      $sql = "SELECT * FROM table24 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";
      
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Título&nbsp;del&nbsp;trabajo&nbsp;de&nbsp;investigación&nbsp;o&nbsp;creación</th>
                      <th scope='col' colspan='2'>Clasificación</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Profesor&nbsp;(mentor&nbsp;o&nbsp;supervisor)</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;investigadores&nbsp;por&nbsp;proyecto</th>
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
                      <td><a href='?actionE=delete&idE=" . $row["table24ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                      <th scope='col'>Título&nbsp;del&nbsp;trabajo&nbsp;de&nbsp;investigación&nbsp;o&nbsp;creación</th>
                      <th scope='col' colspan='2'>Clasificación</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Profesor&nbsp;(mentor&nbsp;o&nbsp;supervisor)</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;investigadores&nbsp;por&nbsp;proyecto</th>
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
      <!--Table 2.5-->
      <h2>Table 2.5</h2>
      <?php
      include 'db_info.php';

        $department = $_GET['department'];
        $year = $_GET['year'];

        // Check if the delete button was clicked
    if (isset($_GET['actionF']) && $_GET['actionF'] == 'delete' && isset($_GET['idF'])) {
      $id = $_GET['idF'];
      $sql = "DELETE FROM table25 WHERE table25ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

        // SQL query to retrieve data from table25 based on department and year
        $sql = "SELECT * FROM table25 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table' style='margin: 0 auto;'>
                    <thead>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>2.1&nbsp;Desarrollar&nbsp;y&nbsp;apoyar&nbsp;la&nbsp;divulgación&nbsp;de&nbsp;investigaciones&nbsp;científicas y proyectos de&nbsp;creación en&nbsp;conferencias, foros, revistas arbitradas y publicaciones aplicables.</th>
                        <th scope='col' colspan='2'>2.2&nbsp;Propiciar&nbsp;alianzas&nbsp;y acuerdos&nbsp;de&nbsp;colaboración&nbsp;entre los&nbsp;investigadores y&nbsp;creadores de&nbsp;UPRA y&nbsp;otras universidades e instituciones.</th>
                        <th scope='col'>2.3 Apoyar proyectos de investigación&nbsp;y&nbsp;creación dirigidos a&nbsp;la captación de fondos.</th>
                        <th scope='col'>2.4&nbsp;Propiciar&nbsp;la&nbsp;investigación&nbsp;estudiantil&nbsp;y&nbsp;las actividades de creación estudiantil bajo la mentoría de los profesores.</th>
                        <th scope='col'>2.5 Fomentar una cultura de avalúo en&nbsp;la&nbsp;investigación y creación.</th>
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
                        <td><a href='?actionF=delete&idF=" . $row["table25ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                        <th scope='col'>2.1&nbsp;Desarrollar&nbsp;y&nbsp;apoyar&nbsp;la&nbsp;divulgación&nbsp;de&nbsp;investigaciones&nbsp;científicas y proyectos de&nbsp;creación en&nbsp;conferencias, foros, revistas arbitradas y publicaciones aplicables.</th>
                        <th scope='col' colspan='2'>2.2&nbsp;Propiciar&nbsp;alianzas&nbsp;y acuerdos&nbsp;de&nbsp;colaboración&nbsp;entre los&nbsp;investigadores y&nbsp;creadores de&nbsp;UPRA y&nbsp;otras universidades e instituciones.</th>
                        <th scope='col'>2.3 Apoyar proyectos de investigación&nbsp;y&nbsp;creación dirigidos a&nbsp;la captación de fondos.</th>
                        <th scope='col'>2.4&nbsp;Propiciar&nbsp;la&nbsp;investigación&nbsp;estudiantil&nbsp;y&nbsp;las actividades de creación estudiantil bajo la mentoría de los profesores.</th>
                        <th scope='col'>2.5 Fomentar una cultura de avalúo en&nbsp;la&nbsp;investigación y creación.</th>
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
      <div class="table-container">
        <a href="#" class="table-option">Exportar Excel</a>
    </div>
    <br> <br> <br>
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
    <script src="js/mainmenu.js"></script>
    <script src="js/metapage.js"></script>
</body>
</html>
