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
      <a href='website.php' class="backmainmenu" ><h1>UPRA Reports</h1></a>
      <h2 class="metaheader" id="departmentHeader">Nombre del departamento</h2>
      <h2 class="metaheader">Meta 1 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
      
    </header>
<!--Table 1.1-->
    <h2>Table 1.1A</h2>
    <?php 
          
          include 'db_info.php';


          // Function to update a row in the table11a table
          function updateRow($id, $field1, $field2, $field3, $field4) {
              global $conn;
              $sql = "UPDATE table11a SET field1=?, field2=?, field3=?, field4=? WHERE table11aID=?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("ssssi", $field1, $field2, $field3, $field4, $id);
              $stmt->execute();
              $stmt->close();
          }

          // Check if the delete button was clicked
          if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
              $id = $_GET['id'];
              $sql = "DELETE FROM table11a WHERE table11aID = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("i", $id);
              $stmt->execute();
              $stmt->close();
              
              // Redirect back to the same department and year after deleting
              $department = $_GET['department'];
              $year = $_GET['year'];
          }

          // Check if the salvar button was clicked
          if (isset($_POST['action']) && $_POST['action'] == 'salvar' && isset($_POST['id'])) {
              $id = $_POST['id'];
              $field1 = $_POST['field1'];
              $field2 = $_POST['field2'];
              $field3 = $_POST['field3'];
              $field4 = $_POST['field4'];

              updateRow($id, $field1, $field2, $field3, $field4);
              
              // Redirect back to the same department and year after updating
              $department = $_GET['department'];
              $year = $_GET['year'];
          }

          // Get the department and year from the URL parameters
          $department = $_GET['department'];
          $year = $_GET['year'];

          // Prepare the SQL query with placeholders for department and year
          $sql = "SELECT * FROM table11a WHERE DepartmentID IN (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";

          // Prepare the statement
          $stmt = $conn->prepare($sql);

          // Bind the parameters
          $stmt->bind_param("si", $department, $year);

          // Execute the query
          $stmt->execute();

          // Get the result
          $result = $stmt->get_result();
          if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table' style='margin: 0 auto;'>
                    <thead>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Curso</th>
                        <th scope='col' colspan='2'>Acciones&nbsp;de&nbsp;Curso</th>
                        <th scope='col'>Estatus</th>
                        <th scope='col'>Breve&nbsp;descripción</th>
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
                        <input type='hidden' name='id' value='" . $row["table11aID"] . "'>
                        <th scope='row'>" . $counter . "</th>
                        <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                        <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                        <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                        <td class='borrar-column'><a href='?action=delete&id=" . $row["table11aID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                        <td class='salvar-column' style='display: none;'> <button type='submit' name='action' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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
                          <th scope='col'>Curso</th>
                          <th scope='col' colspan='2'>Acciones&nbsp;de&nbsp;Curso</th>
                          <th scope='col'>Estatus</th>
                          <th scope='col'>Breve&nbsp;descripción</th>
                        </tr>
                      </thead>
                    </table>";
              echo "<h3 style='margin: 0 auto;text-align: center;
              padding: 10px;'>0 RESULTADOS</h3>";
          }

          // Close the statement and connection
          $stmt->close();
          $conn->close();
          ?>
      <br>
      <!--Table 1.1B-->
        <h2>Table 1.1B</h2>
        <?php
            include 'db_info.php';

            // Function to update a row in the table11b table
            function updateRowb($id, $field1, $field2, $field3, $field4) {
              global $conn;
              $sql = "UPDATE table11b SET field1=?, field2=?, field3=?, field4=? WHERE table11bID=?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("ssssi", $field1, $field2, $field3, $field4, $id);
              $stmt->execute();
              $stmt->close();
            }



            // Get the department and year from the URL parameters
            $department = $_GET['department'];
            $year = $_GET['year'];

            // Check if the delete button was clicked
            if (isset($_GET['action11b']) && $_GET['action11b'] == 'delete' && isset($_GET['id11b'])) {
                $id = $_GET['id11b'];
                $sql = "DELETE FROM table11b WHERE table11bID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();

                
            }

            // Check if the salvar button was clicked
            if (isset($_POST['action11b']) && $_POST['action11b'] == 'salvar' && isset($_POST['id11b'])) {
              $id = $_POST['id11b'];
              $field1 = $_POST['field1'];
              $field2 = $_POST['field2'];
              $field3 = $_POST['field3'];
              $field4 = $_POST['field4'];

              updateRowb($id, $field1, $field2, $field3, $field4);
              
              // Redirect back to the same department and year after updating
              $department = $_GET['department'];
              $year = $_GET['year'];
              
            }

            // Prepare the SQL query with placeholders for department and year
            $sql = "SELECT * FROM table11b WHERE DepartmentID IN (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            // Bind the parameters
            $stmt->bind_param("si", $department, $year);

            // Execute the query
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Output data of each row
                echo "<table class='table' style='margin: 0 auto;'>
                        <thead>
                          <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Cambio&nbsp;académico</th>
                            <th scope='col' colspan='2'>Cambio&nbsp;adacémico&nbsp;institucional&nbsp;o&nbsp;menor</th>
                            <th scope='col'>Cambio&nbsp;académico&nbsp;significativo</th>
                            <th scope='col'>Cambio&nbsp;sustancial</th>
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
                            <input type='hidden' name='id11b' value='" . $row["table11bID"] . "'>
                            <th scope='row'>" . $counter . "</th>
                            <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                            <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                            <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                            <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                            <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                            <td class='borrar-column'><a href='?action11b=delete&id11b=" . $row["table11bID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                            <td class='salvar-column' style='display: none;'> <button type='submit' name='action11b' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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
                            <th scope='col'>Cambio&nbsp;académico</th>
                            <th scope='col' colspan='2'>Cambio&nbsp;adacémico&nbsp;institucional&nbsp;o&nbsp;menor</th>
                            <th scope='col'>Cambio&nbsp;académico&nbsp;significativo</th>
                            <th scope='col'>Cambio&nbsp;sustancial</th>
                          </tr>
                        </thead>
                        </table>";
                echo "<h3 style='margin: 0 auto;text-align: center;
                padding: 10px;'>0 RESULTADOS</h3>";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
            ?>
      <br>
      <!--Table 1.2-->
<h2>Table 1.2</h2>
<?php
include 'db_info.php';

$department = $_GET['department'];
$year = $_GET['year'];

// Check if the delete button was clicked
if (isset($_GET['action12']) && $_GET['action12'] == 'delete' && isset($_GET['id12'])) {
    $id = $_GET['id12'];
    $sql = "DELETE FROM table12 WHERE table12ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// SQL query to retrieve data from table12 based on department and year
$sql = "SELECT * FROM table12 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("si", $department, $year);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();
?>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    echo "<table id='editable-table' class='table' style='margin: 0 auto;'>
        <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col' colspan='3'>Comunidades de Aprendizaje</th>
            <th scope='col' colspan='3'>Educación a Distancia</th>
            <th scope='col' colspan='3'>Programas COOP</th>
            <th scope='col' colspan='3'>Investigación</th>
            <th scope='col' colspan='3'>Internados / Prácticas</th>
            <th scope='col' colspan='3'>Cursos no Tradicionales</th>
            <th scope='col' class='editar-header'>Editar</th>
            <th scope='col' class='borrar-header'>Borrar</th>
            <th scope='col' class='salvar-header' style='display: none;'>Modo de editar</th>
        </tr>
        <tr>
            <th scope='col'></th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Nocturnos</th>
            <th scope='col'>Sabatino</th>
            <th scope='col'>Trimestral</th>
            <th scope='col' class='editar-header'></th>
            <th scope='col' class='borrar-header'></th>
            <th scope='col' class='salvar-header' style='display: none;'></th>
        </tr>
        </thead>
        <tbody>";
    // Initialize counter
    $counter = 1;

    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <form method='post' action='update_database.php'>
                <input type='hidden' name='table12ID' value='<?php echo $row["table12ID"]; ?>'>
                <th scope='row'><?php echo $counter ?></th>
                <td class='editable-cell'><?php echo ($row["field1"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field1"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field1"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field2"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field2"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field2"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field3"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field3"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field3"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field4"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field4"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field4"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field5"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field5"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field5"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field6"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field6"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field6"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editar-column'><button class='editar-btn' onclick='showPopup(event, <?php echo json_encode($row); ?>)'>Editar</button></td>
                <td class='borrar-column'><a href='?action12=delete&id12=<?php echo $row["table12ID"]; ?>&department=<?php echo $department; ?>&year=<?php echo $year; ?>' class='borrar-btn'>Borrar</a></td>
                <td class='salvar-column' style='display: none;'>  <button type='submit' name='action12' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
            </form>
        </tr>
        <?php
        // Increment counter
        $counter++;
    }
} else {
    echo "<table class='table' style='margin: 0 auto;'>
        <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col' colspan='3'>Comunidades de Aprendizaje</th>
            <th scope='col' colspan='3'>Educación a Distancia</th>
            <th scope='col' colspan='3'>Programas COOP</th>
            <th scope='col' colspan='3'>Investigación</th>
            <th scope='col' colspan='3'>Internados / Prácticas</th>
            <th scope='col' colspan='3'>Cursos no Tradicionales</th>
        </tr>
        <tr>
            <th scope='col'></th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Nocturnos</th>
            <th scope='col'>Sabatino</th>
            <th scope='col'>Trimestral</th>
        </tr>
        </thead>
        </table>";
    echo "<h3 style='margin: 0 auto;text-align: center;
        padding: 10px;'>0 RESULTADOS</h3>";
}
?>
</tbody>
</table>

    <br>
            <!--Table 1.3-->
            <h2>Table 1.3</h2>
            <?php 
            include 'db_info.php';

              // Function to update a row in the table13 table
              function updateRowc($id, $field1, $field2, $field3, $field4,$field5, $field6) {
                global $conn;
                $sql = "UPDATE table13 SET field1=?, field2=?, field3=?, field4=?, field5=?, field6=? WHERE table13ID=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $id);
                $stmt->execute();
                $stmt->close();
              }

              // Get the department and year from the URL parameters
              $department = $_GET['department'];
              $year = $_GET['year'];

              // Check if the delete button was clicked
              if (isset($_GET['action13']) && $_GET['action13'] == 'delete' && isset($_GET['id13'])) {
                  $id = $_GET['id13'];
                  $sql = "DELETE FROM table13 WHERE table13ID = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("i", $id);
                  $stmt->execute();
                  $stmt->close();
                  
              }
              // Check if the salvar button was clicked
              if (isset($_POST['action13']) && $_POST['action13'] == 'salvar' && isset($_POST['id13'])) {
                $id = $_POST['id13'];
                $field1 = $_POST['field1'];
                $field2 = $_POST['field2'];
                $field3 = $_POST['field3'];
                $field4 = $_POST['field4'];
                $field5 = $_POST['field5'];
                $field6 = $_POST['field6'];


                updateRowc($id, $field1, $field2, $field3, $field4, $field5, $field6);
                
                // Redirect back to the same department and year after updating
                $department = $_GET['department'];
                $year = $_GET['year'];
              }
              // Prepare the SQL query with placeholders for department and year
              $sql = "SELECT * FROM table13 WHERE DepartmentID IN (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";

              // Prepare the statement
              $stmt = $conn->prepare($sql);

              // Bind the parameters
              $stmt->bind_param("si", $department, $year);

              // Execute the query
              $stmt->execute();

              // Get the result
              $result = $stmt->get_result();

              if ($result->num_rows > 0) {
                // Output data of each row
                echo "<table class='table' style='margin: 0 auto;'>
                        <thead>
                          <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Nombre&nbsp;del&nbsp;programa&nbsp;académico&nbsp;acreditado</th>
                            <th scope='col' colspan='2'>Agencia&nbsp;que&nbsp;acredita&nbsp;el&nbsp;Programa</th>
                            <th scope='col'>Año&nbsp;de&nbsp;última&nbsp;acreditación</th>
                            <th scope='col'>Año&nbsp;próxima&nbsp;acreditación</th>
                            <th scope='col'>Número&nbsp;de&nbsp;programas&nbsp;acreditados</th>
                            <th scope='col'>Recomendaciones</th>
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
                            <input type='hidden' name='id13' value='" . $row["table13ID"] . "'>
                            <th scope='row'>" . $counter . "</th>
                            <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                            <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                            <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                            <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                            <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                            <td><input type='text' name='field6' value='" . $row["field6"] . "' class='editable' readonly></td>
                            <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                            <td class='borrar-column'><a href='?action13=delete&id13=" . $row["table13ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                            <td class='salvar-column' style='display: none;'> <button type='submit' name='action13' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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
                              <th scope='col'>Nombre&nbsp;del&nbsp;programa&nbsp;académico&nbsp;acreditado</th>
                              <th scope='col' colspan='2'>Agencia&nbsp;que&nbsp;acredita&nbsp;el&nbsp;Programa</th>
                              <th scope='col'>Año&nbsp;de&nbsp;última&nbsp;acreditación</th>
                              <th scope='col'>Año&nbsp;próxima&nbsp;acreditación</th>
                              <th scope='col'>Número&nbsp;de&nbsp;programas&nbsp;acreditados</th>
                              <th scope='col'>Recomendaciones</th>
                            </tr>
                          </thead>
                          </table>";
                echo "<h3 style='margin: 0 auto;text-align: center;
                padding: 10px;'>0 RESULTADOS</h3>";
              }

              // Close the statement and connection
              $stmt->close();
              $conn->close();
                    ?>
                    <br>
                   <!--Table 1.4A-->
                   <h2>Table 1.4A</h2>
                    <?php
                 include 'db_info.php';


                 function updateRowd($id, $field1, $field2, $field3, $field4,$field5) {
                  global $conn;
                  $sql = "UPDATE table14a SET field1=?, field2=?, field3=?, field4=?, field5=? WHERE table14aID=?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("sssssi", $field1, $field2, $field3, $field4, $field5, $id);
                  $stmt->execute();
                  $stmt->close();
                }
  
                 // Get the department and year from the URL parameters
                 $department = $_GET['department'];
                 $year = $_GET['year'];
                 
                 // Check if the delete button was clicked
                 if (isset($_GET['action14a']) && $_GET['action14a'] == 'delete' && isset($_GET['id14a'])) {
                     $id = $_GET['id14a'];
                     $sql = "DELETE FROM table14a WHERE table14aID = ?";
                     $stmt = $conn->prepare($sql);
                     $stmt->bind_param("i", $id);
                     $stmt->execute();
                     $stmt->close();
                    
                 }

                 // Check if the salvar button was clicked
              if (isset($_POST['action14a']) && $_POST['action14a'] == 'salvar' && isset($_POST['id14a'])) {
                $id = $_POST['id14a'];
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
                 
                 // Prepare the SQL query with placeholders for department and year
                 $sql = "SELECT * FROM table14a WHERE DepartmentID IN (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
                 
                 // Prepare the statement
                 $stmt = $conn->prepare($sql);
                 
                 // Bind the parameters
                 $stmt->bind_param("si", $department, $year);
                 
                 // Execute the query
                 $stmt->execute();
                 
                 // Get the result
                 $result = $stmt->get_result();
                 
                 if ($result->num_rows > 0) {
                     // Output data of each row
                     echo "<table class='table' style='margin: 0 auto;'>
                             <thead>
                               <tr>
                                 <th scope='col'>#</th>
                                 <th scope='col'>Curso</th>
                                 <th scope='col' colspan='2'>Estrategía&nbsp;de&nbsp;avalúo</th>
                                 <th scope='col'>Indicadores</th>
                                 <th scope='col'>Resultados&nbsp;obtenidos</th>
                                 <th scope='col'>Acciones&nbsp;correctivas</th>
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
                                  <input type='hidden' name='id14a' value='" . $row["table14aID"] . "'>
                                  <th scope='row'>" . $counter . "</th>
                                  <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                                  <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                                  <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                                  <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                                  <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                                  <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                                  <td class='borrar-column'><a href='?action14a=delete&id14a=" . $row["table14aID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                                  <td class='salvar-column' style='display: none;'> <button type='submit' name='action14a' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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
                                 <th scope='col'>Curso</th>
                                 <th scope='col' colspan='2'>Estrategía&nbsp;de&nbsp;avalúo</th>
                                 <th scope='col'>Indicadores</th>
                                 <th scope='col'>Resultados&nbsp;obtenidos</th>
                                 <th scope='col'>Acciones&nbsp;correctivas</th>
                               </tr>
                             </thead>
                             </table>";
                  echo "<h3 style='margin: 0 auto;text-align: center;
                  padding: 10px;'>0 RESULTADOS</h3>";
                 }
                 
                 // Close the statement and connection
                 $stmt->close();
                 $conn->close();
                  ?>
      <br>
      <!--Table 1.4B-->
      <h2>Table 1.4B</h2>
      <?php
    include 'db_info.php';


    // Function to update a row in the table13 table
    function updateRowe($id, $field1, $field2, $field3, $field4,$field5, $field6) {
      global $conn;
      $sql = "UPDATE table14b SET field1=?, field2=?, field3=?, field4=?, field5=?, field6=? WHERE table14bID=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $id);
      $stmt->execute();
      $stmt->close();
    }

    // Get the department and year from the URL parameters
    $department = $_GET['department'];
    $year = $_GET['year'];
    
    // Check if the delete button was clicked
    if (isset($_GET['action14b']) && $_GET['action14b'] == 'delete' && isset($_GET['id14b'])) {
        $id = $_GET['id14b'];
        $sql = "DELETE FROM table14b WHERE table14bID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();  
    }
    
    // Check if the salvar button was clicked
    if (isset($_POST['action14b']) && $_POST['action14b'] == 'salvar' && isset($_POST['id14b'])) {
      $id = $_POST['id14b'];
      $field1 = $_POST['field1'];
      $field2 = $_POST['field2'];
      $field3 = $_POST['field3'];
      $field4 = $_POST['field4'];
      $field5 = $_POST['field5'];
      $field6 = $_POST['field6'];


      updateRowe($id, $field1, $field2, $field3, $field4, $field5, $field6);
      
      // Redirect back to the same department and year after updating
      $department = $_GET['department'];
      $year = $_GET['year'];
    }

    // Prepare the SQL query with placeholders for department and year
    $sql = "SELECT * FROM table14b WHERE DepartmentID IN (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the parameters
    $stmt->bind_param("si", $department, $year);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table class='table' style='margin: 0 auto;'>
                <thead>
                  <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Servicio&nbsp;o&nbsp;Proceso&nbsp;Evaluado&nbsp;o&nbsp;a&nbsp;evaluar</th>
                    <th scope='col' colspan='2'>Indicador&nbsp;de&nbsp;ejecución</th>
                    <th scope='col'>Estrategia&nbsp;o&nbsp;instrumento&nbsp;de&nbsp;avalúo</th>
                    <th scope='col'>Resultados&nbsp;obtenidos</th>
                    <th scope='col'>Uso&nbsp;de&nbsp;resultados</th>
                    <th scope='col'>Acciones&nbsp;correctivas</th>
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
                    <input type='hidden' name='id14b' value='" . $row["table14bID"] . "'>
                    <th scope='row'>" . $counter . "</th>
                    <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                    <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                    <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                    <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                    <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                    <td><input type='text' name='field6' value='" . $row["field6"] . "' class='editable' readonly></td>
                    <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                    <td class='borrar-column'><a href='?action14b=delete&id14b=" . $row["table14bID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                    <td class='salvar-column' style='display: none;'> <button type='submit' name='action14b' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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
                    <th scope='col'>Servicio&nbsp;o&nbsp;Proceso&nbsp;Evaluado&nbsp;o&nbsp;a&nbsp;evaluar</th>
                    <th scope='col' colspan='2'>Indicador&nbsp;de&nbsp;ejecución</th>
                    <th scope='col'>Estrategia&nbsp;o&nbsp;instrumento&nbsp;de&nbsp;avalúo</th>
                    <th scope='col'>Resultados&nbsp;obtenidos</th>
                    <th scope='col'>Uso&nbsp;de&nbsp;resultados</th>
                    <th scope='col'>Acciones&nbsp;correctivas</th>
                  </tr>
                </thead>
                </table>";
      echo "<h3 style='margin: 0 auto;text-align: center;
      padding: 10px;'>0 RESULTADOS</h3>";
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
    ?>
      <br>
      <!--Table 1.5-->
      <h2>Table 1.5</h2>
      <?php
      include 'db_info.php';


      // Function to update a row in the table13 table
      function updateRowf($id, $field1, $field2, $field3, $field4,$field5, $field6) {
        global $conn;
        $sql = "UPDATE table15 SET field1=?, field2=?, field3=?, field4=?, field5=?, field6=? WHERE table15ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $id);
        $stmt->execute();
        $stmt->close();
      }

      // Get the department and year from the URL
      $department = $_GET['department'];
      $year = $_GET['year'];
      

      // Check if the delete button was clicked
    if (isset($_GET['action15']) && $_GET['action15'] == 'delete' && isset($_GET['id15'])) {
      $id = $_GET['id15'];
      $sql = "DELETE FROM table15 WHERE table15ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
  }

  // Check if the salvar button was clicked
  if (isset($_POST['action15']) && $_POST['action15'] == 'salvar' && isset($_POST['id15'])) {
    $id = $_POST['id15'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $field3 = $_POST['field3'];
    $field4 = $_POST['field4'];
    $field5 = $_POST['field5'];
    $field6 = $_POST['field6'];


    updateRowf($id, $field1, $field2, $field3, $field4, $field5, $field6);
    
    // Redirect back to the same department and year after updating
    $department = $_GET['department'];
    $year = $_GET['year'];
  }
      // SQL query to retrieve data from table15 based on department and year
      $sql = "SELECT * FROM table15 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department') AND year = $year";

      $result = $conn->query($sql);

      

      if ($result->num_rows > 0) {
          // Output data of each row
          echo "<table class='table' style='margin: 0 auto;'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>1.1&nbsp;la&nbsp;oferta&nbsp;académica&nbsp;mediante el desarrollo de&nbsp;programas académicos y cursos
                          pertinentes y competitivos en diversas&nbsp;modalidades&nbsp;que respondan a las&nbsp;necesidades del mercado laboral local e internacional</th>
                      <th scope='col' colspan='2'>1.2&nbsp;Fortalecer las&nbsp;comunidades de&nbsp;aprendizaje como apoyo a las
                          estrategias de retención, persistencia y&nbsp;graduación</th>
                      <th scope='col'>1.3&nbsp;Fomentar&nbsp;el&nbsp;desarrollo de&nbsp;propuestas&nbsp;académicas&nbsp;dirigidas&nbsp;a satisfacer&nbsp;las&nbsp;necesidades&nbsp;profesionales&nbsp;de la&nbsp;&nbsp;mediante&nbsp;iniciativas&nbsp;coordinadas por la&nbsp;División de&nbsp;Educación Continua y Estudios Profesionales
                          (DECEP) y programas similares en los&nbsp;departamentos académicos</th>
                      <th scope='col'>1.4&nbsp;Evaluar la política de educación general
                          para&nbsp;atemperarla&nbsp;al Perfil&nbsp;Estudiantil Puertorriqueño&nbsp;del Siglo XXI</th>
                      <th scope='col'>1.5&nbsp;Apoyar a los&nbsp;departamentos&nbsp;académicos en&nbsp;los&nbsp;trabajos&nbsp;dirigidos a la acreditación o reacreditación&nbsp;de sus programas</th>
                      <th scope='col'>1.6&nbsp;Promover&nbsp;una cultura&nbsp;académica&nbsp;orientada a evaluar los procesos de&nbsp;enseñanza
                          aprendizaje para mejorar&nbsp;la efectividad educativa</th>
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
                        <input type='hidden' name='id15' value='" . $row["table15ID"] . "'>
                        <th scope='row'>" . $counter . "</th>
                        <td><input type='text' name='field1' value='" . $row["field1"] . "' class='editable' readonly></td>
                        <td colspan='2'><input type='text' name='field2' value='" . $row["field2"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field3' value='" . $row["field3"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field4' value='" . $row["field4"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field5' value='" . $row["field5"] . "' class='editable' readonly></td>
                        <td><input type='text' name='field6' value='" . $row["field6"] . "' class='editable' readonly></td>
                        <td class='editar-column'><a href='#' class='editar-btn' onclick='makeEditable(event)'>Editar</a></td>
                        <td class='borrar-column'><a href='?action15=delete&id15=" . $row["table15ID"] . "&department=$department&year=$year' class='borrar-btn'>Borrar</a></td>
                        <td class='salvar-column' style='display: none;'> <button type='submit' name='action15' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
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
                      <th scope='col'>1.1&nbsp;la&nbsp;oferta&nbsp;académica&nbsp;mediante el desarrollo de&nbsp;programas académicos y cursos
                          pertinentes y competitivos en diversas&nbsp;modalidades&nbsp;que respondan a las&nbsp;necesidades del mercado laboral local e internacional</th>
                      <th scope='col' colspan='2'>1.2&nbsp;Fortalecer las&nbsp;comunidades de&nbsp;aprendizaje como apoyo a las
                          estrategias de retención, persistencia y&nbsp;graduación</th>
                      <th scope='col'>1.3&nbsp;Fomentar&nbsp;el&nbsp;desarrollo de&nbsp;propuestas&nbsp;académicas&nbsp;dirigidas&nbsp;a satisfacer&nbsp;las&nbsp;necesidades&nbsp;profesionales&nbsp;de la&nbsp;&nbsp;mediante&nbsp;iniciativas&nbsp;coordinadas por la&nbsp;División de&nbsp;Educación Continua y Estudios Profesionales
                          (DECEP) y programas similares en los&nbsp;departamentos académicos</th>
                      <th scope='col'>1.4&nbsp;Evaluar la política de educación general
                          para&nbsp;atemperarla&nbsp;al Perfil&nbsp;Estudiantil Puertorriqueño&nbsp;del Siglo XXI</th>
                      <th scope='col'>1.5&nbsp;Apoyar a los&nbsp;departamentos&nbsp;académicos en&nbsp;los&nbsp;trabajos&nbsp;dirigidos a la acreditación o reacreditación&nbsp;de sus programas</th>
                      <th scope='col'>1.6&nbsp;Promover&nbsp;una cultura&nbsp;académica&nbsp;orientada a evaluar los procesos de&nbsp;enseñanza
                          aprendizaje para mejorar&nbsp;la efectividad educativa</th>
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
