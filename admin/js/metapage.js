// Parse the URL to get the department and year values
const urlParams = new URLSearchParams(window.location.search);
const department = urlParams.get('department');
const year = urlParams.get('year');

// Update the header with the department and year values
document.getElementById('departmentHeader').innerText = department;
document.getElementById('year').innerText = year;
