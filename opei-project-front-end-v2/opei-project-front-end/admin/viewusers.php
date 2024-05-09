<?php
include 'db_info.php';

// Query to retrieve data from admin table
$adminQuery = "SELECT * FROM admin";
$adminResult = mysqli_query($conn, $adminQuery);

// Query to retrieve data from usuario table with department name
$usuarioQuery = "SELECT usuario.*, departamento.DepartmentName 
                 FROM usuario 
                 LEFT JOIN departamento ON usuario.DepartmentID = departamento.DepartmentID";
$usuarioResult = mysqli_query($conn, $usuarioQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPRA Reports</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
    <header>
        <a href='website.php' class="backmainmenu"><h1>UPRA Reports</h1></a>
        <h2 class="metaheader">Administración De Cuentas</span></h2>
    </header>

    <br> <br>
    <!-- Admin Table -->
<table class='table' id="admin-table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Activo</th>
            <th>Editar Administración</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($adminResult)) { ?>
            <tr>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td>
                    <button class="active-toggle" data-id="<?php echo $row['adminID']; ?>" data-active="<?php echo $row['Active']; ?>">
                        <?php echo $row['Active'] == 1 ? 'Active' : 'Inactive'; ?>
                    </button>
                </td>
                <td>
                    <a href='#' class='editar-btn' onclick="showAdminPopup(event, <?php echo htmlspecialchars(json_encode($row)); ?>)">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

    <br><br><br>
    <!-- Usuario Table -->
    <table class='table' id="usuario-table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Department</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Activo</th>
                <th>Editar Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($usuarioResult)) { ?>
                <tr>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['DepartmentName']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['LastName']; ?></td>
                    <td>
                        <button class="active-toggle" data-id="<?php echo $row['UserID']; ?>" data-active="<?php echo $row['Active']; ?>">
                            <?php echo $row['Active'] == 1 ? 'Active' : 'Inactive'; ?>
                        </button>
                    </td>
                    <!-- Pass row data as JSON to the showUsuarioPopup function -->
                    <td><a href='#' class='editar-btn' onclick="showPopup(event, <?php echo htmlspecialchars(json_encode($row)); ?>)">Editar</a></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>


    <div class="footer-box">
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
    <script src="js/viewusers.js"></script>
</body>
</html>
