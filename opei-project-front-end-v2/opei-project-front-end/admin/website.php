<?php
    // Start session
    session_start();

    // Check if admin session is not set, redirect to signin.html
    if (!isset($_SESSION['adminID'])) {
        header("Location: ../signin.html");
        exit();
    }

    // Include database connection
    include_once "db_info.php";

    // Prepare and execute query to fetch admin details
    $adminID = $_SESSION['adminID'];
    $sql = "SELECT `Name` FROM `admin` WHERE `adminID` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $adminID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch admin's name
    $adminName = "";
    if ($row = $result->fetch_assoc()) {
        $adminName = $row['Name'];
    }

    // Store admin's name in session variable
    $_SESSION['adminName'] = $adminName;
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
        <!-- Dropdown menu -->
        <div class="Adminbtn">
        <button class="dropbtn"><?php echo $_SESSION['adminName']; ?></button>
            <div class="Admin-content">
                <a href="signup.php">Registrar Usuario Nuevo</a>
                <a href="viewusers.php">Administrar Cuentas</a>
                <a href="logout.php" >Cerrar Session</a>
            </div>
        </div>
        <h1 class="uprareports">UPRA Reports</h1>
        <div class="menu-bar">
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-1', 'CCOM', this)">CCOM</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-2', 'ADEM', this)">ADEM</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-3', 'COMU', this)">COMU</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-4', 'ENFE', this)">ENFE</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-5', 'BIOL', this)">BIOL</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-6', 'CISO', this)">CISO</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-7','INGL', this)">INGL</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-8','ESPA', this)">ESPA</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-9','MATE', this)">MATE</a>
            <a href="javascript:void(0)" class="menu-option-bar" onclick="showOptions('set-10','HUMA', this)">HUMA</a>
        </div>
        
    </header>

    <div class="welcome-container" id="welcome-text">
        <p>Bienvenidos a UPRA Reports</p>
        <p>Presiona un departamento arriba para ver las metas</p>
        

       
    </div>
    <div class="year-container" id="active-set-text"></div>
    <div class="year-container" id="year-text">
        <select id="yearDropdown">
            <option value="2024">2024-2025</option>
            <option value="2025">2025-2026</option>
            <option value="2026">2026-2027</option>
            <option value="2027">2027-2028</option>
            <option value="2028">2028-2029</option>
            <option value="2029">2029-2030</option>
            <option value="2030">2030-2031</option>
            <option value="2031">2031-2032</option>
            <option value="2032">2032-2033</option>
            <option value="2033">2033-2034</option>
          </select>
    </div>
    <div class="menu-container set-1">
        <a href="meta1.php?department=CCOM&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=CCOM&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=CCOM&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=CCOM&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=CCOM&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=CCOM&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>    

    <div class="menu-container set-2">
        <a href="meta1.php?department=ADEM&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=ADEM&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=ADEM&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=ADEM&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=ADEM&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=ADEM&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>

    <div class="menu-container set-3">
        <a href="meta1.php?department=COMU&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=COMU&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=COMU&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=COMU&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=COMU&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=COMU&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>

    </div>
    <div class="menu-container set-4">
        <a href="meta1.php?department=ENFE&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=ENFE&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=ENFE&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=ENFE&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=ENFE&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=ENFE&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>
    <div class="menu-container set-5">
        <a href="meta1.php?department=BIOL&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=BIOL&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=BIOL&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=BIOL&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=BIOL&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=BIOL&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>
    <div class="menu-container set-6">
        <a href="meta1.php?department=CISO&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=CISO&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=CISO&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=CISO&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=CISO&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=CISO&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>
    <div class="menu-container set-7">
        <a href="meta1.php?department=INGL&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=INGL&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=INGL&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=INGL&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=INGL&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=CCOM&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>
    <div class="menu-container set-8">
        <a href="meta1.php?department=ESPA&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=ESPA&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=ESPA&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=ESPA&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=ESPA&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=ESPA&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>
    <div class="menu-container set-9">
        <a href="meta1.php?department=MATE&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=MATE&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=MATE&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=MATE&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=MATE&year=2024" class="menu-option year-link">Meta 5</a>
        <a href="exportar_excel.php?department=MATE&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>
    <div class="menu-container set-10">
        <a href="meta1.php?department=HUMA&year=2024" class="menu-option year-link">Meta 1</a>
        <a href="meta2.php?department=HUMA&year=2024" class="menu-option year-link">Meta 2</a>
        <a href="meta3.php?department=HUMA&year=2024" class="menu-option year-link">Meta 3</a>
        <a href="meta4.php?department=HUMA&year=2024" class="menu-option year-link">Meta 4</a>
        <a href="meta5.php?department=HUMA&year=2024" class="menu-option year-link">Meta 5</a> 
        <a href="exportar_excel.php?department=HUMA&year=2024" class="table-option, menu-option year-link">Exportar a Excel</a>
    </div>
    <div class="footer-box">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>
    <script src="js/mainmenu.js"></script>
    <script>
        //Main menu Admin info dropdown
        function toggleAdminContent() {
            var adminContent = document.querySelector('.Admin-content');
            adminContent.classList.toggle('active');
        }

        var menuButton = document.querySelector('.dropbtn');
        menuButton.addEventListener('click', toggleAdminContent);
    </script>
</body>
</html>
