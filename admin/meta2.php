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
      <h2 class="metaheader">Meta 2 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
    </header>
<!--Table 2.1A-->
      <h2>Table 2.1A</h2>
      <?php
      
      include 'db_info.php';

      // Function to update a row in the table21a table
      function updateRowa($id, $field1, $field2, $field3, $field4,$field5, $field6, $field7, $field8) {
        global $conn;
        $sql = "UPDATE table21a SET field1=?, field2=?, field3=?, field4=?, field5=?, field6=?, field7=?, field8=? WHERE table21aID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $field7, $field8, $id);
        $stmt->execute();
        $stmt->close();
      }

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
  // Check if the salvar button was clicked
  if (isset($_POST['actionA']) && $_POST['actionA'] == 'salvar' && isset($_POST['idA'])) {
    $id = $_POST['idA'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];
    $field7 = $_POST['field7'];
    $field8 = $_POST['field8'];


    updateRowa($id, $field1, $field2, $field3, $field4, $field5, $field6, $field7, $field8);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                      <input type='hidden' name='idA' value='" . $row["table21aID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field6' value='" . $row["field6"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field7' value='" . $row["field7"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field8' value='" . $row["field8"] . "' class='editable' readonly></td>
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionA=delete&idA=" . $row["table21aID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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
            <th scope='col'>Profesor</th>
            <th scope='col'>Fecha</th>
            <th scope='col'>Publicada</th>
            <th scope='col'>Clasificación&nbsp;de&nbsp;la&nbsp;publicación</th>
            <th scope='col'>*Tipo&nbsp;de&nbsp;Publicación</th>
            <th scope='col'>Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
            <th scope='col'>Entidad&nbsp;que&nbsp;publica</th>
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

      // Function to update a row in the table21b table
      function updateRowb($id, $field1, $field2, $field3, $field4,$field5, $field6) {
        global $conn;
        $sql = "UPDATE table21b SET field1=?, field2=?, field3=?, field4=?, field5=?, field6=? WHERE table21bID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $id);
        $stmt->execute();
        $stmt->close();
      }
    
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
  // Check if the salvar button was clicked
  if (isset($_POST['actionB']) && $_POST['actionB'] == 'salvar' && isset($_POST['idB'])) {
    $id = $_POST['idB'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];


    updateRowb($id, $field1, $field2, $field3, $field4, $field5, $field6);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Clasificación&nbsp;de&nbsp;actividad&nbsp;de&nbsp;creación&nbsp;y&nbsp;divulgación</th>
                      <th scope='col'>Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
                      <th scope='col'>Lugar&nbsp;de&nbsp;divulgación</th>
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
                        <input type='hidden' name='idB' value='" . $row["table21bID"] . "'>
                        <th scope='row'>" . $counter . "</th>
                        <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                        <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field6' value='" . $row["field6"] . "' class='editable' readonly></td>
                        <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                        <td class='borrar-column'><a href='?actionB=delete&idB=" . $row["table21bID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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
                      <th scope='col'>Profesor</th>
                      <th scope='col' colspan='2'>Título&nbsp;de&nbsp;la&nbsp;actividad</th>
                      <th scope='col'>Fecha</th>
                      <th scope='col'>Clasificación&nbsp;de&nbsp;actividad&nbsp;de&nbsp;creación&nbsp;y&nbsp;divulgación</th>
                      <th scope='col'>Auspiciada&nbsp;por&nbsp;el&nbsp;CIC</th>
                      <th scope='col'>Lugar&nbsp;de&nbsp;divulgación</th>
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

       // Function to update a row in the table22 table
       function updateRowc($id, $field1, $field2, $field3, $field4) {
        global $conn;
        $sql = "UPDATE table22 SET field1=?, field2=?, field3=?, field4=? WHERE table22ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $field1, $field2, $field3, $field4, $id);
        $stmt->execute();
        $stmt->close();
      }

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
  // Check if the salvar button was clicked
  if (isset($_POST['actionC']) && $_POST['actionC'] == 'salvar' && isset($_POST['idC'])) {
    $id = $_POST['idC'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
   


    updateRowc($id, $field1, $field2, $field3, $field4);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                      <input type='hidden' name='idC' value='" . $row["table22ID"] . "'>
                      <th scope='row'>" . $counter . "</th>
                      <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                      <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                      <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                      <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                      <td class='borrar-column'><a href='?actionC=delete&idC=" . $row["table22ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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

       // Function to update a row in the table23 table
       function updateRowd($id, $field1, $field2, $field3, $field4) {
        global $conn;
        $sql = "UPDATE table23 SET field1=?, field2=?, field3=?, field4=? WHERE table23ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $field1, $field2, $field3, $field4, $id);
        $stmt->execute();
        $stmt->close();
      }

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
  // Check if the salvar button was clicked
  if (isset($_POST['actionD']) && $_POST['actionD'] == 'salvar' && isset($_POST['idD'])) {
    $id = $_POST['idD'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
   


    updateRowd($id, $field1, $field2, $field3, $field4);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
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
                        <input type='hidden' name='idD' value='" . $row["table23ID"] . "'>
                        <th scope='row'>" . $counter . "</th>
                        <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                        <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                        <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                        <td class='borrar-column'><a href='?actionD=delete&idD=" . $row["table23ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
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
                        <th scope='col'>Título&nbsp;del&nbsp;proyecto&nbsp;de&nbsp;fondos&nbsp;externos</th>
                        <th scope='col' colspan='2'>Agencia</th>
                        <th scope='col'>Estatus</th>
                        <th scope='col'>Total de fondos</th>
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

      function updateRowe($id, $field1, $field2, $field3, $field4,$field5) {
        global $conn;
        $sql = "UPDATE table24 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table24ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $field1, $field2, $field3, $field4, $field5, $id);
        $stmt->execute();
        $stmt->close();
      }

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
      // Check if the salvar button was clicked
      if (isset($_POST['actionE']) && $_POST['actionE'] == 'salvar' && isset($_POST['idE'])) {
        $id = $_POST['idE'];
        $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
        $field5 = $_POST['field5'];


        updateRowe($id, $field1, $field2, $field3, $field4, $field5);
        
        // Redirect back to the same department and year after updating
        $department = $_GET['department'];
        $year = $_GET['year'];
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
                      <th scope='col' colspan='2'>Fecha</th>
                      <th scope='col'>Profesor&nbsp;(mentor&nbsp;o&nbsp;supervisor)</th>
                      <th scope='col'>Número&nbsp;de&nbsp;estudiantes&nbsp;investigadores&nbsp;por&nbsp;proyecto</th>
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
                          <input type='hidden' name='idE' value='" . $row["table24ID"] . "'>
                          <th scope='row'>" . $counter . "</th>
                          <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                          <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                          <td colspan='2'><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                          <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                          <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                          
                          <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                          <td class='borrar-column'><a href='?actionE=delete&idE=" . $row["table24ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                          <td class='salvar-column' style='display: none;'> <button type='submit' name='actionE' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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

      function updateRowf($id, $field1, $field2, $field3, $field4,$field5) {
        global $conn;
        $sql = "UPDATE table25 SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table25ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $field1, $field2, $field3, $field4, $field5, $id);
        $stmt->execute();
        $stmt->close();
      }

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

       // Check if the salvar button was clicked
       if (isset($_POST['actionF']) && $_POST['actionF'] == 'salvar' && isset($_POST['idF'])) {
        $id = $_POST['idF'];
        $field1 = $_POST['field1'];
        $field2 = $_POST['field2'];
        $field3 = $_POST['field3'];
        $field4 = $_POST['field4'];
        $field5 = $_POST['field5'];


        updateRowf($id, $field1, $field2, $field3, $field4, $field5);
        
        // Redirect back to the same department and year after updating
        $department = $_GET['department'];
        $year = $_GET['year'];
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
                          <input type='hidden' name='idF' value='" . $row["table25ID"] . "'>
                          <th scope='row'>" . $counter . "</th>
                          <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                          <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                          <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                          <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                          <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                          <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                          <td class='borrar-column'><a href='?actionF=delete&idF=" . $row["table25ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                          <td class='salvar-column' style='display: none;'> <button type='submit' name='actionF' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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
                        <th scope='col'>2.1&nbsp;Desarrollar&nbsp;y&nbsp;apoyar&nbsp;la&nbsp;divulgación&nbsp;de&nbsp;investigaciones&nbsp;científicas y proyectos de&nbsp;creación en&nbsp;conferencias, foros, revistas arbitradas y publicaciones aplicables.</th>
                        <th scope='col' colspan='2'>2.2&nbsp;Propiciar&nbsp;alianzas&nbsp;y acuerdos&nbsp;de&nbsp;colaboración&nbsp;entre los&nbsp;investigadores y&nbsp;creadores de&nbsp;UPRA y&nbsp;otras universidades e instituciones.</th>
                        <th scope='col'>2.3 Apoyar proyectos de investigación&nbsp;y&nbsp;creación dirigidos a&nbsp;la captación de fondos.</th>
                        <th scope='col'>2.4&nbsp;Propiciar&nbsp;la&nbsp;investigación&nbsp;estudiantil&nbsp;y&nbsp;las actividades de creación estudiantil bajo la mentoría de los profesores.</th>
                        <th scope='col'>2.5 Fomentar una cultura de avalúo en&nbsp;la&nbsp;investigación y creación.</th>
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
