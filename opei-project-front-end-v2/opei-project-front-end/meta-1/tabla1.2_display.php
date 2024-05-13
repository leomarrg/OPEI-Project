
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

// Check if department name is retrieved
if (isset($department['DepartmentName'])) {
    // Store department name in a variable
    $departmentName = $department['DepartmentName'];
} else {
    // Handle the case where department name is not retrieved
    $departmentName = "Unknown Department";
}

// Get current year
$year = date("Y");
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
            
        <title>UPRA Reports Tabla 1-2 Editar</title>
    </head>
<body>
     <header>
        <h1 class="uprareports">UPRA Reports</h1>
        <h2 class="bienvenidosusuario"><?php echo $department['DepartmentName'] ?></h2>
        <h2 class="tablaheader">Tabla 1.2: Programas acreditados</h2>
        <h2 class="tablaheader"> Editar Informaci&oacute;n en la Tabla 1.2</h2>
     </header>


<!-- Main form -->
<div class="formbold-main-wrapper-edit">
    <div class="formbold-form-wrapper-edit">
    <?php
    


    
    // SQL query to retrieve data from table12 based on department and year
    $sql = "SELECT * FROM table12 WHERE DepartmentID = ? AND year = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("si", $departmentID, $year);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
if ($result->num_rows > 0) {
    // output data of each row
    echo "<table id='editable-table' class='table' style='font-size: 12px;'>
        <thead>
        <tr>
            
            <th scope='col' colspan='3'>Comunidades de Aprendizaje</th>
            <th scope='col' colspan='3'>Educación a Distancia</th>
            <th scope='col' colspan='3'>Programas COOP</th>
            <th scope='col' colspan='3'>Investigación</th>
            <th scope='col' colspan='3'>Internados / Prácticas</th>
            <th scope='col' colspan='3'>Cursos no Tradicionales</th>
            <th scope='col' class='editar-header'>Editar</th>
            <th scope='col' class='borrar-header'>Borrar</th>
            <th scope='col' class='salvar-header' style='display: none;'>Modo de editar</th>
        </tr>
        <tr>
            <th scope='col' style='display: none;'></th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Nocturnos</th>
            <th scope='col'>Sabatino</th>
            <th scope='col'>Trimestral</th>
            <th scope='col' class='editar-header'></th>
            <th scope='col' class='borrar-header'></th>
        </tr>
        </thead>
        <tbody>";
    // Initialize counter
    $counter = 1;

    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <form method='post' action='update_tabla12.php'>
                <input type='hidden' name='table12ID' value='<?php echo $row["table12ID"]; ?>'>
                
                <td class='editable-cell'><?php echo ($row["field1"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field1"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field1"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field2"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field2"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field2"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field3"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field3"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field3"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field4"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field4"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field4"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field5"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field5"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field5"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field6"] === 'option1') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field6"] === 'option2') ? 'x' : ''; ?></td>
                <td class='editable-cell'><?php echo ($row["field6"] === 'option3') ? 'x' : ''; ?></td>
                <td class='editar-column'><button class='edit-btn' onclick='showPopup(event, <?php echo json_encode($row); ?>)'>Editar</button></td>
                <td class='borrar-column'><a class='delete-btn' href='../meta-1/tabla1.2_delete.php?id=<?php echo $row['table12ID']; ?>'>Borrar</a></td>
                <td class='salvar-column' style='display: none;'>  <button type='submit' name='action12' value='salvar' class='salvar-btn'>Salvar Cambios</button></td>
            </form>
        </tr>
        <?php
        // Increment counter
        $counter++;
    }
} else {
    echo "<table class='table' style='margin: 0 auto;'>
        <thead>
        <tr>
            <th scope='col' style='display: none;'>#</th>
            <th scope='col' colspan='3'>Comunidades de Aprendizaje</th>
            <th scope='col' colspan='3'>Educación a Distancia</th>
            <th scope='col' colspan='3'>Programas COOP</th>
            <th scope='col' colspan='3'>Investigación</th>
            <th scope='col' colspan='3'>Internados / Prácticas</th>
            <th scope='col' colspan='3'>Cursos no Tradicionales</th>
        </tr>
        <tr>
            <th scope='col' style='display: none;'></th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Primer Semestre</th>
            <th scope='col'>Segundo Semestre</th>
            <th scope='col'>Verano</th>
            <th scope='col'>Nocturnos</th>
            <th scope='col'>Sabatino</th>
            <th scope='col'>Trimestral</th>
        </tr>
        </thead>
        </table>";
    echo "<h3 style='margin: 0 auto;text-align: center;
        padding: 10px;'>0 RESULTADOS</h3>";
}
?>
</tbody>
</table>
            <div class="formbold-main-wrapperDept">
                <a class="underline-button" href = "tabla1.2.php">Volver</a>
            </div>
        </form>
    </div>
</div>

    
    <!-- Add your footer box below -->
    <div class="footer-boxtabla1-2 ">
        <!-- Content for the footer box goes here -->
        <p>&copy; 2024 UPRA Reports. All rights reserved.</p>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        //Tabla 1.2's edit page
        const urlParams2 = new URLSearchParams(window.location.search);
        
        const year1 = urlParams2.get('year');

// Update the header with the department and year values


function showPopup(event, row) {
    event.preventDefault(); // Prevent default link behavior

    // Create a div element for the pop-up window
    var popup = document.createElement('div');
    popup.classList.add('popup');

    // Create a div element for the content of the pop-up
    var popupContent = document.createElement('div');
    popupContent.classList.add('popup-content');

    // Create HTML for the pop-up content using the row data
    var contentHTML = `
        <h2>Editar Datos</h2>
        <p>Comunidades de Aprendizaje: <br> 
            <select id="field1Dropdown">
                <option value="option1">Primer Semestre</option>
                <option value="option2">Segundo Semestre</option>
                <option value="option3">Verano</option>
            </select>
        </p>
        <p>Educación a Distancia: <br>
            <select id="field2Dropdown">
                <option value="option1">Primer Semestre</option> 
                <option value="option2">Segundo Semestre</option>
                <option value="option3">Verano</option>
            </select>
        </p>
        <p>Programas COOP: <br>
            <select id="field3Dropdown">
                <option value="option1">Primer Semestre</option>
                <option value="option2">Segundo Semestre</option>
                <option value="option3">Verano</option>
            </select>
        </p>
        <p>Investigación: <br>
            <select id="field4Dropdown">
                <option value="option1">Primer Semestre</option>
                <option value="option2">Segundo Semestre</option>
                <option value="option3">Verano</option>
            </select>
        </p>
        <p>Internados / Prácticas: <br>
            <select id="field5Dropdown">
                <option value="option1">Primer Semestre</option>
                <option value="option2">Segundo Semestre</option>
                <option value="option3">Verano</option>
            </select>
        </p>
        <p>Cursos no Tradicionales: <br>
            <select id="field6Dropdown">
                <option value="option1">Nocturnos</option>
                <option value="option2">Sabatino</option>
                <option value="option3">Trimestral</option>
            </select>
        </p>

        <button onclick="closePopup()">Cerrar</button>
        <button onclick="saveChanges(${row.table12ID})">Salvar Cambios</button>
    `;

    // Set the HTML content of the pop-up
    popupContent.innerHTML = contentHTML;

    // Append the pop-up content to the pop-up window
    popup.appendChild(popupContent);

    // Append the pop-up window to the document body
    document.body.appendChild(popup);
}

function closePopup() {
    // Remove the pop-up from the document body
    var popup = document.querySelector('.popup');
    if (popup) {
        popup.remove();
    }
}
function saveChanges(table12ID) {
    var field1Value = document.getElementById('field1Dropdown').value;
    var field2Value = document.getElementById('field2Dropdown').value;
    var field3Value = document.getElementById('field3Dropdown').value;
    var field4Value = document.getElementById('field4Dropdown').value;
    var field5Value = document.getElementById('field5Dropdown').value;
    var field6Value = document.getElementById('field6Dropdown').value;
    // Get other field values similarly

    var formData = new FormData();
    formData.append('table12ID', table12ID);
    formData.append('field1', field1Value);
    formData.append('field2', field2Value);
    formData.append('field3', field3Value);
    formData.append('field4', field4Value);
    formData.append('field5', field5Value);
    formData.append('field6', field6Value);
    // Append other fields similarly

    // Send the form data to the server
    fetch('update_tabla12.php', {
        method: 'POST',
        body: formData, // Set the body of the request to the FormData object
    })
    .then(response => {
        if (response.ok) {
            console.log('Changes saved successfully');
            closePopup();
            window.location.reload(); // Reload the page to reflect changes
        } else {
            console.error('Failed to save changes');
        }
    })
    .catch(error => {
        console.error('Error saving changes:', error);
    });
}  

    </script>
</body>
</html>
