<?php
// Include database connection and any other necessary files
include 'db_info.php';

// Retrieve department and year from URL parameters
$department = $_GET['department'];
$year = $_GET['year'];

// Fetch data from Table 1.1A 
$sql_table11a = "SELECT field1, field2, field3, field4 FROM table11a WHERE DepartmentID IN (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table11a = $conn->prepare($sql_table11a);
$stmt_table11a->bind_param("si", $department, $year);
$stmt_table11a->execute();
$result_table11a = $stmt_table11a->get_result();

// Fetch data from Table 1.1B 
$sql_table11b = "SELECT field1, field2, field3, field4 FROM table11b WHERE DepartmentID IN (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table11b = $conn->prepare($sql_table11b);
$stmt_table11b->bind_param("si", $department, $year);
$stmt_table11b->execute();
$result_table11b = $stmt_table11b->get_result();

// Fetch data from Table 1.2 
$sql_table12 = "SELECT field1, field2, field3, field4, field5, field6 FROM table12 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table12 = $conn->prepare($sql_table12);
$stmt_table12->bind_param("si", $department, $year);
$stmt_table12->execute();
$result_table12 = $stmt_table12->get_result();

// Fetch data from Table 1.3 
$sql_table13 = "SELECT field1, field2, field3, field4, field5, field6 FROM table13 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table13 = $conn->prepare($sql_table13);
$stmt_table13->bind_param("si", $department, $year);
$stmt_table13->execute();
$result_table13 = $stmt_table13->get_result();

// Fetch data from Table 1.4A 
$sql_table14a = "SELECT field1, field2, field3, field4, field5 FROM table14a WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table14a = $conn->prepare($sql_table14a);
$stmt_table14a->bind_param("si", $department, $year);
$stmt_table14a->execute();
$result_table14a = $stmt_table14a->get_result();

// Fetch data from Table 1.4B (Table14b)
$sql_table14b = "SELECT field1, field2, field3, field4, field5, field6, field7 FROM table14b WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table14b = $conn->prepare($sql_table14b);
$stmt_table14b->bind_param("si", $department, $year);
$stmt_table14b->execute();
$result_table14b = $stmt_table14b->get_result();

// Fetch data from Table 1.5 
$sql_table15 = "SELECT field1, field2, field3, field4, field5, field6 FROM table15 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table15 = $conn->prepare($sql_table15);
$stmt_table15->bind_param("si", $department, $year);
$stmt_table15->execute();
$result_table15 = $stmt_table15->get_result();

// Fetch data from Table 2.1A 
$sql_table21a = "SELECT field1, field2, field3, field4, field5, field6, field7, field8 FROM table21a WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table21a = $conn->prepare($sql_table21a);
$stmt_table21a->bind_param("si", $department, $year);
$stmt_table21a->execute();
$result_table21a = $stmt_table21a->get_result();

// Fetch data from Table 2.1B 
$sql_table21b = "SELECT field1, field2, field3, field4, field5, field6, field7 FROM table21b WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table21b = $conn->prepare($sql_table21b);
$stmt_table21b->bind_param("si", $department, $year);
$stmt_table21b->execute();
$result_table21b = $stmt_table21b->get_result();

// Fetch data from Table 2.2 
$sql_table22 = "SELECT field1, field2, field3, field4 FROM table23 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table22 = $conn->prepare($sql_table22);
$stmt_table22->bind_param("si", $department, $year);
$stmt_table22->execute();
$result_table22 = $stmt_table22->get_result();

// Fetch data from Table 2.3
$sql_table23 = "SELECT field1, field2, field3, field4 FROM table23 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table23 = $conn->prepare($sql_table23);
$stmt_table23->bind_param("si", $department, $year);
$stmt_table23->execute();
$result_table23 = $stmt_table23->get_result();

// Fetch data from Table 2.4
$sql_table24 = "SELECT field1, field2, field3, field4, field5 FROM table24 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table24 = $conn->prepare($sql_table24);
$stmt_table24->bind_param("si", $department, $year);
$stmt_table24->execute();
$result_table24 = $stmt_table24->get_result();

// Fetch data from Table 2.5
$sql_table25 = "SELECT field1, field2, field3, field4, field5 FROM table25 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table25 = $conn->prepare($sql_table25);
$stmt_table25->bind_param("si", $department, $year);
$stmt_table25->execute();
$result_table25 = $stmt_table25->get_result();

// Fetch data from Table 3.1
$sql_table31 = "SELECT field1, field2, field3, field4 FROM table31 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table31 = $conn->prepare($sql_table31);
$stmt_table31->bind_param("si", $department, $year);
$stmt_table31->execute();
$result_table31 = $stmt_table31->get_result();

// Fetch data from Table 3.2A
$sql_table32a = "SELECT field1, field2, field3, field4 FROM table32a WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table32a = $conn->prepare($sql_table32a);
$stmt_table32a->bind_param("si", $department, $year);
$stmt_table32a->execute();
$result_table32a = $stmt_table32a->get_result();

// Fetch data from Table 3.2B
$sql_table32b = "SELECT field1, field2, field3, field4, field5, field6 FROM table32b WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table32b = $conn->prepare($sql_table32b);
$stmt_table32b->bind_param("si", $department, $year);
$stmt_table32b->execute();
$result_table32b = $stmt_table32b->get_result();

// Fetch data from Table 3.3
$sql_table33 = "SELECT field1, field2, field3, field4, field5 FROM table33 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table33 = $conn->prepare($sql_table33);
$stmt_table33->bind_param("si", $department, $year);
$stmt_table33->execute();
$result_table33 = $stmt_table33->get_result();

// Fetch data from Table 4.1
$sql_table41 = "SELECT field1, field2, field3, field4, field5 FROM table41 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table41 = $conn->prepare($sql_table41);
$stmt_table41->bind_param("si", $department, $year);
$stmt_table41->execute();
$result_table41 = $stmt_table41->get_result();

// Fetch data from Table 4.2
$sql_table42 = "SELECT field1, field2, field3, field4, field5 FROM table42 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table42 = $conn->prepare($sql_table42);
$stmt_table42->bind_param("si", $department, $year);
$stmt_table42->execute();
$result_table42 = $stmt_table42->get_result();

// Fetch data from Table 4.3
$sql_table43 = "SELECT field1, field2, field3, field4, field5 FROM table43 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table43 = $conn->prepare($sql_table43);
$stmt_table43->bind_param("si", $department, $year);
$stmt_table43->execute();
$result_table43 = $stmt_table43->get_result();

// Fetch data from Table 5.1
$sql_table51 = "SELECT field1, field2, field3, field4, field5 FROM table51 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table51 = $conn->prepare($sql_table51);
$stmt_table51->bind_param("si", $department, $year);
$stmt_table51->execute();
$result_table51 = $stmt_table51->get_result();

// Fetch data from Table 5.2
$sql_table52 = "SELECT field1, field2, field3  FROM table52 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table52 = $conn->prepare($sql_table52);
$stmt_table52->bind_param("si", $department, $year);
$stmt_table52->execute();
$result_table52 = $stmt_table52->get_result();

// Fetch data from Table 5.3
$sql_table53 = "SELECT field1, field2, field3, field4, field5, field6, field7 FROM table53 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table53 = $conn->prepare($sql_table53);
$stmt_table53->bind_param("si", $department, $year);
$stmt_table53->execute();
$result_table53 = $stmt_table53->get_result();

// Fetch data from Table 5.4
$sql_table54 = "SELECT field1, field2, field3, field4, field5, field6 FROM table54 WHERE DepartmentID = (SELECT DepartmentID FROM departamento WHERE DepartmentName = ?) AND year = ?";
$stmt_table54 = $conn->prepare($sql_table54);
$stmt_table54->bind_param("si", $department, $year);
$stmt_table54->execute();
$result_table54 = $stmt_table54->get_result();

// Set CSV filename and headers for download
$filename = 'export.csv';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Open file pointer to php://output
$output = fopen('php://output', 'w');

//Write Tablas Informe Anual to the Excle file
$header_line = '"Tablas Informe Anual"' . PHP_EOL; 
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);

// Write department to the Excel file
$header_line = '"Departamento: ' . $department . '"' . PHP_EOL;
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);

// Write year to the Excel file
$header_line = '"Año Académico: ' . $year . '-"' . $year+1 ."". PHP_EOL;
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);

// Write Meta 1 header
$header_line = '"META 1. Proveer una educación integral de excelencia con un currículo actualizado; que se ajuste a las necesidades del mercado, las comunidades locales e internacionales y se enriquezca con actividades de investigación y creación mediante diversas modalidades de enseñanza"'. PHP_EOL;
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);


// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 1.1A header
fwrite($output, '"Table 1.1A"' . PHP_EOL);

$header_line = '"Curso","Acciones de Curso","Estatus","Breve descripción"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 1.1A data
while ($row = $result_table11a->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 1.1B header
fwrite($output, '"Table 1.1B"' . PHP_EOL);
$header_line = '"Cambio académico","Cambio adacémico institucional o menor","Cambio académico significativo","Cambio sustancial"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 1.1B data
while ($row = $result_table11b->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}


// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 1.2 header
fwrite($output, '"Table 1.2"' . PHP_EOL);
$header_line = '"Comunidades de Aprendizaje","","","Educación a Distancia","","","Programas COOP","","","Investigación","","","Internados / Prácticas","","","Cursos no Tradicionales","",""' . PHP_EOL;
$header_line .= '"Primer Semestre","Segundo Semestre","Verano","Primer Semestre","Segundo Semestre","Verano","Primer Semestre","Segundo Semestre","Verano","Primer Semestre","Segundo Semestre","Verano","Primer Semestre","Segundo Semestre","Verano","Nocturnos","Sabatino","Trimestral"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);


// Write Table 1.2 data
while ($row = $result_table12->fetch_assoc()) {
    // Initialize an array to store the formatted data
    $formatted_row = [];
    
    // Loop through each field and format the data
    foreach ($row as $value) {
        // Check the value and append 'x' if it matches the corresponding option
        $formatted_row[] = ($value === 'option1') ? 'x' : '';
        $formatted_row[] = ($value === 'option2') ? 'x' : '';
        $formatted_row[] = ($value === 'option3') ? 'x' : '';
    }
    
    // Write the formatted row to the CSV file
    fputcsv($output, $formatted_row);
}
// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 1.3 header
fwrite($output, '"Table 1.3"' . PHP_EOL);
$header_line = '"Nombre del programa académico acreditado","Agencia que acredita el Programa","Año de última acreditación","Año próxima acreditación","Número de programas acreditados","Recomendaciones"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 1.3 data
while ($row = $result_table13->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}
// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 1.4A header
fwrite($output, '"Table 1.4A"' . PHP_EOL);
$header_line = '"Curso","Estrategía de avalúo","Indicadores","Resultados obtenidos","Acciones correctivas"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 1.4A data
while ($row = $result_table14a->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}
// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 1.4B header
fwrite($output, '"Table 1.4B"' . PHP_EOL);
$header_line = '"Servicio o Proceso Evaluado o a evaluar","Indicador de ejecución","Estrategia o instrumento de avalúo","Resultados obtenidos","Uso de resultados","Acciones correctivas"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 1.4B data
while ($row = $result_table14b->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 1.5 header
fwrite($output, '"Table 1.5"' . PHP_EOL);
$header_line = '"1.1 la oferta académica mediante el desarrollo de programas académicos y cursos pertinentes y competitivos en diversas modalidades que respondan a las necesidades del mercado laboral local e internacional","1.2 Fortalecer las comunidades de aprendizaje como apoyo a las estrategias de retención, persistencia y graduación","1.3 Fomentar el desarrollo de propuestas académicas dirigidas a satisfacer las necesidades profesionales de la mediante iniciativas coordinadas por la División de Educación Continua y Estudios Profesionales (DECEP) y programas similares en los departamentos académicos","1.4 Evaluar la política de educación general para atemperarla al Perfil Estudiantil Puertorriqueño del Siglo XXI","1.5 Apoyar a los departamentos académicos en los trabajos dirigidos a la acreditación o reacreditación de sus programas","1.6 Promover una cultura académica orientada a evaluar los procesos de enseñanza aprendizaje para mejorar la efectividad educativa","Editar","Borrar"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 1.5 data
while ($row = $result_table15->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}


// Write newline between tables
fwrite($output, PHP_EOL);

// Write Meta 2 header
$header_line = '"META 2: Promover una cultura universitaria de investigación y labor creativa tanto de profesores y estudiantes que forje líderes en nuevo conocimiento, propicie acuerdos de colaboración entre investigadores e instituciones y apoye la captación de fondos."';
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 2.1A header
fwrite($output, '"Table 2.1A"' . PHP_EOL);
$header_line = '"Profesor","Título de la actividad","Fecha","Publicada","Clasificación de la publicación","*Tipo de Publicación","Auspiciada por el CIC","Entidad que publica"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 2.1A data
while ($row = $result_table21a->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 2.1B header
fwrite($output, '"Table 2.1B"' . PHP_EOL);
$header_line = '"Profesor","Título de la actividad","Fecha","Clasificación de actividad de creación y divulgación","Auspiciada por el CIC","Lugar de divulgación","Auspiciada por el CIC"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 2.1B data
while ($row = $result_table21b->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 2.2 header
fwrite($output, '"Table 2.2"' . PHP_EOL);
$header_line = '"Título del convenio o alianza*","Agencia o institución","Estatus","Total de fondos"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 2.2 data
while ($row = $result_table22->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 2.3 header
fwrite($output, '"Table 2.3"' . PHP_EOL);
$header_line = '"Título del proyecto de fondos externos","Agencia","Estatus","Total de fondos"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 2.3 data
while ($row = $result_table23->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 2.4 header
fwrite($output, '"Table 2.4"' . PHP_EOL);
$header_line = '"Título del trabajo de investigación o creación","Clasificación","Fecha","Profesor (mentor o supervisor)","Número de estudiantes investigadores por proyecto"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 2.4 data
while ($row = $result_table24->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 2.5 header
fwrite($output, '"Table 2.5"' . PHP_EOL);
$header_line = '"2.1 Desarrollar y apoyar la divulgación de investigaciones científicas y proyectos de creación en conferencias, foros, revistas arbitradas y publicaciones aplicables.","2.1 Desarrollar y apoyar la divulgación de investigaciones científicas y proyectos de creación en conferencias, foros, revistas arbitradas y publicaciones aplicables.","2.3 Apoyar proyectos de investigación y creación dirigidos a la captación de fondos.","2.4 Propiciar la investigación estudiantil y las actividades de creación estudiantil bajo la mentoría de los profesores.","2.5 Fomentar una cultura de avalúo en la investigación y creación."' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 2.5 data
while ($row = $result_table25->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Meta 3 header
$header_line = '"META 3: Reclutar y retener una población estudiantil diversa mediante una experiencia universitaria innovadora que facilite su transición a los estudios graduados y la inserción en el mercado laboral."';
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 3.1 header
fwrite($output, '"Table 3.1"' . PHP_EOL);
$header_line = '"Tipo de Reconocimiento","Cantidad de Estudiantes Reconocidos (Valor numérico)","Descripción del reconocimiento","Organismo que otorga el reconocimiento"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 3.1 data
while ($row = $result_table31->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 3.2A header
fwrite($output, '"Table 3.2A"' . PHP_EOL);
$header_line = '"Tipo de Reconocimiento","Cantidad de Estudiantes Reconocidos (Valor numérico)","Descripción del reconocimiento","Organismo que otorga el reconocimiento"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 3.2A data
while ($row = $result_table32a->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 3.2B header
fwrite($output, '"Table 3.2B"' . PHP_EOL);
$header_line = '"Nombre del Estudiante","Programa académico del cual se graduó","Lugar de Empleo","Año de Graduación","Trabajo actual relacionado al grado obtenido en UPRA","Comentarios"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 3.2B data
while ($row = $result_table32b->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 3.3 header
fwrite($output, '"Table 3.3"' . PHP_EOL);
$header_line = '"3.1 Optimizar y diversificar los servicios a los estudiantes atemperándolos a sus necesidades","3.2 Diversificar las actividades de promoción y reclutamiento","3.3 Facilitar el desarrollo integral de los estudiantes para alcanzar sus metas académicas y profesionales","3.4 Instituir los vínculos con los egresados para lograr una mayor colaboración y participación en diversas iniciativas institucionales","3.5 Fortalecer la cultura de avalúo orientada a mejorar los servicios a los estudiantes",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 3.3 data
while ($row = $result_table33->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Meta 4 header
$header_line = '"META 4: Vincular la universidad con la comunidad externa y promover la Institución como centro de actividad académica, cultural y de servicio."';
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 4.1 header
fwrite($output, '"Table 4.1"' . PHP_EOL);
$header_line = '"Título de la Actividad","Clasificación","Fecha","Coordinador de la Actividad","Número de participantes"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 4.1 data
while ($row = $result_table41->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 4.2 header
fwrite($output, '"Table 4.2"' . PHP_EOL);
$header_line = '"Título del curso","Número de estudiantes matriculados en cursos o programas en Educación Continua Primer Semestre","Número de estudiantes matriculados en cursos o programas en Educación Continua Segundo Semestre","Número de estudiantes matriculados en cursos o programas en Certificaciones Profesionales Primer Semestre","Número de estudiantes matriculados en cursos o programas en Certificaciones Profesionales Segundo Semestre"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 4.2 data
while ($row = $result_table42->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 4.3 header
fwrite($output, '"Table 4.3"' . PHP_EOL);
$header_line = '"4.1 Promover la participación en actividades sociales y culturales con la comunidad externa e interna","4.2 Adoptar estrategias de comunicación para fortalecer la imagen institucional","4.3 Integrar la comunidad universitaria en la prestación de servicios a la comunidad externa","4.4 Posicionar la DECEP como centro de educación continua de excelencia para atender las necesidades de adiestramiento de la industria, el comercio y el gobierno, entre otros","4.5 Propiciar una cultura de avalúo en las actividades académicas, sociales y culturales"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 4.3 data
while ($row = $result_table43->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Meta 5 header
$header_line = '"META 5: Optimizar las operaciones del campus en respuesta a los cambios fiscales y ajustes presupuestarios
mediante las mejores prácticas académicas, administrativas, tecnológicas y de reingeniería de procesos."'. PHP_EOL;
$header_line .= ',"","","","","","","","","","","","","","","","",""' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);

// Write the header line to the output file
fwrite($output, $header_line);

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 5.1 header
fwrite($output, '"Table 5.1"' . PHP_EOL);
$header_line = '"Título de la Actividad","Clasificación","Fecha","Fecha","Cantidad de participantes"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 5.1 data
while ($row = $result_table51->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 5.2 header
fwrite($output, '"Table 5.2"' . PHP_EOL);
$header_line = '"Iniciativas","Fondos recaudados","Comentario (opcional)"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 5.2  data
while ($row = $result_table52->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}
// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 5.3 header
fwrite($output, '"Table 5.3"' . PHP_EOL);
$header_line = '"Nombre de Estudiante","Iniciativa/Proyecto de Innovación o Emprendimiento","Describa brevemente","Año de Creación","Dirección Física de la empresa o enlace virtual del proyecto","Tipo de Empresa", "Comentarios"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 5.3 data
while ($row = $result_table53->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Write newline between tables
fwrite($output, PHP_EOL);

// Write Table 5.4 header
fwrite($output, '"Table 5.4"' . PHP_EOL);
$header_line = '"5.1 Incrementar las fuentes internas y externa para generar nuevos ingresos y alcanzar las metas propuestas de sustentabilidad financiera","5.2 Desarrollar un ecosistema de empresarismo, innovación y emprendimiento a través de cursos, actividades extracurriculares, centros de apoyos, alianzas, investigaciones y trabajos con asociaciones estudiantiles, entre otros, con el fin de expandir la mentalidad emprendedora","5.3 Fomentar la internacionalización a través de acuerdos de colaboración entre universidades locales y del exterior","5.4 Fortalecer los recursos humanos y tecnológicos de las oficinas de apoyo administrativo y de servicio para agilizar sus procesos internos","5.4 Fortalecer los recursos humanos y tecnológicos de las oficinas de apoyo administrativo y de servicio para agilizar sus procesos internos","5.6 Promover una cultura de avalúo de renovación institucional y sustentabilidad"' . PHP_EOL;
$header_line = html_entity_decode($header_line, ENT_QUOTES, 'UTF-8');
$header_line = utf8_decode($header_line);
fwrite($output, $header_line);

// Write Table 5.4 data
while ($row = $result_table54->fetch_assoc()) {
    // Convert row values to UTF-8
    foreach ($row as $key => $value) {
        $row[$key] = utf8_decode($value);
    }
    fputcsv($output, $row);
}

// Close file pointer
fclose($output);

// Close all statements and connection
$stmt_table11a->close();
$stmt_table11b->close();
$stmt_table12->close();
$stmt_table13->close();
$stmt_table14a->close();
$stmt_table14b->close();
$stmt_table15->close();
$stmt_table21a->close();
$stmt_table21b->close();
$stmt_table22->close();
$stmt_table23->close();
$stmt_table24->close();
$stmt_table25->close();
$stmt_table31->close();
$stmt_table32a->close();
$stmt_table32b->close();
$stmt_table33->close();
$stmt_table41->close();
$stmt_table42->close();
$stmt_table43->close();
$stmt_table51->close();
$stmt_table52->close();
$stmt_table53->close();
$stmt_table54->close();
$conn->close();
?>