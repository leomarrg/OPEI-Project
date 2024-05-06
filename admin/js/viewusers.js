// Add event listeners to active-toggle buttons
document.querySelectorAll('.active-toggle').forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the ID and active state from the button's data attributes
        var id = this.getAttribute('data-id');
        var active = this.getAttribute('data-active');

        // Toggle the active state
        var newActive = active == 1 ? 0 : 1;

        // Send an AJAX request to update the active state in the database
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update the button text and data-active attribute 
                    button.textContent = newActive == 1 ? 'Active' : 'Inactive';
                    button.setAttribute('data-active', newActive);
                } else {
                    console.error('Failed to toggle active state.');
                }
            }
        };
        xhr.open('POST', 'toggle_active.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('id=' + id + '&value=' + newActive);
    });
});

//Pop up for editing the user details
function showPopup(event, row) {
    event.preventDefault(); // Prevent default link behavior

    // Create a div element for the pop-up window
    var popup = document.createElement('div');
    popup.classList.add('popup');

    // Create a div element for the content of the pop-up
    var popupContent = document.createElement('div');
    popupContent.classList.add('popup-content');

    // Create HTML for the department options
    var departmentOptions = `
        <option value="1">CCOM</option>
        <option value="2">ADEM</option>
        <option value="3">COMU</option>
        <option value="4">ENFE</option>
        <option value="5">BIOL</option>
        <option value="6">CISO</option>
        <option value="7">INGL</option>
        <option value="8">ESPA</option>
        <option value="9">MATE</option>
        <option value="10">HUMA</option>
    `;

    // Create HTML for the pop-up content using the row data
    var contentHTML = `
        <h2>Editar Datos</h2>
        <p>Email: <input type="email" id="emailInput" value="${row.Email}" required></p>
        <p>Department: 
            <select id="departmentInput">
                ${departmentOptions}
            </select>
        </p>
        <p>Name: <input type="text" id="nameInput" value="${row.Name}"></p>
        <p>Last Name: <input type="text" id="lastNameInput" value="${row.LastName}"></p>
        <!-- Add other fields as needed -->

        <!-- Include your dropdown menus and buttons here -->

        <button onclick="closePopup()">Cerrar</button>
        <button onclick="saveChanges(${row.UserID})">Salvar Cambios</button>
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

function saveChanges(userID) {
    var emailValue = document.getElementById('emailInput').value;
    var departmentValue = document.getElementById('departmentInput').value;
    var nameValue = document.getElementById('nameInput').value;
    var lastNameValue = document.getElementById('lastNameInput').value;
    
    // Check if email is a valid email address
    if (!validateEmail(emailValue)) {
        alert('Por favor, introduce una dirección de correo electrónico válida.');
        return; // Stop further execution if email is not valid
    }

    // Check if any of the values are null
    if (!emailValue || !departmentValue || !nameValue || !lastNameValue) {
        alert('Por favor, completa todos los campos.');
        return; // Stop further execution if any field is null
    }

    // Construct FormData object with field values and userID
    var formData = new FormData();
    formData.append('userID', userID);
    formData.append('email', emailValue);
    formData.append('department', departmentValue);
    formData.append('name', nameValue);
    formData.append('lastName', lastNameValue);

    // Send FormData object to server using fetch API
    fetch('update_user.php', {
        method: 'POST',
        body: formData,
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

// Function to validate email address
function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Pop up for editing Admin account details 
// Pop up for editing Admin account details 
function showAdminPopup(event, row) {
    event.preventDefault(); // Prevent default link behavior

    // Create a div element for the pop-up window
    var popup = document.createElement('div');
    popup.classList.add('popup');

    // Create a div element for the content of the pop-up
    var popupContent = document.createElement('div');
    popupContent.classList.add('popup-content');

    // Create HTML for the pop-up content using the row data
    var contentHTML = `
        <h2>Editar Administración</h2>
        <p>Email: <input type="email" id="adminEmailInput" value="${row.Email}" required></p>
        <p>Name: <input type="text" id="adminNameInput" value="${row.Name}" required></p>
        <p>Last Name: <input type="text" id="adminLastNameInput" value="${row.LastName}" required></p>
        <!-- Add other fields as needed -->

        <button onclick="closeAdminPopup()">Cerrar</button>
        <button id="saveAdminChangesBtn" onclick="saveAdminChanges(${row.adminID})">Salvar Cambios</button>
    `;

    // Set the HTML content of the pop-up
    popupContent.innerHTML = contentHTML;

    // Append the pop-up content to the pop-up window
    popup.appendChild(popupContent);

    // Append the pop-up window to the document body
    document.body.appendChild(popup);
}

// Function to close the admin edit pop-up
function closeAdminPopup() {
    // Remove the pop-up from the document body
    var popup = document.querySelector('.popup');
    if (popup) {
        popup.remove();
    }
}

// Function to save changes for admin users
function saveAdminChanges(adminID) {
    var emailValue = document.getElementById('adminEmailInput').value;
    var nameValue = document.getElementById('adminNameInput').value;
    var lastNameValue = document.getElementById('adminLastNameInput').value;

    // Check if email is valid using regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailValue)) {
        alert('Por favor, ingresa una dirección de correo electrónico válida.');
        return;
    }

    // Check if any input values are null
    if (emailValue.trim() === '' || nameValue.trim() === '' || lastNameValue.trim() === '') {
        alert('Por favor, completa todos los campos antes de guardar.');
        return;
    }

    // If all conditions are met, proceed to save changes
    // Construct FormData object with field values and adminID
    var formData = new FormData();
    formData.append('adminID', adminID);
    formData.append('email', emailValue);
    formData.append('name', nameValue);
    formData.append('lastName', lastNameValue);

    // Send the FormData object to the server using fetch API
    fetch('update_admin.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            console.log('Changes saved successfully');
            closeAdminPopup();
            window.location.reload();
        } else {
            console.error('Failed to save changes');
        }
    })
    .catch(error => {
        console.error('Error saving changes:', error);
    });
}
