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
        <script>
            function logout() {
                // Redirect to logout script
                window.location.href = "logout.php";
            }
    </script>
        <title>UPRA Reports Tabla 1-5</title>
    </head>
<body>
        <header>
            <h1 class="uprareports">UPRA Reports</h1>
            <h2 class="bienvenidosusuario"><?php echo $department['DepartmentName'] ?></h2>            <h2 class="tablaheader">Tabla 1.5: Otros logros alcanzados por Objetivo y Actividad en la Meta 1</h2>
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

            <div class="logout-wrapper">
        <button class="dashboardbtn" onclick="logout()">Logout</button>
        </div>
    
            <!-- Add more dashdropdown-wrapper for additional meta items -->
        </div>
    



<!-- Main form -->
<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        
        <!-- Nombre del programa académico acreditado input text -->
        <form id="myForm1_5">
        <h4 class="header1"> Llenar Informaci&oacute;n<br>  <br> Tabla 1.5: Otros logros alcanzados por Objetivo y Actividad en la Meta 1</h4>

            <div class="formbold-input-flex">
                <div>
                    <input
                        type="text"
                        name="obj1_1"
                        id="obj1_1"
                        placeholder="Logros..."
                        class="formbold-form-input"
                    />
                    <label for="obj1_1" class="formbold-form-label">1.1 Enriquecer la oferta académica mediante el desarrollo de programas académicos y cursos
                        pertinentes y competitivos en diversas modalidades que respondan a las necesidades del mercado laboral local e internacional</label>
                </div>
                <div>
                    <input
                        type="text"
                        name="obj1_2"
                        id="obj1_2"
                        placeholder="Logros..."
                        class="formbold-form-input"
                    />
                    <label for="obj1_2" class="formbold-form-label">1.2 Fortalecer las comunidades de aprendizaje como apoyo a las
                        estrategias de retención, persistencia y graduación<br><br><br></label>
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <input
                        type="text"
                        name="obj1_3"
                        id="obj1_3"
                        placeholder="Logros..."
                        class="formbold-form-input"
                    />
                    <label for="obj1_3" class="formbold-form-label">1.3 Fomentar el desarrollo de propuestas académicas dirigidas a satisfacer las necesidades profesionales de la comunidad mediante iniciativas coordinadas por la División de Educación Continua y Estudios Profesionales
                        (DECEP) y programas similares en los departamentos académicos</label>
                </div>
                <div>
                    <input
                        type="text"
                        name="obj1_4"
                        id="obj1_4"
                        placeholder="Logros..."
                        class="formbold-form-input"
                    />
                    <label for="obj1_4" class="formbold-form-label">1.4 Evaluar la política de educación general
                        para atemperarla al Perfil Estudiantil Puertorriqueño del Siglo XXI<br><br><br><br><br><br><br></label>
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <input
                        type="text"
                        name="obj1_5"
                        id="obj1_5"
                        placeholder="Logros..."
                        class="formbold-form-input"
                    />
                    <label for="obj1_5" class="formbold-form-label">1.5 Apoyar a los departamentos académicos en los
                        trabajos dirigidos a la acreditación o reacreditación de sus programas</label>
                </div>
                <div>
                    <input
                        type="text"
                        name="obj1_6"
                        id="obj1_6"
                        placeholder="Logros..."
                        class="formbold-form-input"
                    />
                    <label for="obj1_6" class="formbold-form-label">1.6 Promover una cultura académica orientada a evaluar los procesos de enseñanza
                        aprendizaje para mejorar la efectividad educativa</label>
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
            <a  class="underline-button"  href="../meta-1/tabla1.5_display.php">Editar</a>
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
