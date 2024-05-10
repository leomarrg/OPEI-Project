<?php
    session_start();
    include 'db_info.php';

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

   // Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $role = $_POST["role"];
    $department_name = isset($_POST["department"]) ? $_POST["department"] : null;

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($role == "admin") {
        // Insert into admin table
        $sql = "INSERT INTO admin (Email, Password, Name, LastName) VALUES ('$email', '$hashed_password', '$firstname', '$lastname')";
    } elseif ($role == "user") {
        // Get DepartmentID based on department name
        $get_department_id_query = "SELECT DepartmentID FROM departamento WHERE DepartmentName = '$department_name'";
        $department_id_result = $conn->query($get_department_id_query);
        
        if ($department_id_result->num_rows > 0) {
            $row = $department_id_result->fetch_assoc();
            $department_id = $row["DepartmentID"];
            
            // Insert into user table
            $sql = "INSERT INTO usuario (Email, Password, DepartmentID, Name, LastName) VALUES ('$email', '$hashed_password', '$department_id', '$firstname', '$lastname')";
        } else {
            echo "Error: Invalid department selected";
            exit(); // Exit script if invalid department is selected
        }
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: viewusers.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
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
            <a href='website.php' class="backmainmenu"><h1>UPRA Reports</h1></a>
              <h3 class="metaheader">Registrar Usuario Nuevo</h3>
          </header>
          <form action="#" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
          
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
          
            <label for="firstname">First Name:</label><br>
            <input type="text" id="firstname" name="firstname" required><br>
          
            <label for="lastname">Last Name:</label><br>
            <input type="text" id="lastname" name="lastname" required><br>
          
            <label for="role">Role:</label><br>
            <select id="role" name="role" required onchange="showDepartmentDropdown()">
              <option value="" selected disabled>Select Role</option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select><br>
          
            <div id="departmentDropdown" style="display: none;">
                <label for="department">Department:</label><br>
                <select id="department" name="department">
                    <option value="" selected disabled>Select Department</option>
                    <option value="CCOM">CCOM</option>
                    <option value="ADEM">ADEM</option>
                    <option value="COMU">COMU</option>
                    <option value="ENFE">ENFE</option>
                    <option value="BIOL">BIOL</option>
                    <option value="CISO">CISO</option>
                    <option value="INGL">INGL</option>
                    <option value="ESPA">ESPA</option>
                    <option value="MATE">MATE</option>
                    <option value="HUMA">HUMA</option>
                </select><br>
            </div>
          
            <input type="submit" value="Submit">
          </form>
        <div class="footer-box">
            <!-- Content for the footer box goes here -->
            <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
        </div>
        <script src="js/mainmenu.js"></script>
    </body>
    </html>