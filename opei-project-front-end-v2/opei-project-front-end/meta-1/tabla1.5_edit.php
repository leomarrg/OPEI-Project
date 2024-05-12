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
    <a class="underline-button" href="../meta-1/tabla1.5_display.php">Editar</a>
</div>


<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
        <h6>Tabla 1.5 Otros logros alcanzados por Objetivo y Actividad en la Meta 1</h6>
        
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">1.1&nbsp;la&nbsp;oferta&nbsp;académica&nbsp;mediante el desarrollo de&nbsp;programas académicos y cursos
                    pertinentes y competitivos en diversas&nbsp;modalidades&nbsp;que respondan a las&nbsp;necesidades del mercado laboral local e internacional</th>
                <th scope="col">1.2&nbsp;Fortalecer las&nbsp;comunidades de&nbsp;aprendizaje como apoyo a las
                    estrategias de retención, persistencia y&nbsp;graduación</th>
                <th scope="col">1.3&nbsp;Fomentar&nbsp;el&nbsp;desarrollo de&nbsp;propuestas&nbsp;académicas&nbsp;dirigidas&nbsp;a satisfacer&nbsp;las&nbsp;necesidades&nbsp;profesionales&nbsp;de la&nbsp;&nbsp;mediante&nbsp;iniciativas&nbsp;coordinadas por la&nbsp;División de&nbsp;Educación Continua y Estudios Profesionales
                    (DECEP) y programas similares en los&nbsp;departamentos académicos</th>
                <th scope="col">1.4&nbsp;Evaluar la política de educación general
                    para&nbsp;atemperarla&nbsp;al Perfil&nbsp;Estudiantil Puertorriqueño&nbsp;del Siglo XXI</th>
                <th scope="col">1.5&nbsp;Apoyar a los&nbsp;departamentos&nbsp;académicos en&nbsp;los&nbsp;trabajos&nbsp;dirigidos a la acreditación o reacreditación&nbsp;de sus programas</th>
                <th scope="col">1.6&nbsp;Promover&nbsp;una cultura&nbsp;académica&nbsp;orientada a evaluar los procesos de&nbsp;enseñanza
                    aprendizaje para mejorar&nbsp;la efectividad educativa</th>
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
                $sql = "SELECT * FROM table15";
                $result = $conn->query($sql);

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['table15ID'] . "</td>";
                    echo "<td><input type='text' id='field1_" . $row['table15ID'] . "' value='" . $row['field1'] . "'></td>";
                    echo "<td><input type='text' id='field2_" . $row['table15ID'] . "' value='" . $row['field2'] . "'></td>";
                    echo "<td><input type='text' id='field3_" . $row['table15ID'] . "' value='" . $row['field3'] . "'></td>";
                    echo "<td><input type='text' id='field4_" . $row['table15ID'] . "' value='" . $row['field4'] . "'></td>";
                    echo "<td><input type='text' id='field5_" . $row['table15ID'] . "' value='" . $row['field5'] . "'></td>";
                    echo "<td><input type='text' id='field6_" . $row['table15ID'] . "' value='" . $row['field6'] . "'></td>";
                    echo "<td><a href='javascript:void(0);' onclick='updateTable15Row(" . $row['table15ID'] . ")'>Update</a></td>";
                    echo "<td><a href='../meta-1/tabla1.5_delete.php?id=" . $row['table15ID'] . "'>Borrar</a></td>";
                    echo "</tr>";
                }

                // Close connection
                $conn->close();
            ?>
              </tr>
            </tbody>
        </table>
    </div>
</div>


    
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
