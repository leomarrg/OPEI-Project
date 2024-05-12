<?php
    // Start session
    session_start();
    
    // Check if the user is logged in
    if (!isset($_SESSION['UserID'])) {
        // Redirect the user to the login page if they are not logged in
        header("Location: ../signin.html");
        exit; // Ensure that script execution stops after redirection
    }


    // Include database connection using MySQLi
    include_once "db_info.php";

    // Prepare and execute query to fetch User details
    $UserID = $_SESSION['UserID'];
    $sql = "SELECT `Name`, `DepartmentID` FROM `usuario` WHERE `UserID` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $UserID);
    $stmt->execute();
    $result = $stmt->get_result();
    $userDetails = $result->fetch_assoc();

    // Store user's name and department ID in session variables
    $_SESSION['userName'] = $userDetails['Name'];
    $_SESSION['DepartmentID'] = $userDetails['DepartmentID'];

    // Check if DepartmentID exists in the session
    if (isset($_SESSION['DepartmentID'])) {
        // Retrieve the DepartmentID of the logged-in user from the session
        $departmentID = $_SESSION['DepartmentID'];

        // Query the departamento table to get the department name
        $sql = "SELECT DepartmentName FROM departamento WHERE DepartmentID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $departmentID);
        $stmt->execute();
        $result = $stmt->get_result();
        $department = $result->fetch_assoc();

    } 
?>
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
        <title>UPRA Reports Tabla 5-4</title>
    </head>
<body>
        <header> 
            <h1 class="uprareports">UPRA Reports</h1>
            <h2 class="bienvenidosusuario"><?php echo $department['DepartmentName'] ?></h2>
            <h2 class="tablaheader">Tabla 5.4: Otros logros alcanzados por Objetivo y Actividad en la Meta 5</h2>
            <h2 class="tablaheader"> Llenar Informaci&oacute;n en la Tabla 5.4</h2>
        </header>
    
        <input type="checkbox" id="check">
        <label for="check">
            <p class="fas fa-bars" id="btn">Metas</p>
            <p class="fas fa-times" id="cancel">Cerrar</p>
        </label>
        <div class="sidebar">
    
            <div class="dashdropdown-wrapper">
                <div class="dashdropdown">
                    <button class="dashboardbtn" onclick="toggleDropdown('myDropdown1')">Meta 1</button>
                    <div class="dashboard-content" id="myDropdown1">
                        <a href="../meta-1/tabla1.1.php">Tabla 1.1A</a>
                        <a href="../meta-1/tabla1.1B.php">Tabla 1.1B</a>
                        <a href="../meta-1/tabla1.2.php">Tabla 1.2</a>
                        <a href="../meta-1/tabla1.3.php">Tabla 1.3</a>
                        <a href="../meta-1/tabla1.4.php">Tabla 1.4</a>
                        <a href="../meta-1/tabla1.4B.php">Tabla 1.4B</a>
                        <a href="../meta-1/tabla1.5.php">Tabla 1.5</a>
                    </div>
                </div>
            </div>
    
            <div class="dashdropdown-wrapper">
                <div class="dashdropdown">
                    <button class="dashboardbtn" onclick="toggleDropdown('myDropdown2')">Meta 2</button>
                    <div class="dashboard-content" id="myDropdown2">
                        <a href="../meta-2/tabla2.1A.php">Tabla 2.1A</a>
                        <a href="../meta-2/tabla2.1B.php">Tabla 2.1B</a>
                        <a href="../meta-2/tabla2.2.php">Tabla 2.2</a>
                        <a href="../meta-2/tabla2.3.php">Tabla 2.3</a>
                        <a href="../meta-2/tabla2.4.php">Tabla 2.4</a>
                        <a href="../meta-2/tabla2.5.php">Tabla 2.5</a>
                    </div>
                </div>
            </div>
    
            <div class="dashdropdown-wrapper">
                <div class="dashdropdown">
                    <button class="dashboardbtn" onclick="toggleDropdown('myDropdown3')">Meta 3</button>
                    <div class="dashboard-content" id="myDropdown3">
                        <a href="../meta-3/tabla3.1.php">Tabla 3.1</a>
                        <a href="../meta-3/tabla3.2.php">Tabla 3.2</a>
                        <a href="../meta-3/tabla3.2B.php">Tabla 3.2B</a>
                        <a href="../meta-3/tabla3.3.php">Tabla 3.3</a>
                    </div>
                </div>
            </div>
    
            <div class="dashdropdown-wrapper">
                <div class="dashdropdown">
                    <button class="dashboardbtn" onclick="toggleDropdown('myDropdown4')">Meta 4</button>
                    <div class="dashboard-content" id="myDropdown4">
                        <a href="../meta-4/tabla4.1.php">Tabla 4.1</a>
                        <a href="../meta-4/tabla4.2.php">Tabla 4.2</a>
                        <a href="../meta-4/tabla4.3.php">Tabla 4.3</a>
                    </div>
                </div>
            </div>
    
            <div class="dashdropdown-wrapper">
                <div class="dashdropdown">
                    <button class="dashboardbtn" onclick="toggleDropdown('myDropdown5')">Meta 5</button>
                    <div class="dashboard-content" id="myDropdown5">
                        <a href="../meta-5/tabla5.1.php">Tabla 5.1</a>
                        <a href="../meta-5/tabla5.2.php">Tabla 5.2</a>
                        <a href="../meta-5/tabla5.3.php">Tabla 5.3</a>
                        <a href="../meta-5/tabla5.4.php">Tabla 5.4</a>
                    </div>
                </div>
            </div>
    
            <!-- Add more dashdropdown-wrapper for additional meta items -->
        </div>



<!-- Main form -->
<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form id="myForm5_4">
        <!-- Nombre del programa académico acreditado input text -->
        <div class="formbold-input-flex">
            <div>
                <input
                    type="text"
                    name="obj5_1"
                    id="obj5_1"
                    placeholder="Logros..."
                    class="formbold-form-input"
                />
                <label for="obj5_1" class="formbold-form-label">5.1 Incrementar las fuentes internas y externa para generar nuevos ingresos y alcanzar las metas propuestas de sustentabilidad financiera<br><br><br><br><br></label>
            </div>
            <div>
                <input
                    type="text"
                    name="obj5_2"
                    id="obj5_2"
                    placeholder="Logros..."
                    class="formbold-form-input"
                />
                <label for="obj5_2" class="formbold-form-label">5.2 Desarrollar un ecosistema de empresarismo, innovación y emprendimiento a través de cursos, actividades extracurriculares, centros de apoyos, alianzas, investigaciones y trabajos con asociaciones estudiantiles, entre otros, con el fin de expandir la mentalidad emprendedora</label>
            </div>
        </div>
  
        <div class="formbold-input-flex">
            <div>
                <input
                    type="text"
                    name="obj5_3"
                    id="obj5_3"
                    placeholder="Logros..."
                    class="formbold-form-input"
                />
                <label for="obj5_3" class="formbold-form-label">5.3 Fomentar la internacionalización a través de acuerdos de colaboración entre universidades locales y del exterior<br><br></label>
            </div>
            <div>
                <input
                    type="text"
                    name="obj5_4"
                    id="obj5_4"
                    placeholder="Logros..."
                    class="formbold-form-input"
                />
                <label for="obj5_4" class="formbold-form-label">5.4 Fortalecer los recursos humanos y tecnológicos de las oficinas de apoyo administrativo y de servicio para agilizar sus procesos internos</label>
            </div>
        </div>
  
        <div class="formbold-input-flex">
            <div>
                <input
                    type="text"
                    name="obj5_5"
                    id="obj5_5"
                    placeholder="Logros..."
                    class="formbold-form-input"
                />
                <label for="obj5_5" class="formbold-form-label">5.5 Propiciar el mejoramiento continuo de las capacidades, competencias y destrezas del personal docente y no docente</label>
            </div>
            <div>
                <input
                    type="text"
                    name="obj5_6"
                    id="obj5_6"
                    placeholder="Logros..."
                    class="formbold-form-input"
                />
                <label for="obj5_6" class="formbold-form-label">5.6 Promover una cultura de avalúo de renovación institucional y sustentabilidad<br><br></label>
            </div>
        </div>
        <div class="formbold-input-flex">
        </div>
        <div class="formbold-input-flex">
        </div>
        <!-- Submit button -->
        <button class="formbold-btn">
            Submit
        </button>
        <a class="underline-button" href="tabla5.4_display.php">Editar</a>
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