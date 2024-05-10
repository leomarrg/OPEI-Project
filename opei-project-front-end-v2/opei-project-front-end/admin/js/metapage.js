const urlParams2 = new URLSearchParams(window.location.search);
const department1 = urlParams2.get('department');
const year1 = urlParams2.get('year');

// Update the header with the department and year values
document.getElementById('departmentHeader').innerText = department1;
document.getElementById('year').innerText2 = year1;

//Input toggle for the "Editar" button
function makeEditable(event) {
    // Prevent the default behavior of the link
    event.preventDefault();

    // Get the parent form element of the clicked link
    var form = event.target.closest('form');

    // Find the parent row of the clicked "Editar" button
    var row = event.target.closest('tr');

    // Find all "Salvar Cambios" buttons and hide them
    var allSalvarButtons = document.querySelectorAll('.salvar-btn');
    allSalvarButtons.forEach(function(button) {
        button.style.display = 'none';
    });

    // Find all "Editar" buttons and show them
    var allEditarButtons = document.querySelectorAll('.editar-btn');
    allEditarButtons.forEach(function(button) {
        button.style.display = 'inline-block';
    });

    // Find all "Borrar" buttons and show them
    var allBorrarButtons = document.querySelectorAll('.borrar-btn');
    allBorrarButtons.forEach(function(button) {
        button.style.display = 'inline-block';
    });

    // Find all "editable" inputs and make them writable
    var inputs = row.querySelectorAll('.editable');
    inputs.forEach(function(input) {
        input.removeAttribute('readonly');
    });

    // Find the "Salvar Cambios" button in the same row and make it visible
    var salvarButton = row.querySelector('.salvar-btn');
    salvarButton.style.display = 'inline-block';

    // Hide all "Salvar" headers and columns in the table
    var salvarHeader = document.querySelectorAll('.salvar-header');
    salvarHeader.forEach(function(header) {
        header.style.display = 'table-cell';
    });

    var salvarColumns = document.querySelectorAll('.salvar-column');
    salvarColumns.forEach(function(column) {
        column.style.display = 'table-cell';
    });

    // Hide the clicked "Editar" button
    event.target.style.display = 'none';

    // Hide the "Editar" and "Borrar" headers and columns in the table
    var editarHeader = document.querySelectorAll('.editar-header');
    editarHeader.forEach(function(header) {
        header.style.display = 'none';
    });

    var borrarHeader = document.querySelectorAll('.borrar-header');
    borrarHeader.forEach(function(header) {
        header.style.display = 'none';
    });

    var editarColumns = document.querySelectorAll('.editar-column');
    editarColumns.forEach(function(column) {
        column.style.display = 'none';
    });

    var borrarColumns = document.querySelectorAll('.borrar-column');
    borrarColumns.forEach(function(column) {
        column.style.display = 'none';
    });
}

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
    fetch('update_database.php', {
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
// Update the header with the department value
document.getElementById('departmentHeader').innerText = department;

//Selected year makes it so the url becomes that year
document.addEventListener("DOMContentLoaded", function() {
  var yearDropdown = document.getElementById("yearDropdown");

  // Check if the element exists before adding the event listener
  if (yearDropdown) {
      yearDropdown.addEventListener("change", function() {
          var selectedYear = this.value;
          var yearLinks = document.querySelectorAll(".year-link");

          console.log("Selected Year:", selectedYear);

          yearLinks.forEach(function(link) {
              var href = link.getAttribute("href");
              console.log("Original Href:", href);
              var newHref = href.replace(/year=\d{4}/, "year=" + selectedYear);
              console.log("New Href:", newHref);
              link.setAttribute("href", newHref);
          });
      });
  }

  // Get department from URL parameters
  const urlParams = new URLSearchParams(window.location.search);
  const department = urlParams.get('department');

  // Update the header with the department value if it's not null
  var departmentHeader = document.getElementById('departmentHeader');
  if (departmentHeader && department !== null) {
      departmentHeader.innerText = department;
  }
});

function toggleAdminContent() {
    var adminContent = document.querySelector('.Admin-content');
    adminContent.classList.toggle('active');
}

var menuButton = document.querySelector('.dropbtn');
menuButton.addEventListener('click', toggleAdminContent);
/*
// Editar Tabla12
function editRow(event) {
    event.preventDefault(); // Prevent default link behavior
    
    // Get the table row corresponding to the clicked "Editar" button
    var row = event.target.closest('tr');
    
    // Merge cells in groups of three
    mergeCells(row);
    
    // Hide the "Editar" button
    var editarColumn = row.querySelector('.editar-column');
    editarColumn.style.display = 'none';
    
    // Show the "Salvar Cambios" button
    var salvarColumn = row.querySelector('.salvar-column');
    salvarColumn.style.display = '';
    
    // Show the form for salvar button
    var salvarForm = row.querySelector('.salvar-form');
    salvarForm.style.display = 'table-row';
    
    // Highlight buttons based on database values
    highlightButtons(row);
}

// Function to highlight buttons based on database values
function highlightButtons(row) {
    var cells = row.querySelectorAll('.editable-cell');
    cells.forEach(function(cell, index) {
        var value = cell.getAttribute('data-field-value');
        var buttons = cell.querySelectorAll('.option-button');
        buttons.forEach(function(button) {
            if (button.textContent.trim() === value) {
                button.classList.add('selected');
            }
        });
    });
}

// Function to merge cells in groups of three
function mergeCells(row) {
    // Get all cells in the row except the first one and the last three
    var cells = row.querySelectorAll('td:not(:first-child):not(:nth-last-child(-n+3))');
    
    // Iterate over the cells in groups of three
    for (var i = 0; i < cells.length; i += 3) {
        // Set colspan='3' for the first cell in each group
        var cell = cells[i];
        cell.setAttribute('colspan', 3);
        
        // Hide the next two cells
        var nextCell = cell.nextElementSibling;
        nextCell.style.display = 'none';
        var thirdCell = nextCell.nextElementSibling;
        thirdCell.style.display = 'none';
        
        // Create buttons for "option1", "option2", and "option3"
        var optionButtons = createOptionButtons();
        
        // Replace the content of the cell with the buttons
        cell.textContent = '';
        cell.append(...optionButtons);
    }
}

// Function to create buttons for "option1", "option2", and "option3"
function createOptionButtons() {
    var buttons = [];
    for (var i = 1; i <= 3; i++) {
        var button = document.createElement('button');
        button.textContent = 'option' + i;
        button.classList.add('option-button');
        button.addEventListener('click', highlightOption);
        buttons.push(button);
        
        // Add space between buttons (except for the last button)
        if (i !== 3) {
            var space = document.createTextNode('            ');
            buttons.push(space);
        }
    }
    return buttons;
}

// Function to handle the click event for option buttons
function highlightOption(event) {
    var buttons = event.target.parentElement.querySelectorAll('.option-button');
    buttons.forEach(function(button) {
        if (button !== event.target) {
            button.classList.remove('selected');
        }
    });
    event.target.classList.add('selected');
}
*/