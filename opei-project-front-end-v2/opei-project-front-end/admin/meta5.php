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
      <h2 class="metaheader">Meta 5 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
    </header>
<!--Table 5.1-->
      <h2>Table 5.1</h2>
      <?php
      include 'db_info.php';

      function updateRowa($id, $field1, $field2, $field3, $field4,$field5) {
        global $conn;
        $sql = "UPDATE table51 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table51ID=?";
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
      $sql = "DELETE FROM table51 WHERE table51ID = ?";
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
                      <input type='hidden' name='idA' value='" . $row["table51ID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td ><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td ><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionA=delete&idA=" . $row["table51ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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

        function updateRowb($id, $field1, $field2, $field3,   ) {
          global $conn;
          $sql = "UPDATE table52 SET field1=?, field2=?, field3=? WHERE table52ID=?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sssi", $field1, $field2, $field3, $id);
          $stmt->execute();
          $stmt->close();
        }

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
  // Check if the salvar button was clicked
  if (isset($_POST['actionB']) && $_POST['actionB'] == 'salvar' && isset($_POST['idB'])) {
    $id = $_POST['idB'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];



    updateRowb($id, $field1, $field2, $field3);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                        <input type='hidden' name='idB' value='" . $row["table52ID"] . "'>
                        <th scope='row'>" . $counter . "</th>
                        <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                        <td ><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                        <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                        <td class='borrar-column'><a href='?actionB=delete&idB=" . $row["table52ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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
                        <th scope='col'>Iniciativas</th>
                        <th scope='col'>Fondos&nbsp;recaudados</th>
                        <th scope='col'>Comentario&nbsp;(opcional)</th>
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

       function updateRowc($id, $field1, $field2, $field3, $field4,$field5, $field6, $field7) {
        global $conn;
        $sql = "UPDATE table53 SET field1=?, field2=?, field3=?, field4=?, field5=?, field6=?, field7=? WHERE table53ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $field7, $id);
        $stmt->execute();
        $stmt->close();
      }

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

  // Check if the salvar button was clicked
  if (isset($_POST['actionC']) && $_POST['actionC'] == 'salvar' && isset($_POST['idC'])) {
    $id = $_POST['idC'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];


    updateRowc($id, $field1, $field2, $field3, $field4, $field5, $field6, $field7);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                      <input type='hidden' name='idC' value='" . $row["table53ID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td ><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field6' value='" . $row["field6"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field7' value='" . $row["field7"] . "' class='editable' readonly></td>
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionC=delete&idC=" . $row["table53ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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

          function updateRowd($id, $field1, $field2, $field3, $field4,$field5) {
            global $conn;
            $sql = "UPDATE table54 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table54ID=?";
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
            $sql = "DELETE FROM table54 WHERE table54ID = ?";
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
            $field5 = $_POST['field5'];;


            updateRowd($id, $field1, $field2, $field3, $field4, $field5);
            
            // Redirect back to the same department and year after updating
            $department = $_GET['department'];
            $year = $_GET['year'];
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
                  <input type='hidden' name='idD' value='" . $row["table54ID"] . "'>
                  <th scope='row'>" . $counter . "</th>
                  <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                  <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                  <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                  <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                  <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                  <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                  <td class='borrar-column'><a href='?actionD=delete&idD=" . $row["table54ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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
