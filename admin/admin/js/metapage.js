
const urlParams2 = new URLSearchParams(window.location.search);
const department1 = urlParams2.get('department');
const year1 = urlParams2.get('year');

// Update the header with the department and year values
document.getElementById('departmentHeader').innerText = department1;
document.getElementById('year').innerText2 = year1;
