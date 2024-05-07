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

    <script>
        $(document).ready(function() {
            editRow25();
        });
    </script>

</head>
<body>
<header></header>

<!-- Dropdown list -->
<div class="formbold-main-wrapperDept">
    <a class="underline-button" href="tabla2.5.html">Editar</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
        <h6>Tabla 2.5 Otros logros alcanzados por Objetivo y Actividad en la Meta 2</h6>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">2.1&nbsp;Desarrollar&nbsp;y&nbsp;apoyar&nbsp;la divulgación&nbsp;de&nbsp;investigaciones&nbsp;científicas y proyectos de&nbsp;creación en&nbsp;conferencias, foros, revistas arbitradas y publicaciones aplicables.</th>
                <th scope="col">2.2&nbsp;Propiciar&nbsp;alianzas y acuerdos&nbsp;de&nbsp;colaboración&nbsp;entre los&nbsp;investigadores y&nbsp;creadores de&nbsp;UPRA y&nbsp;otras universidades e instituciones.</th>
                <th scope="col">2.3 Apoyar proyectos de investigación&nbsp;y&nbsp;creación dirigidos a&nbsp;la captación de fondos.</th>
                <th scope="col">2.4&nbsp;Propiciar&nbsp;la&nbsp;investigación&nbsp;estudiantil&nbsp;y&nbsp;las actividades de creación estudiantil bajo la mentoría de los profesores.</th>
                <th scope="col">2.5 Fomentar una cultura de avalúo en&nbsp;la&nbsp;investigación y creación.</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Establish a database connection
            include 'db_info.php';
            
            // Fetch data from the database
            $sql = "SELECT * FROM table25";
            $result = $conn->query($sql);
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['table25ID'] . "</td>";
                echo "<td>" . $row['field1'] . "</td>";
                echo "<td>" . $row['field2'] . "</td>";
                echo "<td>" . $row['field3'] . "</td>";
                echo "<td>" . $row['field4'] . "</td>";
                echo "<td>" . $row['field5'] . "</td>";
                echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                echo "<td><a href='../meta-2/tabla2.5_delete.php?id=" . $row['table25ID'] . "'>Borrar</a></td>";
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
