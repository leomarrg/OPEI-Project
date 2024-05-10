<?php
    // Start session
    session_start();

    // Check if admin session is not set, redirect to signin.html
    if (!isset($_SESSION['adminID'])) {
        header("Location: ../signin.html");
        exit();
    }

    // Include database connection
    include_once "db_info.php";

    // Prepare and execute query to fetch admin details
    $adminID = $_SESSION['adminID'];
    $sql = "SELECT `Name` FROM `admin` WHERE `adminID` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $adminID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch admin's name
    $adminName = "";
    if ($row = $result->fetch_assoc()) {
        $adminName = $row['Name'];
    }

    // Store admin's name in session variable
    $_SESSION['adminName'] = $adminName;
?>
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
      <!-- Dropdown menu -->
      <div class="Adminbtn">
        <button class="dropbtn"><?php echo $_SESSION['adminName']; ?></button>
            <div class="Admin-content">
                <a href="signup.php">Registrar Usuario Nuevo</a>
                <a href="viewusers.php">Administrar Cuentas</a>
                <a href="logout.php" >Cerrar Session</a>
            </div>
      </div>
      <a href='website.php' class="backmainmenu"><h1>UPRA Reports</h1></a>
      <h2 class="metaheader" id="departmentHeader">Nombre del departamento</h2>
      <h2 class="metaheader">Meta 3 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
    </header>
<!--Table 3.1-->
      <h2>Table 3.1</h2>
      <?php
      
      include 'db_info.php';

      // Function to update a row in the table31 table
      function updateRowa($id, $field1, $field2, $field3, $field4) {
        global $conn;
        $sql = "UPDATE table31 SET field1=?, field2=?, field3=?, field4=? WHERE table31ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $field1, $field2, $field3, $field4, $id);
        $stmt->execute();
        $stmt->close();
      }

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

      // Check if the salvar button was clicked
      if (isset($_POST['actionA']) && $_POST['actionA'] == 'salvar' && isset($_POST['idA'])) {
        $id = $_POST['idA'];
        $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
      


        updateRowa($id, $field1, $field2, $field3, $field4);
        
        // Redirect back to the same department and year after updating
        $department = $_GET['department'];
        $year = $_GET['year'];
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
                      <th scope='col' class='editar-header'>Editar</th>
                      <th scope='col' class='borrar-header'>Borrar</th>
                      <th scope='col' class='salvar-header' style='display: none;'>Modo de editar</th> 
                    </tr>
                  </thead>
                  <tbody>";

          // Initialize counter
          $counter = 1;

          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <form method='post'>
                      <input type='hidden' name='idA' value='" . $row["table31ID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionA=delete&idA=" . $row["table31ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                      <td class='salvar-column' style='display: none;'> <button type='submit' name='actionA' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
                      </form>
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

            // Function to update a row in the table32a table
            function updateRowb($id, $field1, $field2, $field3, $field4) {
              global $conn;
              $sql = "UPDATE table32a SET field1=?, field2=?, field3=?, field4=? WHERE table32aID=?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("ssssi", $field1, $field2, $field3, $field4, $id);
              $stmt->execute();
              $stmt->close();
            }
            
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

        // Check if the salvar button was clicked
        if (isset($_POST['actionB']) && $_POST['actionB'] == 'salvar' && isset($_POST['idB'])) {
          $id = $_POST['idB'];
          $field1 = $_POST['field1'];
          $field2 = $_POST['field2'];
          $field3 = $_POST['field3'];
          $field4 = $_POST['field4'];
        


          updateRowb($id, $field1, $field2, $field3, $field4);
          
          // Redirect back to the same department and year after updating
          $department = $_GET['department'];
          $year = $_GET['year'];
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
                      <th scope='col' class='editar-header'>Editar</th>
                      <th scope='col' class='borrar-header'>Borrar</th>
                      <th scope='col' class='salvar-header' style='display: none;'>Modo de editar</th> 
                    </tr>
                  </thead>
                  <tbody>";

          // Initialize counter
          $counter = 1;

          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <form method='post'>
                      <input type='hidden' name='idB' value='" . $row["table32aID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionB=delete&idB=" . $row["table32aID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                      <td class='salvar-column' style='display: none;'> <button type='submit' name='actionB' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
                      </form>
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

      function updateRowc($id, $field1, $field2, $field3, $field4) {
        global $conn;
        $sql = "UPDATE table32b SET field1=?, field2=?, field3=?, field4=?, field5=?, field6=? WHERE table32bID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $id);
        $stmt->execute();
        $stmt->close();
      }
      
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

  // Check if the salvar button was clicked
  if (isset($_POST['actionC']) && $_POST['actionC'] == 'salvar' && isset($_POST['idC'])) {
    $id = $_POST['idC'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
   


    updateRowc($id, $field1, $field2, $field3, $field4);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                      <th scope='col' class='editar-header'>Editar</th>
                      <th scope='col' class='borrar-header'>Borrar</th>
                      <th scope='col' class='salvar-header' style='display: none;'>Modo de editar</th> 
                    </tr>
                  </thead>
                  <tbody>";

          // Initialize counter
          $counter = 1;

          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <form method='post'>
                      <input type='hidden' name='idC' value='" . $row["table32bID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field6' value='" . $row["field6"] . "' class='editable' readonly></td>
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionC=delete&idC=" . $row["table32bID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                      <td class='salvar-column' style='display: none;'> <button type='submit' name='actionC' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
                      </form>
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

      function updateRowd($id, $field1, $field2, $field3, $field4,$field5) {
        global $conn;
        $sql = "UPDATE table33 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table33ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $field1, $field2, $field3, $field4, $field5, $id);
        $stmt->execute();
        $stmt->close();
      }


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

      // Check if the salvar button was clicked
      if (isset($_POST['actionD']) && $_POST['actionD'] == 'salvar' && isset($_POST['idD'])) {
        $id = $_POST['idD'];
        $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
        $field5 = $_POST['field5'];


        updateRowd($id, $field1, $field2, $field3, $field4, $field5);
        
        // Redirect back to the same department and year after updating
        $department = $_GET['department'];
        $year = $_GET['year'];
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
                      <th scope='col' class='editar-header'>Editar</th>
                      <th scope='col' class='borrar-header'>Borrar</th>
                      <th scope='col' class='salvar-header' style='display: none;'>Modo de editar</th>
                    </tr>
                  </thead>
                  <tbody>";

          // Initialize counter
          $counter = 1;

          while($row = $result->fetch_assoc()) {
              echo "<tr>
                    <form method='post'>
                    <input type='hidden' name='idD' value='" . $row["table33ID"] . "'>
                    <th scope='row'>" . $counter . "</th>
                    <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                    <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                    <td ><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                    <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                    <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                    
                    <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                    <td class='borrar-column'><a href='?actionD=delete&idD=" . $row["table33ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                    <td class='salvar-column' style='display: none;'> <button type='submit' name='actionD' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
                    </form>
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
    <script>
        //Main menu Admin info dropdown
        function toggleAdminContent() {
            var adminContent = document.querySelector('.Admin-content');
            adminContent.classList.toggle('active');
        }

        var menuButton = document.querySelector('.dropbtn');
        menuButton.addEventListener('click', toggleAdminContent);
      </script>
    <script src="js/metapage.js"></script>
</body>
</html>
