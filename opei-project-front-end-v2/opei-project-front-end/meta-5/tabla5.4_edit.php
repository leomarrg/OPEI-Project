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
    <a class="underline-button" href="tabla5.4.html">Editar</a>
</div>
<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
        <h6>Tabla 5.4 Otros logros alcanzados por Objetivo y Actividad en la Meta 5</h6>
        <!-- Nombre del programa académico acreditado input text -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">5.1&nbsp;Incrementar&nbsp;las&nbsp;fuentes&nbsp;internas y externa para generar nuevos ingresos y alcanzar las metas propuestas de sustentabilidad financiera</th>
                <th scope="col">5.2&nbsp;Desarrollar&nbsp;un&nbsp;ecosistema&nbsp;de empresarismo, innovación y emprendimiento a través de cursos, actividades extracurriculares, centros de apoyos, alianzas, investigaciones y trabajos con asociaciones estudiantiles, entre otros, con el fin de expandir la mentalidad emprendedora</th>
                <th scope="col">5.3&nbsp;Fomentar&nbsp;la&nbsp;internacionalización a través de acuerdos de colaboración entre universidades locales y del exterior</th>
                <th scope="col">5.4&nbsp;Fortalecer&nbsp;los&nbsp;recursos&nbsp;humanos y tecnológicos de las oficinas de apoyo administrativo y de servicio para agilizar sus procesos internos</th>
                <th scope="col">5.5&nbsp;Propiciar&nbsp;el&nbsp;mejoramiento&nbsp;continuo de las capacidades, competencias y destrezas del personal docente y no docente</th>
                <th scope="col">5.6&nbsp;Promover&nbsp;una cultura de avalúo de renovación institucional y sustentabilidad</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
                <?
                // Establish a database connection
                include 'db_info.php';
                // Fetch data from the database
                $sql = "SELECT * FROM table54";
                $result = $conn->query($sql);
  
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['table53ID'] . "</td>";
                    echo "<td><input type='text' id='field1_" . $row['table54ID'] . "' value='" . $row['field1'] . "'></td>";
                    echo "<td><input type='text' id='field2_" . $row['table54ID'] . "' value='" . $row['field2'] . "'></td>";
                    echo "<td><input type='text' id='field3_" . $row['table54ID'] . "' value='" . $row['field3'] . "'></td>";
                    echo "<td><input type='text' id='field1_" . $row['table54ID'] . "' value='" . $row['field4'] . "'></td>";
                    echo "<td><input type='text' id='field2_" . $row['table54ID'] . "' value='" . $row['field5'] . "'></td>";
                    echo "<td><input type='text' id='field3_" . $row['table54ID'] . "' value='" . $row['field6'] . "'></td>";
                    echo "<td><a href='javascript:void(0);' onclick='updateTable54Row(" . $row['table54ID'] . ")'>Update</a></td>";
                    echo "<td><a href='delete.php?id=" . $row['table54ID'] . "'>Borrar</a></td>";
                    echo "</tr>";
                }
                // Close connection
                $conn->close();
            ?>
            </tbody>
        </table>
        <!-- Submit button -->
        <button class="formbold-btn">
            Submit
        </button>
    </div>
  </div>
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
</body>
</html>
