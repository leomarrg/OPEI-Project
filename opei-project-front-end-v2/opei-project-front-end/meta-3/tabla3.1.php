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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function logout() {
            // Redirect to logout script
            window.location.href = "../logout.php";
        }
    </script>
    
    <title>UPRA Reports Tabla 3-1</title>
</head>
<body>
        <header>
            <h1 class="uprareports">UPRA Reports</h1>
            <h2 class="bienvenidosusuario"><?php echo $department['DepartmentName'] ?></h2>
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
      <form id="myForm3_1">
      <h4 class="header1"> Llenar Informaci&oacute;n<br>  <br>Tabla 3.1: Reconocimientos estudiantiles por departamento</h4>

        <!-- Curso input text -->
        <div class="formbold-input-flex">
            <div>
                <select 
                name="reconType"
                id="reconType"
                class="formbold-form-input"
                >
                <option value="0">Seleccione una opción...</option>
                <option value="Artístico">Artístico </option>
                <option value="Desportista del año">Desportista del año</option>
                <option value="Excelencia académica">Excelencia académica</option>
                <option value="Investigación">Investigación</option>
                <option value="Liderazgo">Liderazgo</option>
                <option value="Nominaciones">Nominaciones</option>
                <option value="Servicio Comunitario">Servicio Comunitario</option>
                <option value="Otro">Otro</option>
                </select>
                <label for="reconType" class="formbold-form-label">Tipo de Reconocimiento</label>
            </div>
        </div>

        <div class="formbold-input-flex">
          <div>
            <input
              type="text"
              name="cantEstRecon"
              id="cantEstRecon"
              placeholder="Escriba texto..."
              class="formbold-form-input"
            />
            <label for="cantEstRecon" class="formbold-form-label">Cantidad de Estudiantes Reconocidos (Valor numérico)</label>
          </div>
        </div>
         
             <!-- Breve descripcion -->
        <div class="formbold-input-flex">
          <!-- Breve descripcion -->
          <div>
            <input
              type="text"
              name="reconDescrip"
              id="reconDescrip"
              placeholder="Escriba texto..."
              class="formbold-form-input"
            />
            <label for="reconDescrip" class="formbold-form-label">Descripción del reconocimiento </label>
          </div>
        </div>

        <div class="formbold-input-flex">
            <!-- Breve descripcion -->
            <div>
              <input
                  type="text"
                  id="calendar"
                  name="calendar"
                  placeholder="Escoge una fecha..."
                  class="formbold-form-input"
              />
              <label for="calendar" class="formbold-form-label">Fecha:</label>
              <i class="fas fa-calendar-alt"></i>
          </div>
        </div>


        <div class="formbold-input-flex">
              <div>
                <input
                  type="text"
                  name="otorgaRecon"
                  id="otorgaRecon"
                  placeholder="Escriba texto..."
                  class="formbold-form-input"
                />
                <label for="otorgaRecon" class="formbold-form-label">Organismo que otorga el reconocimiento</label>
              </div>
          </div>
        <!-- Submit button -->
        <button class="formbold-btn">Submit</button>
        <a class="underline-button" href="tabla3.1_display.php">Editar</a>
      </form>
    </div>
  </div>
    <!-- Add your footer box below -->
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
    <script>
        $(function() {
            $('#calendar').datepicker({
                dateFormat: 'yy-mm-dd' // Set the desired date format
            });
        });
    </script>
</body>
</html>
