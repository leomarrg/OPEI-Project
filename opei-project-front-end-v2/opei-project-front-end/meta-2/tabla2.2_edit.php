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
      <header></header>
    
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
    <a class="underline-button" href="tabla2.2.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 2.2 Convenios y Alianzas </h6>
      <form action="https://formbold.com/s/FORM_ID" method="POST">
        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Título&nbsp;del&nbsp;convenio&nbsp;o&nbsp;alianza*</th>
              <th scope="col">Agencia&nbsp;o&nbsp;institución</th>
              <th scope="col">Estatus</th>
              <th scope="col">Total&nbsp;de&nbsp;fondos</th>
              <th scope="col">Editar</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              // Establish a database connection
              include 'db_info.php';
              
              // Fetch data from the database
              $sql = "SELECT * FROM table22";
              $result = $conn->query($sql);

              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['table22ID'] . "</td>";
                  echo "<td><input type='text' id='field1_" . $row['table22ID'] . "' value='" . $row['field1'] . "'></td>";
                  echo "<td><input type='text' id='field2_" . $row['table22ID'] . "' value='" . $row['field2'] . "'></td>";
                  echo "<td><input type='text' id='field3_" . $row['table22ID'] . "' value='" . $row['field3'] . "'></td>";
                  echo "<td><input type='text' id='field4_" . $row['table22ID'] . "' value='" . $row['field4'] . "'></td>";
                  echo "<td><a href='javascript:void(0);' onclick='updateTable22Row(" . $row['table22ID'] . ")'>Update</a></td>";
                  echo "<td><a href='delete.php?id=" . $row['table22ID'] . "'>Borrar</a></td>";
                  echo "</tr>";
              }
              // Close connection
              $conn->close();
          ?>
            </tr>
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
