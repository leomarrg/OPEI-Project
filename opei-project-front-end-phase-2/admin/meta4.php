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
      <h2 class="metaheader">Meta 4 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
    </header>
      <!--Table 4.1-->
      <h2>Table 4.1</h2>
      <?php
        
        include 'db_info.php';

        function updateRowa($id, $field1, $field2, $field3, $field4,$field5) {
          global $conn;
          $sql = "UPDATE table41 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table41ID=?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sssssi", $field1, $field2, $field3, $field4, $field5, $id);
          $stmt->execute();
          $stmt->close();
        }

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

      // Check if the salvar button was clicked
      if (isset($_POST['actionA']) && $_POST['actionA'] == 'salvar' && isset($_POST['idA'])) {
        $id = $_POST['idA'];
        $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
        $field5 = $_POST['field5'];


        updateRowa($id, $field1, $field2, $field3, $field4, $field5);
        
        // Redirect back to the same department and year after updating
        $department = $_GET['department'];
        $year = $_GET['year'];
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
                        <input type='hidden' name='idA' value='" . $row["table41ID"] . "'>
                        <th scope='row'>" . $counter . "</th>
                        <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                        <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                        <td ><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                        <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                        <td class='borrar-column'><a href='?actionA=delete&idA=" . $row["table41ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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

      function updateRowb($id, $field1, $field2, $field3, $field4,$field5) {
        global $conn;
        $sql = "UPDATE table42 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table42ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $field1, $field2, $field3, $field4, $field5, $id);
        $stmt->execute();
        $stmt->close();
      }

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

  // Check if the salvar button was clicked
  if (isset($_POST['actionB']) && $_POST['actionB'] == 'salvar' && isset($_POST['idB'])) {
    $id = $_POST['idB'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];


    updateRowb($id, $field1, $field2, $field3, $field4, $field5);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                        <input type='hidden' name='idB' value='" . $row["table42ID"] . "'>
                        <th scope='row'>" . $counter . "</th>
                        <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                        <td ><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                        
                        <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                        <td class='borrar-column'><a href='?actionB=delete&idB=" . $row["table42ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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
                      <th scope='col'>Título del curso</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Educación Continua Primer Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Educación Continua Segundo Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Certificaciones Profesionales Primer Semestre</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;matriculados&nbsp;en cursos o programas en Certificaciones Profesionales Segundo Semestre</th>
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

      function updateRowc($id, $field1, $field2, $field3, $field4,$field5) {
        global $conn;
        $sql = "UPDATE table43 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table43ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $field1, $field2, $field3, $field4, $field5, $id);
        $stmt->execute();
        $stmt->close();
      }

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

    // Check if the salvar button was clicked
    if (isset($_POST['actionC']) && $_POST['actionC'] == 'salvar' && isset($_POST['idC'])) {
      $id = $_POST['idC'];
      $field1 = $_POST['field1'];
      $field2 = $_POST['field2'];
      $field3 = $_POST['field3'];
      $field4 = $_POST['field4'];
      $field5 = $_POST['field5'];


      updateRowc($id, $field1, $field2, $field3, $field4, $field5);
      
      // Redirect back to the same department and year after updating
      $department = $_GET['department'];
      $year = $_GET['year'];
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
                      <input type='hidden' name='idC' value='" . $row["table43ID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td ><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                      
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionC=delete&idC=" . $row["table43ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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
