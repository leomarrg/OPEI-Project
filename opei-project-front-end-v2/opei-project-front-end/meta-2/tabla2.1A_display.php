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
    <!-- Add jQuery UI library -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>Contact Form #2 - Page 1</title>

    <script>
      $(document).ready(function() {
        editRow21a();
      });
    </script>
</head>
<body>
    <header></header>

    <!-- Dropdown list -->
    <div class="formbold-main-wrapperDept">
        <a class="underline-button" href="../meta-2/tabla2.1A.html">Editar</a>
    </div>

    <!-- Main form -->
    <div class="formbold-main-wrapper-edit">
        <div class="formbold-form-wrapper-edit">
            <h6>Tabla 2.1A Actividades de publicación divulgadas llevadas a cabo por la facultad</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profesor</th>
                        <th scope="col">Título de la actividad</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Publicada</th>
                        <th scope="col">Clasificación de la publicación</th>
                        <th scope="col">*Tipo de Publicación</th>
                        <th scope="col">Auspiciada por el CIC</th>
                        <th scope="col">Entidad que publica</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Establish a database connection
                        include 'db_info.php';

                        // Fetch data from the database
                        $sql = "SELECT * FROM table21a";
                        $result = $conn->query($sql);

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['table21aID'] . "</td>";
                            echo "<td>" . $row['field1'] . "</td>";
                            echo "<td>" . $row['field2'] . "</td>";
                            echo "<td>" . $row['field3'] . "</td>";
                            echo "<td>" . $row['field4'] . "</td>";
                            echo "<td>" . $row['field5'] . "</td>";
                            echo "<td>" . $row['field6'] . "</td>";
                            echo "<td>" . $row['field7'] . "</td>";
                            echo "<td>" . $row['field8'] . "</td>";
                            echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                            echo "<td><a href='../meta-2/tabla2.1a_delete.php?id=" . $row['table21aID'] . "'>Borrar</a></td>";
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
