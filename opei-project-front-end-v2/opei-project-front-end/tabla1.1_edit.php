<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-sidemenu.css">

    <title>Contact Form #2 - Page 1</title>
</head>

<body>
    <!-- Dropdown list -->
    <div class="formbold-main-wrapperDept">
        <a class="underline-button" href="tabla1.1.html">Volver</a>
    </div>

    <!-- Main form -->
    <div class="formbold-main-wrapper-edit">
        <div class="formbold-form-wrapper-edit">
            <h6>Tabla 1.1 A Acciones de Cursos</h6>
            <form action="tabla1.1-display.php" method="POST"> <!-- Specify action to tabla1.1-display.php -->
                <!-- Curso input text -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Curso</th>
                            <th scope="col" colspan="2">Acciones&nbsp;de&nbsp;Curso</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Breve&nbsp;descripción</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Output data of each row
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row['table11a'] . "</td>"; // Assuming 'id' is the primary key of the table
                          echo "<td>" . $row['curso'] . "</td>";
                          echo "<td colspan='2'>" . $row['acciones_curso'] . "</td>";
                          echo "<td>" . $row['estatus'] . "</td>";
                          echo "<td>" . $row['breve_descripcion'] . "</td>";
                          echo "<td><a href='edit.php?id=" . $row['id'] . "'>Editar</a></td>"; // Replace 'edit.php' with the actual URL for editing
                          echo "<td><a href='delete.php?id=" . $row['id'] . "'>Borrar</a></td>"; // Replace 'delete.php' with the actual URL for deletion
                          echo "</tr>";
                      }
                      ?>
                    </tbody>
                </table>
                <!-- Submit button -->
                <button class="formbold-btn">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <!-- Add your footer box below -->
    <div class="footer-boxtabla1-2 ">
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
