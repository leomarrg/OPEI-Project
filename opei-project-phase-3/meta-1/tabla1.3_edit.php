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
    <a class="underline-button" href="../meta-1/tabla1.3.html">Volver</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
        <h6>Tabla 1.3 Programas acreditados</h6>
         
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre&nbsp;del&nbsp;programa&nbsp;académico&nbsp;acreditado</th>
                <th scope="col">Agencia&nbsp;que&nbsp;acredita&nbsp;el&nbsp;Programa</th>
                <th scope="col">Año&nbsp;de&nbsp;última&nbsp;acreditación</th>
                <th scope="col">Año&nbsp;próxima&nbsp;acreditación</th>
                <th scope="col">Número&nbsp;de&nbsp;programas&nbsp;acreditados</th>
                <th scope="col">Recomendaciones</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
                <?php
                // Establish a database connection
                include 'db_info.php';
    
                // Fetch data from the database
                $sql = "SELECT * FROM table13"; // Replace 'table11a' with the actual table name
                $result = $conn->query($sql);
    
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['table13ID'] . "</td>";
                    echo "<td><input type='text' id='field1_" . $row['table13ID'] . "' value='" . $row['field1'] . "'></td>";
                    echo "<td><input type='text' id='field2_" . $row['table13ID'] . "' value='" . $row['field2'] . "'></td>";
                    echo "<td><input type='text' id='field3_" . $row['table13ID'] . "' value='" . $row['field3'] . "'></td>";
                    echo "<td><input type='text' id='field4_" . $row['table13ID'] . "' value='" . $row['field4'] . "'></td>";
                    echo "<td><input type='text' id='field5_" . $row['table13ID'] . "' value='" . $row['field5'] . "'></td>";
                    echo "<td><input type='text' id='field6_" . $row['table13ID'] . "' value='" . $row['field6'] . "'></td>";
                    echo "<td><a href='javascript:void(0);' onclick='updateTable13Row(" . $row['table13ID'] . ")'>Update</a></td>";
                    echo "<td><a href='tabla1.3_delete.php?id=" . $row['table13ID'] . "'>Borrar</a></td>";
                    echo "</tr>";
                }
    
                // Close connection
                $conn->close();
               ?>
            </tbody>
        </table>
    </div>
</div>

    
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
</body>
</html>
