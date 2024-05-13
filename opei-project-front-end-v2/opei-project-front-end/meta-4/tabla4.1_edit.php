<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-sidemenu.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/main.js"></script>

    <title>Contact Form #2 - Page 1</title>
</head>
<body>
    <header>
      </header>
       <!-- Dropdown list -->
<div class="formbold-main-wrapperDept">
    <div>
        <select 
            name="deptAcademicos"
            id="deptAcademicos"
            class="formbold-form-input"
        >
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <label for="deptAcademicos" class="formbold-form-label-top">Departamentos Academicos </label>
    </div>
    <a class="underline-button" href="tabla4.1.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 4.1 Actividades dirigidas a la comunidad externa</h6>
      <form action="https://formbold.com/s/FORM_ID" method="POST">
        
        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Título&nbsp;de&nbsp;la&nbsp;Actividad</th>
              <th scope="col" colspan="2">Clasificación</th>
              <th scope="col">Fecha</th>
              <th scope="col">Coordinador&nbsp;de&nbsp;la&nbsp;Actividad</th>
              <th scope="col">Número&nbsp;de&nbsp;participantes</th>
              <th scope="col">Editar</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?
            // Establish a database connection
            include 'db_info.php';
  
            // Fetch data from the database
            $sql = "SELECT * FROM table41";
            $result = $conn->query($sql);
  
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['table33ID'] . "</td>";
                echo "<td><input type='text' id='field1_" . $row['table41ID'] . "' value='" . $row['field1'] . "'></td>";
                echo "<td><input type='text' id='field2_" . $row['table41ID'] . "' value='" . $row['field2'] . "'></td>";
                echo "<td><input type='text' id='field3_" . $row['table41ID'] . "' value='" . $row['field3'] . "'></td>";
                echo "<td><input type='text' id='field2_" . $row['table41ID'] . "' value='" . $row['field2'] . "'></td>";
                echo "<td><input type='text' id='field3_" . $row['table41ID'] . "' value='" . $row['field3'] . "'></td>";
                echo "<td><a href='javascript:void(0);' onclick='updateTable41Row(" . $row['table41ID'] . ")'>Update</a></td>";
                echo "<td><a href='delete.php?id=" . $row['table41ID'] . "'>Borrar</a></td>";
                echo "</tr>";
            }
            // Close connection
            $conn->close();
        ?>
          </tbody>
      </table>
        <!-- Submit button -->
        <button class="formbold-btn">Submit</button>
      </form>
    </div>
  </div>
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
</body>
</html>