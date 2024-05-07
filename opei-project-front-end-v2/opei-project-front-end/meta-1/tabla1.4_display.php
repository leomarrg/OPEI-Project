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
    editRow14();
    });
    </script>
</head>
<body>
    <header></header>
       <!-- Dropdown list -->
<div class="formbold-main-wrapperDept">
    <a class="underline-button" href="../meta-1/tabla1.4.html">Volver</a>
</div>

<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
        <h6>Tabla 1.4 Estrategias de avalúo del aprendizaje</h6>
          
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Curso </th>
                <th scope="col">Estrategía&nbsp;de&nbsp;avalúo</th>
                <th scope="col">Indicadores</th>
                <th scope="col">Resultados&nbsp;obtenidos</th>
                <th scope="col">Acciones&nbsp;correctivas</th>
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
                $sql = "SELECT * FROM table14a";
                $result = $conn->query($sql);

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['table14aID'] . "</td>";
                    echo "<td>" . $row['field1'] . "</td>";
                    echo "<td>" . $row['field2'] . "</td>";
                    echo "<td>" . $row['field3'] . "</td>";
                    echo "<td>" . $row['field4'] . "</td>";
                    echo "<td>" . $row['field5'] . "</td>";
                    echo "<td><a href='javascript:void(0);' class='edit-btn'>Editar</a></td>";
                    echo "<td><a href='../meta-1/tabla1.4_delete.php?id=" . $row['table14aID'] . "'>Borrar</a></td>";
                    echo "</tr>";
                }
                // Close connection
                $conn->close();
            ?>
              </tr>
            </tbody>
        </table>
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
