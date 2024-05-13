$(function() {
    
    function createCell(row, type, placeholder, options) {
        var cell = row.insertCell();

        if (type === 'input') {
            cell.innerHTML = `<input type='text' placeholder='${placeholder}'>`;
        } else if (type === 'textarea') {
            cell.innerHTML = `<textarea rows="1" class="autoWidthTextarea" placeholder='${placeholder}'></textarea>`;
        } else if (type === 'select') {
            var select = document.createElement('select');
            var defaultOption = document.createElement('option');
            defaultOption.value = "";
            defaultOption.text = "Select an option...";
            select.appendChild(defaultOption);
            select.innerHTML += options;
            cell.appendChild(select);
        } else if (type === 'button') {
            cell.innerHTML = `<button class="${placeholder.toLowerCase()}Btn">${placeholder}</button>`;
        }
    }
    

    
    function addRow(tableId) {
        var table = $("#" + tableId);
        var row = table[0].insertRow();
    
        var referenceRow;
    
        if (tableId === 'myTable1.1') {
            createCell(row, 'input', 'Curso');
            createCell(row, 'select', 'acciones de curso', '<option value="Activacion">Activacion</option><option value="Cambio de curso">Cambio de curso</option>');
            createCell(row, 'select', 'estatus', '<option value="active">Active</option><option value="inactive">Inactive</option>');
            createCell(row, 'textarea', 'breve descripcion');
        } else if (tableId === 'myTable2') {
            // Modify this part according to the data for Table 2 and Table 3
            createCell(row, 'textarea', 'Cambio académico');
            createCell(row, 'textarea', 'Cambio adacémico institucional o menor');
            createCell(row, 'textarea', 'Cambio académico significativo ');
            createCell(row, 'textarea', 'Cambio sustancial ');
        
        } else if (tableId === 'myTable5') {
                createCell(row, 'textarea', 'Nombre del programa académico acreditado');
                createCell(row, 'textarea', 'Agencia que acredita el Programa');
                createCell(row, 'textarea', 'Año de última acreditación');
                createCell(row, 'select', 'Número de programas acreditados');
                createCell(row, 'textarea', 'Recomendaciones');

        } else if (tableId === 'myTable6') {
            createCell(row, 'input', 'Cursos');
            createCell(row, 'select', 'Estrategía de avalúo');
            createCell(row, 'textarea', 'Indicadores');
            createCell(row, 'textarea', 'Resultados obtenidos');
            createCell(row, 'textarea', 'Acciones correctivas');
        }

        else if (tableId === 'myTable7') {
            createCell(row, 'textarea', 'Servicio o Proceso Evaluado o a evaluar');
            createCell(row, 'textarea', 'Indicador de ejecución');
            createCell(row, 'textarea', 'Estrategia o instrumento de avalúo');
            createCell(row, 'textarea', 'Resultados obtenidos');
            createCell(row, 'textarea', 'Uso de resultados');
            createCell(row, 'textarea', 'Acciones correctivas');
        }

        else if (tableId === 'myTable9') {
            createCell(row, 'textarea', 'Servicio o Proceso Evaluado o a evaluar');
            createCell(row, 'textarea', 'Indicador de ejecución');
            createCell(row, 'textarea', 'Estrategia o instrumento de avalúo');
            createCell(row, 'textarea', 'Resultados obtenidos');
            createCell(row, 'textarea', 'Uso de resultados');
            createCell(row, 'textarea', 'Acciones correctivas');
        }
    
        createCell(row, 'button', 'Edit');
        createCell(row, 'button', 'Delete');
    
        console.log('Row added to ' + tableId);
    }
    

    $(document).on('click', '#myTable1.1 .deleteBtn', function() {
        var row = $(this).closest('tr');
        row.remove();
    });

    $(document).on('click', '#myTable2 .deleteBtn', function() {
        var row = $(this).closest('tr');
        row.remove();
    });

    $(document).on('click', '#myTable5 .deleteBtn', function() {
        var row = $(this).closest('tr');
        row.remove();
    });

    $(document).on('click', '#myTable6 .deleteBtn', function() {
        var row = $(this).closest('tr');
        row.remove();
    });

    $(document).on('click', '#myTable7 .deleteBtn', function() {
        var row = $(this).closest('tr');
        row.remove();
    });
    
    $('#addRowBtnTable1').on('click', function () {
        addRow('myTable1');
    });

    $('#addRowBtnTable2').on('click', function () {
        addRow('myTable2');
    });

    $('#addRowBtnTable5').on('click', function () {
        addRow('myTable5');
    });

    $('#addRowBtnTable6').on('click', function () {
        addRow('myTable6');
    });

    $('#addRowBtnTable7').on('click', function () {
        addRow('myTable7');
    });

    $('#addRowBtnTable8').on('click', function () {
        addRow('myTable8');
    });

    $('#addRowBtnTable9').on('click', function () {
        addRow('myTable9');
    });

    $('#addRowBtnTable10').on('click', function () {
        addRow('myTable10');
    });

    $('#addRowBtnTable11').on('click', function () {
        addRow('myTable11');
    });
    
    $('#addRowBtnTable12').on('click', function () {
        addRow('myTable12');
    });

    $('#addRowBtnTable13').on('click', function () {
        addRow('myTable13');
    });

    $('#addRowBtnTable14').on('click', function () {
        addRow('myTable14');
    });

    // dropdown.js
window.addEventListener('DOMContentLoaded', (event) => {
    // Get the dropdown element
    const dropdown = document.getElementById('metaDropdown');

    // Get the dropdown content element
    const dropdownContent = dropdown.querySelector('.dropdown-content');

    // Set the width of the dropdown content to fit the longest link
    const longestLinkWidth = Math.max(...Array.from(dropdownContent.children).map(link => link.clientWidth));
    dropdownContent.style.width = `${longestLinkWidth}px`;
});

document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector(".dropdown");
    var dropbtn = document.querySelector(".dropbtn");
    var dropdownContent = document.querySelector(".dropdown-content");

    dropbtn.addEventListener("click", function() {
        dropdownContent.classList.toggle("show");
    });

    window.addEventListener("click", function(event) {
        if (!dropdown.contains(event.target)) {
            dropdownContent.classList.remove("show");
        }
    });
});


});