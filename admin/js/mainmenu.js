function showOptions(className, setName, element) {
    var options = document.querySelectorAll('.menu-container');
    options.forEach(function(option) {
        option.style.display = 'none';
    });

    var menuOptions = document.querySelectorAll('.menu-option-bar');
    menuOptions.forEach(function(menuOption) {
        menuOption.classList.remove('highlight');
    });

    document.querySelector('#welcome-text').style.display = 'none';
    document.querySelector('#year-text').style.display = 'block';
    document.querySelector('#active-set-text').style.display = 'block';
    document.querySelector('.' + className).style.display = 'flex';

    // Highlight the clicked option
    element.classList.add('highlight');

    document.querySelector('#active-set-text').innerText = setName;
}
function showDepartmentDropdown() {
    var roleSelect = document.getElementById("role");
    var departmentDropdown = document.getElementById("departmentDropdown");
  
    if (roleSelect.value === "user") {
      departmentDropdown.style.display = "block";
    } else {
      departmentDropdown.style.display = "none";
    }
  }
  const urlParams = new URLSearchParams(window.location.search);
  const department = urlParams.get('department');

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
