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
      <h2 class="metaheader">Meta 3 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
    </header>
<!--Table 3.1-->
      <h2>Table 3.1</h2>
      <?php
      session_start();
      include 'db_info.php';
      
      $department = $_GET['department'];
$year = $_GET['year'];

// Check if the delete button was clicked
if (isset($_GET['actionA']) && $_GET['actionA'] == 'delete' && isset($_GET['idA'])) {
  $id = $_GET['idA'];
  $sql = "DELETE FROM table31 WHERE table31ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
  
  
}
// SQL query to retrieve data from table31 based on department and year
$sql = "SELECT * FROM table31 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table class='table' style='margin: 0 auto;'>
            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Tipo&nbsp;de&nbsp;Reconocimiento</th>
                <th scope='col' colspan='2'>Cantidad&nbsp;de&nbsp;Estudiantes&nbsp;Reconocidos&nbsp;(Valor&nbsp;numérico)</th>
                <th scope='col'>Descripción&nbsp;del&nbsp;reconocimiento </th>
                <th scope='col'>Organismo&nbsp;que&nbsp;otorga&nbsp;el&nbsp;reconocimiento</th>
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
                <td><a href='?actionA=delete&idA=" . $row["table31ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                <th scope='col'>Tipo&nbsp;de&nbsp;Reconocimiento</th>
                <th scope='col' colspan='2'>Cantidad&nbsp;de&nbsp;Estudiantes&nbsp;Reconocidos&nbsp;(Valor&nbsp;numérico)</th>
                <th scope='col'>Descripción&nbsp;del&nbsp;reconocimiento </th>
                <th scope='col'>Organismo&nbsp;que&nbsp;otorga&nbsp;el&nbsp;reconocimiento</th>
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
      <!--Table 3.2A-->
      <h2>Table 3.2A</h2>
      <?php
      include 'db_info.php';
      
      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionB']) && $_GET['actionB'] == 'delete' && isset($_GET['idB'])) {
      $id = $_GET['idB'];
      $sql = "DELETE FROM table32a WHERE table32aID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }
      // SQL query to retrieve data from table32a based on department and year
      $sql = "SELECT * FROM table32a WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Tipo&nbsp;de&nbsp;Reconocimiento</th>
                      <th scope='col' colspan='2'>Cantidad&nbsp;de&nbsp;Estudiantes&nbsp;Reconocidos&nbsp;(Valor&nbsp;numérico)</th>
                      <th scope='col'>Descripción&nbsp;del&nbsp;reconocimiento </th>
                      <th scope='col'>Organismo&nbsp;que&nbsp;otorga&nbsp;el&nbsp;reconocimiento</th>
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
                      <td><a href='?actionB=delete&idB=" . $row["table32aID"] . "&department=$department&year=$year'>Borrar</a></td>
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
            <th scope='col'>Tipo&nbsp;de&nbsp;Reconocimiento</th>
            <th scope='col' colspan='2'>Cantidad&nbsp;de&nbsp;Estudiantes&nbsp;Reconocidos&nbsp;(Valor&nbsp;numérico)</th>
            <th scope='col'>Descripción&nbsp;del&nbsp;reconocimiento </th>
            <th scope='col'>Organismo&nbsp;que&nbsp;otorga&nbsp;el&nbsp;reconocimiento</th>
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
      <!--Table 3.2B-->
      <h2>Table 3.2B</h2>
      <?php
      include 'db_info.php';
      
      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
    if (isset($_GET['actionC']) && $_GET['actionC'] == 'delete' && isset($_GET['idC'])) {
      $id = $_GET['idC'];
      $sql = "DELETE FROM table32b WHERE table32bID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

      // SQL query to retrieve data from table32b based on department and year
      $sql = "SELECT * FROM table32b WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Nombre&nbsp;del&nbsp;Estudiante</th>
                      <th scope='col' colspan='2'>Programa&nbsp;académico&nbsp;del&nbsp;cual&nbsp;se&nbsp;graduó</th>
                      <th scope='col'>Lugar&nbsp;de&nbsp;Empleo</th>
                      <th scope='col'>Año&nbsp;de&nbsp;Graduación</th>
                      <th scope='col'>Trabajo&nbsp;actual&nbsp;relacionado&nbsp;al&nbsp;grado&nbsp;obtenido&nbsp;en&nbsp;UPRA</th>
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
                      <td colspan='2'>" . $row["field2"]. "</td>
                      <td>" . $row["field3"]. "</td>
                      <td>" . $row["field4"]. "</td>
                      <td>" . $row["field5"]. "</td>
                      <td>" . $row["field6"]. "</td>
                      <td><a href='#'>Editar</a></td>
                      <td><a href='?actionC=delete&idC=" . $row["table32bID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                      <th scope='col'>Nombre&nbsp;del&nbsp;Estudiante</th>
                      <th scope='col' colspan='2'>Programa&nbsp;académico&nbsp;del&nbsp;cual&nbsp;se&nbsp;graduó</th>
                      <th scope='col'>Lugar&nbsp;de&nbsp;Empleo</th>
                      <th scope='col'>Año&nbsp;de&nbsp;Graduación</th>
                      <th scope='col'>Trabajo&nbsp;actual&nbsp;relacionado&nbsp;al&nbsp;grado&nbsp;obtenido&nbsp;en&nbsp;UPRA</th>
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
      <!--Table 3.3-->
      <h2>Table 3.3</h2>
      <?php
      include 'db_info.php';

      $department = $_GET['department'];
      $year = $_GET['year'];

      // Check if the delete button was clicked
      if (isset($_GET['actionD']) && $_GET['actionD'] == 'delete' && isset($_GET['idD'])) {
        $id = $_GET['idD'];
        $sql = "DELETE FROM table33 WHERE table33ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        
        
      }

      // SQL query to retrieve data from table33 based on department and year
      $sql = "SELECT * FROM table33 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>3.1&nbsp;Optimizar&nbsp;y&nbsp;diversificar&nbsp;los&nbsp;servicios a los estudiantes atemperándolos a sus necesidades</th>
                      <th scope='col' colspan='2'>3.2&nbsp;Diversificar&nbsp;las&nbsp;actividades&nbsp;de promoción y reclutamiento</th>
                      <th scope='col'>3.3&nbsp;Facilitar&nbsp;el&nbsp;desarrollo&nbsp;integral&nbsp;de los estudiantes para alcanzar sus metas académicas y profesionales</th>
                      <th scope='col'>3.4&nbsp;Instituir&nbsp;los&nbsp;vínculos&nbsp;con&nbsp;los&nbsp;egresados&nbsp;para lograr una mayor colaboración y participación en diversas iniciativas institucionales</th>
                      <th scope='col'>3.5&nbsp;Fortalecer&nbsp;la&nbsp;cultura&nbsp;de&nbsp;avalúo orientada a mejorar los servicios a los estudiantes</th>
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
                      <td><a href='?actionD=delete&idD=" . $row["table33ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                      <th scope='col'>3.1&nbsp;Optimizar&nbsp;y&nbsp;diversificar&nbsp;los&nbsp;servicios a los estudiantes atemperándolos a sus necesidades</th>
                      <th scope='col' colspan='2'>3.2&nbsp;Diversificar&nbsp;las&nbsp;actividades&nbsp;de promoción y reclutamiento</th>
                      <th scope='col'>3.3&nbsp;Facilitar&nbsp;el&nbsp;desarrollo&nbsp;integral&nbsp;de los estudiantes para alcanzar sus metas académicas y profesionales</th>
                      <th scope='col'>3.4&nbsp;Instituir&nbsp;los&nbsp;vínculos&nbsp;con&nbsp;los&nbsp;egresados&nbsp;para lograr una mayor colaboración y participación en diversas iniciativas institucionales</th>
                      <th scope='col'>3.5&nbsp;Fortalecer&nbsp;la&nbsp;cultura&nbsp;de&nbsp;avalúo orientada a mejorar los servicios a los estudiantes</th>
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
