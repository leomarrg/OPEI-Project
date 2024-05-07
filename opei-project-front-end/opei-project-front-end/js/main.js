function toggleDropdown(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
}

document.addEventListener('click', function(event) {
    // Check if the clicked element is a dropdown button or dropdown content
    var dropdownButton = event.target.closest('.dashboardbtn');
    var dropdownContent = event.target.closest('.dashboard-content');

    // If the clicked element is neither a dropdown button nor dropdown content
    if (!dropdownButton && !dropdownContent) {
        var allDropdowns = document.querySelectorAll('.dashboard-content');
        // Close all dropdowns
        allDropdowns.forEach(function(dropdown) {
            dropdown.style.display = 'none';
        });
    } else if (dropdownButton) {
        // Close all dropdowns except the one that was clicked
        var allDropdowns = document.querySelectorAll('.dashboard-content');
        allDropdowns.forEach(function(dropdown) {
            if (dropdown !== dropdownButton.nextElementSibling) {
                dropdown.style.display = 'none';
            }
        });
    }
});

$(document).ready(function(){
    $('#myForm1_1').submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Check if any of the required fields are empty
        var empty = false;
        $(this).find('input[type=text], input[type=number], textarea').each(function() {
            if ($(this).val() === '') {
                empty = true;
                return false; // Exit the loop early if an empty field is found
            }
        });

        // If any required field is empty, prevent form submission
        if (empty) {
            alert('Please fill in all the required fields.');
            return;
        }

        // Get form data
        var formData = $(this).serialize();

        // Store reference to form for later use
        var $form = $(this);

        // Send form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'tabla1.1-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging

                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Show success message
                    alert('Form submitted successfully!');
                } else {
                    // Show error message if response is not 'success'
                    console.error('An error occurred while submitting the form.');
                    alert('An error occurred while submitting the form.');
                }
            },
            error: function(xhr, status, error){
                // Handle errors (if needed)
                console.error('Error:', error); // Log the error for debugging
            }
        });
    });

    $('#myForm1_1b').submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Check if any of the required fields are empty
        var empty = false;
        $(this).find('input[type=text], input[type=number], textarea').each(function() {
            if ($(this).val() === '') {
                empty = true;
                return false; // Exit the loop early if an empty field is found
            }
        });

        // If any required field is empty, prevent form submission
        if (empty) {
            alert('Please fill in all the required fields.');
            return;
        }

        // Get form data
        var formData = $(this).serialize();

        // Store reference to form for later use
        var $form = $(this);

        // Send form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'tabla1.1b-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging

                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Show success message
                    alert('Form submitted successfully!');
                } else {
                    // Show error message if response is not 'success'
                    console.error('An error occurred while submitting the form.');
                    alert('An error occurred while submitting the form.');
                }
            },
            error: function(xhr, status, error){
                // Handle errors (if needed)
                console.error('Error:', error); // Log the error for debugging
            }
        });
    });

    $('#myForm1_3').submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Check if any of the required fields are empty
        var empty = false;
        $(this).find('input[type=text], input[type=number], textarea').each(function() {
            if ($(this).val() === '') {
                empty = true;
                return false; // Exit the loop early if an empty field is found
            }
        });

        // If any required field is empty, prevent form submission
        if (empty) {
            alert('Please fill in all the required fields.');
            return;
        }

        // Get form data
        var formData = $(this).serialize();

        // Store reference to form for later use
        var $form = $(this);

        // Send form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'tabla1.3-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging

                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Show success message
                    alert('Form submitted successfully!');
                } else {
                    // Show error message if response is not 'success'
                    console.error('An error occurred while submitting the form.');
                    alert('An error occurred while submitting the form.');
                }
            },
            error: function(xhr, status, error){
                // Handle errors (if needed)
                console.error('Error:', error); // Log the error for debugging
            }
        });
    });

    $('#myForm1_4a').submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Check if any of the required fields are empty
        var empty = false;
        $(this).find('input[type=text], input[type=number], textarea').each(function() {
            if ($(this).val() === '') {
                empty = true;
                return false; // Exit the loop early if an empty field is found
            }
        });

        // If any required field is empty, prevent form submission
        if (empty) {
            alert('Please fill in all the required fields.');
            return;
        }

        // Get form data
        var formData = $(this).serialize();

        // Store reference to form for later use
        var $form = $(this);

        // Send form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'tabla1.4a-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging

                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Show success message
                    alert('Form submitted successfully!');
                } else {
                    // Show error message if response is not 'success'
                    console.error('An error occurred while submitting the form.');
                    alert('An error occurred while submitting the form.');
                }
            },
            error: function(xhr, status, error){
                // Handle errors (if needed)
                console.error('Error:', error); // Log the error for debugging
            }
        });
    });

    $('#myForm1_4b').submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Check if any of the required fields are empty
        var empty = false;
        $(this).find('input[type=text], input[type=number], textarea').each(function() {
            if ($(this).val() === '') {
                empty = true;
                return false; // Exit the loop early if an empty field is found
            }
        });

        // If any required field is empty, prevent form submission
        if (empty) {
            alert('Please fill in all the required fields.');
            return;
        }

        // Get form data
        var formData = $(this).serialize();

        // Store reference to form for later use
        var $form = $(this);

        // Send form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'tabla1.4b-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging

                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Show success message
                    alert('Form submitted successfully!');
                } else {
                    // Show error message if response is not 'success'
                    console.error('An error occurred while submitting the form.');
                    alert('An error occurred while submitting the form.');
                }
            },
            error: function(xhr, status, error){
                // Handle errors (if needed)
                console.error('Error:', error); // Log the error for debugging
            }
        });
    });

    $('#myForm1_5').submit(function(e){
        e.preventDefault(); // Prevent default form submission

        // Check if any of the required fields are empty
        var empty = false;
        $(this).find('input[type=text], input[type=number], textarea').each(function() {
            if ($(this).val() === '') {
                empty = true;
                return false; // Exit the loop early if an empty field is found
            }
        });

        // If any required field is empty, prevent form submission
        if (empty) {
            alert('Please fill in all the required fields.');
            return;
        }

        // Get form data
        var formData = $(this).serialize();

        // Store reference to form for later use
        var $form = $(this);

        // Send form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'tabla1.5-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging

                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Show success message
                    alert('Form submitted successfully!');
                } else {
                    // Show error message if response is not 'success'
                    console.error('An error occurred while submitting the form.');
                    alert('An error occurred while submitting the form.');
                }
            },
            error: function(xhr, status, error){
                // Handle errors (if needed)
                console.error('Error:', error); // Log the error for debugging
            }
        });
    });
});
