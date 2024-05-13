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
    <a class="underline-button" href="tabla5.2.html">Editar</a>
</div>
<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
      <h6>Tabla 5.2: Iniciativas para recaudación de fondos de su departamento</h6>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Iniciativas</th>
                <th scope="col">Fondos&nbsp;recaudados</th>
                <th scope="col">Comentario&nbsp;(opcional)</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
              <?
              // Establish a database connection
              include 'db_info.php';
              // Fetch data from the database
              $sql = "SELECT * FROM table52";
              $result = $conn->query($sql);

              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['table52ID'] . "</td>";
                  echo "<td><input type='text' id='field1_" . $row['table52ID'] . "' value='" . $row['field1'] . "'></td>";
                  echo "<td><input type='text' id='field2_" . $row['table52ID'] . "' value='" . $row['field2'] . "'></td>";
                  echo "<td><input type='text' id='field3_" . $row['table52ID'] . "' value='" . $row['field3'] . "'></td>";
                  echo "<td><a href='javascript:void(0);' onclick='updateTable52Row(" . $row['table52ID'] . ")'>Update</a></td>";
                  echo "<td><a href='delete.php?id=" . $row['table52ID'] . "'>Borrar</a></td>";
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
