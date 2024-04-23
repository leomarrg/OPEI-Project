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
      <h2 class="metaheader">Meta 1 <span id="year"></span></h2>
      <h2 class="metaheader"><?php echo'Año Académico: ' . $year . '-' . $year+1 ."";?></h2>
      
    </header>
<!--Table 1.1-->
    <h2>Table 1.1A</h2>
    <?php 
    session_start();
    include 'db_info.php';
    
    // Function to delete a row from the table11a table
    function deleteRow($id) {
        global $conn;
        $sql = "DELETE FROM table11a WHERE table11aID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
    
    // Check if the delete button was clicked
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteRow($id);
        
        // Redirect back to the same department and year after deleting
        $department = $_GET['department'];
        $year = $_GET['year'];
        header("Location: meta1.php?department=$department&year=$year");
        exit();
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
                    <td><a href='?action=delete&id=" . $row["table11aID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                    <th scope='col'>Editar</th>
                    <th scope='col'>Borrar</th>
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

       // Get the department and year from the URL parameters
       $department = $_GET['department'];
       $year = $_GET['year'];
       
       // Check if the delete button was clicked
       if (isset($_GET['actionB']) && $_GET['actionB'] == 'delete' && isset($_GET['idB'])) {
           $id = $_GET['idB'];
           $sql = "DELETE FROM table11b WHERE table11bID = ?";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("i", $id);
           $stmt->execute();
           $stmt->close();
           
           // Redirect back to the same department and year after deleting
           header("Location: meta1.php?department=$department&year=$year");
           exit();
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
                       <td><a href='?actionB=delete&idB=" . $row["table11bID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                       <th scope='col'>Editar</th>
                       <th scope='col'>Borrar</th>
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
    
    // Redirect back to the same department and year after deleting
    header("Location: meta1.php?department=$department&year=$year");
    exit();
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
        <th scope='col'>Editar</th>
        <th scope='col'>Borrar</th>
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
        <th scope='col'></th>
        <th scope='col'></th>
      </tr>
    </thead>
    <tbody>";
    while ($row = $result->fetch_assoc()) {
  ?>
        <tr>
          <th scope="row"><?php echo $row["table12ID"]; ?></th>
          <td><?php echo ($row["field1"] === 'option1') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field1"] === 'option2') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field1"] === 'option3') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field2"] === 'option1') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field2"] === 'option2') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field2"] === 'option3') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field3"] === 'option1') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field3"] === 'option2') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field3"] === 'option3') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field4"] === 'option1') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field4"] === 'option2') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field4"] === 'option3') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field5"] === 'option1') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field5"] === 'option2') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field5"] === 'option3') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field6"] === 'option1') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field6"] === 'option2') ? 'x' : ''; ?></td>
          <td><?php echo ($row["field6"] === 'option3') ? 'x' : ''; ?></td>
          <th scope="row"><a href="#">Editar</a></th>
          <th scope="row"><a href="?action12=delete&id12=<?php echo $row["table12ID"]; ?>&department=<?php echo $department; ?>&year=<?php echo $year; ?>">Borrar</a></th>
        </tr>
  <?php
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
        <th scope='col'>Editar</th>
        <th scope='col'>Borrar</th>
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
        <th scope='col'></th>
        <th scope='col'></th>
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

              // Get the department and year from the URL parameters
              $department = $_GET['department'];
              $year = $_GET['year'];

              // Check if the delete button was clicked
              if (isset($_GET['actionC']) && $_GET['actionC'] == 'delete' && isset($_GET['idC'])) {
                  $id = $_GET['idC'];
                  $sql = "DELETE FROM table13 WHERE table13ID = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("i", $id);
                  $stmt->execute();
                  $stmt->close();
                  
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
                              <td><a href='?actionC=delete&idC=" . $row["table13ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                              <th scope='col'>Editar</th>
                              <th scope='col'>Borrar</th>
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

                 // Get the department and year from the URL parameters
                 $department = $_GET['department'];
                 $year = $_GET['year'];
                 
                 // Check if the delete button was clicked
                 if (isset($_GET['actionA']) && $_GET['actionA'] == 'delete' && isset($_GET['idA'])) {
                     $id = $_GET['idA'];
                     $sql = "DELETE FROM table14a WHERE table14aID = ?";
                     $stmt = $conn->prepare($sql);
                     $stmt->bind_param("i", $id);
                     $stmt->execute();
                     $stmt->close();
                    
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
                                 <td><a href='?actionA=delete&idA=" . $row["table14aID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                                 <th scope='col'>Editar</th>
                                 <th scope='col'>Borrar</th>
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

    // Get the department and year from the URL parameters
    $department = $_GET['department'];
    $year = $_GET['year'];
    
    // Check if the delete button was clicked
    if (isset($_GET['actionD']) && $_GET['actionD'] == 'delete' && isset($_GET['idD'])) {
        $id = $_GET['idD'];
        $sql = "DELETE FROM table14b WHERE table14bID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        
        
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
                    <td><a href='?actionD=delete&idD=" . $row["table14bID"] . "&department=$department&year=$year'>Borrar</a></td>
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
                    <th scope='col'>Editar</th>
                    <th scope='col'>Borrar</th>
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

      // Get the department and year from the URL
      $department = $_GET['department'];
      $year = $_GET['year'];
      

      // Check if the delete button was clicked
    if (isset($_GET['actionE']) && $_GET['actionE'] == 'delete' && isset($_GET['idE'])) {
      $id = $_GET['idE'];
      $sql = "DELETE FROM table15 WHERE table15ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
      
      
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
                      <td><a href='?actionE=delete&idE=" . $row["table15ID"] . "&department=$department&year=$year'>Borrar</a></td>
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
    <script src="js/mainmenu.js"></script>
    <script src="js/metapage.js"></script>
</body>
</html>
