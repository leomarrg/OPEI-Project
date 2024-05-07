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
    
        // Get the value of the dropdown lists
        var dropdownValue1 = $(this).find('select[name=accDeCurso]').val();
        var dropdownValue2 = $(this).find('select[name=estatus]').val();
    
        // Check if any dropdown list value is "0"
        if (dropdownValue1 === "0" || dropdownValue2 === "0") {
            // Prompt the user to fill in all required fields
            alert('Please fill in all the required fields.');
            return; // Prevent form submission
        }
    
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
            url: '../meta-1/tabla1.1-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging
    
                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Reset dropdown lists to default value
                    $form.find('select[name=accDeCurso]').val('0');
                    $form.find('select[name=estatus]').val('0');
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
            url: '../meta-1/tabla1.1b-insert.php', // Change this URL to the correct PHP file
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
    
        // Get the value of the dropdown list
        var dropdownValue = $(this).find('select[name=numProgAcredit]').val();
    
        // Check if the dropdown list value is "0"
        if (dropdownValue === "0") {
            // Prompt the user to fill in all required fields
            alert('Please fill in all the required fields.');
            return; // Prevent form submission
        }
    
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
            url: '../meta-1/tabla1.3-insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging
    
                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Reset dropdown list to "Seleccione..."
                    $form.find('select[name=numProgAcredit]').val('0');
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
            url: '../meta-1/tabla1.4_insert.php', // Change this URL to the correct PHP file
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
            url: '../meta-1/tabla1.4b_insert.php', // Change this URL to the correct PHP file
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
            url: '../meta-1/tabla1.5-insert.php', // Change this URL to the correct PHP file
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

    $('#myForm2_1A').submit(function(e){
        e.preventDefault(); // Prevent default form submission
    
        // Check if any of the required fields are empty
        var empty = false;
        $(this).find('input[type=text], input[type=number], textarea').each(function() {
            if ($(this).val() === '') {
                empty = true;
                return false; // Exit the loop early if an empty field is found
            }
        });
    
        // Check if any of the dropdown lists have the default value "0"
        var dropdownEmpty = false;
        $(this).find('select').each(function() {
            if ($(this).val() === '0') {
                dropdownEmpty = true;
                return false; // Exit the loop early if a dropdown list with default value is found
            }
        });
    
        // If any required field is empty, prevent form submission
        if (empty || dropdownEmpty) {
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
            url: '../meta-2/tabla2.1A_insert.php', // Change this URL to the correct PHP file
            data: formData,
            success: function(response){
                console.log('Response:', response); // Log the response for debugging
    
                // Check if the response indicates success
                if (response.trim() === 'success') {
                    // Handle success
                    console.log('Form submitted successfully!');
                    // Clear form fields
                    $form.find('input[type=text], input[type=number], textarea').val('');
                    // Reset dropdown lists to their default values
                    $form.find('select').val('0');
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
    

    $('#myForm2_1B').submit(function(e){
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
            url: '../meta-2/tabla2.1B_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm2_2').submit(function(e){
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
            url: '../meta-2/tabla2.2_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm2_3').submit(function(e){
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
            url: '../meta-2/tabla2.3_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm2_4').submit(function(e){
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
            url: '../meta-2/tabla2.4_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm2_5').submit(function(e){
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
            url: '../meta-2/tabla2.5_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm3_1').submit(function(e){
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
            url: '../meta-3/tabla3.1_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm3_2').submit(function(e){
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
            url: '../meta-3/tabla3.2_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm3_2b').submit(function(e){
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
            url: '../meta-3/tabla3.2b_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm3_3').submit(function(e){
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
            url: '../meta-3/tabla3.3_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm4_1').submit(function(e){
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
            url: '../meta-4/tabla4.1_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm4_2').submit(function(e){
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
            url: '../meta-4/tabla4.2_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm4_3').submit(function(e){
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
            url: '../meta-4/tabla4.3_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm5_1').submit(function(e){
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
            url: '../meta-5/tabla5.1_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm5_2').submit(function(e){
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
            url: '../meta-5/tabla5.2_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm5_3').submit(function(e){
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
            url: '../meta-5/tabla5.3_insert.php', // Change this URL to the correct PHP file
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

    $('#myForm5_4').submit(function(e){
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
            url: '../meta-5/tabla5.4_insert.php', // Change this URL to the correct PHP file
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

function updateTable11Row(table11aID) {
    console.log('Updating row with ID: ' + table11aID);

    var field1 = document.getElementById('field1_' + table11aID).value;
    var field2 = document.getElementById('field2_' + table11aID).value;
    var field3 = document.getElementById('field3_' + table11aID).value;
    var field4 = document.getElementById('field4_' + table11aID).value;

    console.log('Field 1 value: ' + field1);
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);

    $.ajax({
        type: 'POST',
        url: '../meta-1/tabla1.1_update.php',
        data: {
            table11aID: table11aID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4
        },
        success: function(response) {
            if (response == 'success') {
                alert('Update successful!');
                console.log('Update successful');
                window.location.href = '../meta-1/tabla1.1_display.php';
            } else {
                console.log('Error updating record');
                alert('Error updating record');
            }
        }
    });
}

function updateTable11bRow(table11bID) {
    console.log('Updating row with ID: ' + table11bID);

    var field1 = document.getElementById('field1_' + table11bID).value;
    var field2 = document.getElementById('field2_' + table11bID).value;
    var field3 = document.getElementById('field3_' + table11bID).value;
    var field4 = document.getElementById('field4_' + table11bID).value;

    console.log('Field 1 value: ' + field1);
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);

    $.ajax({
        type: 'POST',
        url: '../meta-1/tabla1.1B_update.php',
        data: {
            table11bID: table11bID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful');
                alert('Update successful!');
                window.location.href = '../meta-1/tabla1.1B_display.php';
            } else {
                console.log('Error updating record');
                alert('Error updating record');
            }
        }
    });
}

function updateTable13Row(table13ID) {
    console.log('Updating row with ID: ' + table13ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table13ID).value;
    var field2 = document.getElementById('field2_' + table13ID).value;
    var field3 = document.getElementById('field3_' + table13ID).value;
    var field4 = document.getElementById('field4_' + table13ID).value;
    var field5 = document.getElementById('field5_' + table13ID).value;
    var field6 = document.getElementById('field6_' + table13ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);

    $.ajax({
        type: 'POST',
        url: '../meta-1/tabla1.3_update.php',
        data: {
            table13ID: table13ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                alert('Update successful!');
                window.location.href = '../meta-1/tabla1.3_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable14aRow(table14aID) {
    console.log('Updating row with ID: ' + table14aID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table14aID).value;
    var field2 = document.getElementById('field2_' + table14aID).value;
    var field3 = document.getElementById('field3_' + table14aID).value;
    var field4 = document.getElementById('field4_' + table14aID).value;
    var field5 = document.getElementById('field5_' + table14aID).value;


    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);


    $.ajax({
        type: 'POST',
        url: '../meta-1/tabla1.4_update.php',
        data: {
            table14aID: table14aID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                alert('Update successful!');
                window.location.href = '../meta-1/tabla1.4_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable14bRow(table14bID) {
    console.log('Updating row with ID: ' + table14bID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table14bID).value;
    var field2 = document.getElementById('field2_' + table14bID).value;
    var field3 = document.getElementById('field3_' + table14bID).value;
    var field4 = document.getElementById('field4_' + table14bID).value;
    var field5 = document.getElementById('field5_' + table14bID).value;
    var field6 = document.getElementById('field6_' + table14bID).value;


    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);


    $.ajax({
        type: 'POST',
        url: '../meta-1/tabla1.4B_update.php',
        data: {
            table14bID: table14bID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                alert('Update successful!');
                window.location.href = '../meta-1/tabla1.4B_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable15Row(table15ID) {
    console.log('Updating row with ID: ' + table15ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table15ID).value;
    var field2 = document.getElementById('field2_' + table15ID).value;
    var field3 = document.getElementById('field3_' + table15ID).value;
    var field4 = document.getElementById('field4_' + table15ID).value;
    var field5 = document.getElementById('field5_' + table15ID).value;
    var field6 = document.getElementById('field6_' + table15ID).value;


    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);


    $.ajax({
        type: 'POST',
        url: '../meta-1/tabla1.5_update.php',
        data: {
            table15ID: table15ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-1/tabla1.5_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}


// edit tabla 2.1a
function editRow(tableRowID) {
    // Convert all cells in the row into editable fields
    var row = document.getElementById('row_table21a_' + tableRowID);
    var cells = row.getElementsByTagName('td');
    for (var i = 0; i < cells.length; i++) {
        var cell = cells[i];
        var text = cell.innerText || cell.textContent;
        cell.innerHTML = "<input type='text' value='" + text + "'>";
    }

    // Change the "Editar" link to an "Update" link
    var editCell = document.getElementById('edit_' + tableRowID);
    editCell.innerHTML = "<a href='javascript:void(0);' onclick='updateTable21aRow(" + tableRowID + ")'>Update</a>";
}

function editRow21a(rowID) {
    console.log("Editing row with ID:", rowID);

    // Hide all textboxes first
    $('input[type="text"]').hide();
    
    // Show textboxes for the row being edited
    $('#field1_' + rowID).show();
    $('#field2_' + rowID).show();
    $('#field3_' + rowID).show();
    $('#field4_' + rowID).show();
    $('#field5_' + rowID).show();
    $('#field6_' + rowID).show();
    $('#field7_' + rowID).show();
    $('#field8_' + rowID).show();
}



function updateTable21aRow(table21aID) {
    console.log('Updating row with ID: ' + table21aID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table21aID).value;
    var field2 = document.getElementById('field2_' + table21aID).value;
    var field3 = document.getElementById('field3_' + table21aID).value;
    var field4 = document.getElementById('field4_' + table21aID).value;
    var field5 = document.getElementById('field5_' + table21aID).value;
    var field6 = document.getElementById('field6_' + table21aID).value;
    var field7 = document.getElementById('field7_' + table21aID).value;
    var field8 = document.getElementById('field8_' + table21aID).value;
    


    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);
    console.log('Field 7 value: ' + field7);
    console.log('Field 8 value: ' + field8);


    $.ajax({
        type: 'POST',
        url: '../meta-2/tabla2.1A_update.php',
        data: {
            table21aID: table21aID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6,
            field7: field7,
            field8: field8
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-2/tabla2.1A_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable21bRow(table21bID) {
    console.log('Updating row with ID: ' + table21bID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table21bID).value;
    var field2 = document.getElementById('field2_' + table21bID).value;
    var field3 = document.getElementById('field3_' + table21bID).value;
    var field4 = document.getElementById('field4_' + table21bID).value;
    var field5 = document.getElementById('field5_' + table21bID).value;
    var field6 = document.getElementById('field6_' + table21bID).value;



    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);


    $.ajax({
        type: 'POST',
        url: '../meta-2/tabla2.1B_update.php',
        data: {
            table21bID: table21bID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-2/tabla2.1B_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable22Row(table22ID) {
    console.log('Updating row with ID: ' + table22ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table22ID).value;
    var field2 = document.getElementById('field2_' + table22ID).value;
    var field3 = document.getElementById('field3_' + table22ID).value;
    var field4 = document.getElementById('field4_' + table22ID).value;



    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);


    $.ajax({
        type: 'POST',
        url: '../meta-2/tabla2.2_update.php',
        data: {
            table22ID: table22ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-2/tabla2.2_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable23Row(table23ID) {
    console.log('Updating row with ID: ' + table23ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table23ID).value;
    var field2 = document.getElementById('field2_' + table23ID).value;
    var field3 = document.getElementById('field3_' + table23ID).value;
    var field4 = document.getElementById('field4_' + table23ID).value;



    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);


    $.ajax({
        type: 'POST',
        url: '../meta-2/tabla2.3_update.php',
        data: {
            table23ID: table23ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-2/tabla2.3_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable24Row(table24ID) {
    console.log('Updating row with ID: ' + table24ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table24ID).value;
    var field2 = document.getElementById('field2_' + table24ID).value;
    var field3 = document.getElementById('field3_' + table24ID).value;
    var field4 = document.getElementById('field4_' + table24ID).value;
    var field5 = document.getElementById('field5_' + table24ID).value;



    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 4 value: ' + field5);


    $.ajax({
        type: 'POST',
        url: '../meta-2/tabla2.4_update.php',
        data: {
            table24ID: table24ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-2/tabla2.4_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable25Row(table25ID) {
    console.log('Updating row with ID: ' + table25ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table25ID).value;
    var field2 = document.getElementById('field2_' + table25ID).value;
    var field3 = document.getElementById('field3_' + table25ID).value;
    var field4 = document.getElementById('field4_' + table25ID).value;
    var field5 = document.getElementById('field5_' + table25ID).value;



    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);


    $.ajax({
        type: 'POST',
        url: '../meta-2/tabla2.5_update.php',
        data: {
            table25ID: table25ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-2/tabla2.5_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable31Row(table31ID) {
    console.log('Updating row with ID: ' + table31ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table31ID).value;
    var field2 = document.getElementById('field2_' + table31ID).value;
    var field3 = document.getElementById('field3_' + table31ID).value;
    var field4 = document.getElementById('field4_' + table31ID).value;
    var field5 = document.getElementById('field5_' + table31ID).value;



    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4);
    console.log('Field 5 value: ' + field5);


    $.ajax({
        type: 'POST',
        url: '../meta-3/tabla3.1_update.php',
        data: {
            table31ID: table31ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-3/tabla3.1_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable32aRow(table32aID) {
    console.log('Updating row with ID: ' + table32aID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table32aID).value;
    var field2 = document.getElementById('field2_' + table32aID).value;
    var field3 = document.getElementById('field3_' + table32aID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);

    $.ajax({
        type: 'POST',
        url: '../meta-3/tabla3.2_update.php',
        data: {
            table32aID: table32aID,
            field1: field1,
            field2: field2,
            field3: field3
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-3/tabla3.2_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}


function updateTable32bRow(table32bID) {
    console.log('Updating row with ID: ' + table32bID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table32bID).value;
    var field2 = document.getElementById('field2_' + table32bID).value;
    var field3 = document.getElementById('field3_' + table32bID).value;
    var field4 = document.getElementById('field4_' + table32bID).value;
    var field5 = document.getElementById('field5_' + table32bID).value;
    var field6 = document.getElementById('field6_' + table32bID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);

    $.ajax({
        type: 'POST',
        url: '../meta-3/tabla3.2b_update.php',
        data: {
            table32bID: table32bID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-3/tabla3.2b_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable33Row(table33ID) {
    console.log('Updating row with ID: ' + table33ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table33ID).value;
    var field2 = document.getElementById('field2_' + table33ID).value;
    var field3 = document.getElementById('field3_' + table33ID).value;
    var field4 = document.getElementById('field4_' + table33ID).value;
    var field5 = document.getElementById('field5_' + table33ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);

    $.ajax({
        type: 'POST',
        url: '../meta-3/tabla3.3_update.php',
        data: {
            table33ID: table33ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-3/tabla3.3_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable41Row(table41ID) {
    console.log('Updating row with ID: ' + table41ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table41ID).value;
    var field2 = document.getElementById('field2_' + table41ID).value;
    var field3 = document.getElementById('field3_' + table41ID).value;
    var field4 = document.getElementById('field4_' + table41ID).value;
    var field5 = document.getElementById('field5_' + table41ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);

    $.ajax({
        type: 'POST',
        url: '../meta-4/tabla4.1_update.php',
        data: {
            table41ID: table41ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-4/tabla4.1_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable42Row(table42ID) {
    console.log('Updating row with ID: ' + table41ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table42ID).value;
    var field2 = document.getElementById('field2_' + table42ID).value;
    var field3 = document.getElementById('field3_' + table42ID).value;
    var field4 = document.getElementById('field4_' + table42ID).value;
    var field5 = document.getElementById('field5_' + table42ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);

    $.ajax({
        type: 'POST',
        url: '../meta-4/tabla4.2_update.php',
        data: {
            table42ID: table42ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-4/tabla4.2_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable43Row(table43ID) {
    console.log('Updating row with ID: ' + table41ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table43ID).value;
    var field2 = document.getElementById('field2_' + table43ID).value;
    var field3 = document.getElementById('field3_' + table43ID).value;
    var field4 = document.getElementById('field4_' + table43ID).value;
    var field5 = document.getElementById('field5_' + table43ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);

    $.ajax({
        type: 'POST',
        url: '../meta-4/tabla4.2_update.php',
        data: {
            table43ID: table43ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-4/tabla4.3_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable51Row(table51ID) {
    console.log('Updating row with ID: ' + table51ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table51ID).value;
    var field2 = document.getElementById('field2_' + table51ID).value;
    var field3 = document.getElementById('field3_' + table51ID).value;
    var field4 = document.getElementById('field4_' + table51ID).value;
    var field5 = document.getElementById('field5_' + table51ID).value;
    var field6 = document.getElementById('field6_' + table51ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);

    $.ajax({
        type: 'POST',
        url: '../meta-5/tabla5.1_update.php',
        data: {
            table51ID: table51ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-5/tabla5.1_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable52Row(table52ID) {
    console.log('Updating row with ID: ' + table41ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table52ID).value;
    var field2 = document.getElementById('field2_' + table52ID).value;
    var field3 = document.getElementById('field3_' + table52ID).value;
 

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);

    $.ajax({
        type: 'POST',
        url: '../meta-5/tabla5.2_update.php',
        data: {
            table52ID: table52ID,
            field1: field1,
            field2: field2,
            field3: field3
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-5/tabla5.2_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable53Row(table53ID) {
    console.log('Updating row with ID: ' + table41ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table53ID).value;
    var field2 = document.getElementById('field2_' + table53ID).value;
    var field3 = document.getElementById('field3_' + table53ID).value;
    var field4 = document.getElementById('field4_' + table53ID).value;
    var field5 = document.getElementById('field5_' + table53ID).value;
    var field6 = document.getElementById('field6_' + table53ID).value;
    var field7 = document.getElementById('field7_' + table53ID).value;
    var field8 = document.getElementById('field8_' + table53ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);
    console.log('Field 7 value: ' + field7);
    console.log('Field 8 value: ' + field8);

    $.ajax({
        type: 'POST',
        url: '../meta-5/tabla5.3_update.php',
        data: {
            table53ID: table53ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6,
            field7: field7,
            field8: field8
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-5/tabla5.3_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function updateTable54Row(table54ID) {
    console.log('Updating row with ID: ' + table41ID); // Add this line to check if the function is called

    var field1 = document.getElementById('field1_' + table54ID).value;
    var field2 = document.getElementById('field2_' + table54ID).value;
    var field3 = document.getElementById('field3_' + table54ID).value;
    var field4 = document.getElementById('field4_' + table54ID).value;
    var field5 = document.getElementById('field5_' + table54ID).value;
    var field6 = document.getElementById('field6_' + table54ID).value;

    console.log('Field 1 value: ' + field1); // Add these lines to check the values of fields
    console.log('Field 2 value: ' + field2);
    console.log('Field 3 value: ' + field3);
    console.log('Field 4 value: ' + field4); // Add these lines to check the values of fields
    console.log('Field 5 value: ' + field5);
    console.log('Field 6 value: ' + field6);

    $.ajax({
        type: 'POST',
        url: '../meta-5/tabla5.4_update.php',
        data: {
            table54ID: table54ID,
            field1: field1,
            field2: field2,
            field3: field3,
            field4: field4,
            field5: field5,
            field6: field6
        },
        success: function(response) {
            if (response == 'success') {
                console.log('Update successful'); // Add this line to check if update was successful
                window.location.href = '../meta-5/tabla5.4_display.php';
            } else {
                console.log('Error updating record'); // Add this line to check if there's an error
                alert('Error updating record');
            }
        }
    });
}

function deleteRow(id) {
    if (confirm("Are you sure you want to delete this row?")) {
        // Send an AJAX request to delete.php
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display an alert message on successful deletion
                alert("Deleted successfully");
                // Update the table by removing the deleted row from the DOM
                var rowToDelete = document.getElementById("row_" + id);
                if (rowToDelete) {
                    rowToDelete.parentNode.removeChild(rowToDelete);
                }
            }
        };
        xhr.open("GET", "delete.php?id=" + id, true);
        xhr.send();
    }
}

function editRow11a() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 2) { // Check if it's field2 column
                inputField = "<select>";
                var options = ['Activación', 'Cambio de código', 'Creación', 'Inactivación', 'Reactivación', 'Revisión'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else if ($(this).index() === 3) { // Check if it's field3 column
                // Add options specific to field3
                inputField = "<select>";
                var options = ['Aprobado', 'En Proceso'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else { // For other fields, use input type text
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table11aID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('select:eq(0)').val(), // Get the value from the first select element
            field3: row.find('select:eq(1)').val(), // Get the value from the second select element
            field4: row.find('input:eq(1)').val().trim()
        };

        $.ajax({
            url: '../meta-1/tabla1.1_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}


// edit table 11b
function editRow11b() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table11bID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim()
        };

        $.ajax({
            url: '../meta-1/tabla1.1B_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow13() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 5) { // Check if it's field2 column
                inputField = "<select>";
                var options = ['1', '2', '3', '4', '5', '6'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else { // For other fields, use input type text
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table13ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('select').val(),// Get the value from the select element
            field6: row.find('input:eq(4)').val()
        };

        $.ajax({
            url: '../meta-1/tabla1.3_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow14() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table14aID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-1/tabla1.1B_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow14b() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table14bID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim(),
            field6: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-1/tabla1.4B_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow15() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table15ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim(),
            field6: row.find('input:eq(5)').val().trim()
        };

        $.ajax({
            url: '../meta-1/tabla1.5_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}




// edit table 21a
function editRow21a() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 3) { //change this line to change where the date picker appears
                inputField = "<input type='text' class='datepicker' value='" + currentValue + "'>";
            } else if ($(this).index() === 4) { // Check if it's field3 column
                // Add options specific to field3
                inputField = "<select>";
                var options = ['Si', 'No'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else if ($(this).index() === 5) { // Check if it's field3 column
                // Add options specific to field3
                inputField = "<select>";
                var options = ['Antología', 'Artículo en periódico', 'Artículo Publicado en Revistas de uso general o populares', 'Artículo Publicado Revista Arbitrada', 'Boletín', 'Capítulo de libro', 'Concierto', 'Exposición', 'Investigación', 'Libro', 'Obra de arte realizada', 'Página Web o blogs'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else if ($(this).index() === 6) { // Check if it's field3 column
                // Add options specific to field3
                inputField = "<select>";
                var options = ['Arbitrada', 'No Arbitrada'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else if ($(this).index() === 7) { // Check if it's field3 column
                // Add options specific to field3
                inputField = "<select>";
                var options = ['Si', 'No'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            }
            
            else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table21aID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('select:eq(0)').val(),
            field5: row.find('select:eq(1)').val(),
            field6: row.find('select:eq(2)').val(),
            field7: row.find('select:eq(3)').val(),
            field8: row.find('input:eq(3)').val().trim()
        };

        $.ajax({
            url: '../meta-2/tabla2.1a_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow21b() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 3) { //change this line to change where the date picker appears
                inputField = "<input type='text' class='datepicker' value='" + currentValue + "'>";
            } else if ($(this).index() === 4) { // Check if it's field3 column
                // Add options specific to field3
                inputField = "<select>";
                var options = ['Bibliografías, discografía y filmografía', 'Colaborador y lector en proyecto de investigación o disertación', 'Competencia',
                'Conferencias', 'Creación de cursos', 'Creación literaria', 'Diseños Profesionales', 'Editor', 'Exposiciones, conciertos, obras de teatro y cine (artes escénicas)',
                'Foros y paneles o mesa redonda', 'Jueces y jurado', 'Lectura de poemas', 'Manual de uso académico', 'Mentor en proyectos de investigación, tesina, tesis o disertación de estudiante',
                'Moderador o facilitador / Presentador o Maestro de Ceremonia', 'Módulos', 'Página Web y Blogs con artículos profesionales o de naturaleza académica',
                'Presentador (a) de libros', 'Producción de Vídeo Educativo o instruccional', 'Producción y grabación musical', 'Programas de radio y televisión',
                'Propuestas de investigación y creación o de finalidad académica', 'Seminarios', 'Talleres', 'Traducciones'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else if ($(this).index() === 5) { // Check if it's field3 column
                // Add options specific to field3
                inputField = "<select>";
                var options = ['Si', 'No'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table21bID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('select:eq(0)').val(),
            field5: row.find('select:eq(1)').val(),
            field6: row.find('input:eq(3)').val().trim()
        };

        $.ajax({
            url: '../meta-2/tabla2.1B_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow22() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 3) { // Check if it's field2 column
                inputField = "<select>";
                var options = ['Aprobado', 'No aprobado', 'Pendiente a aprobacion'];
                options.forEach(function(option) {
                    inputField += "<option value='" + option + "'" + (currentValue === option ? " selected" : "") + ">" + option + "</option>";
                });
                inputField += "</select>";
            } else { // For other fields, use input type text
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table22ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('select:eq(0)').val(),
            field4: row.find('input:eq(2)').val().trim()
        };

        $.ajax({
            url: '../meta-2/tabla2.2_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow23() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table23ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim()
        };

        $.ajax({
            url: '../meta-2/tabla2.3_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow24() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table24ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-2/tabla2.4_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow25() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table25ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-2/tabla2.5_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow31() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 4) { //change this line to change where the date picker appears
                inputField = "<input type='text' class='datepicker' value='" + currentValue + "'>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        // Initialize jQuery UI datepicker
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table31ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-3/tabla3.1_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow32() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 3) { //change this line to change where the date picker appears
                inputField = "<input type='text' class='datepicker' value='" + currentValue + "'>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        // Initialize jQuery UI datepicker
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table32aID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim()
        };

        $.ajax({
            url: '../meta-3/tabla3.2_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow32b() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 5) { // Check if it's the field5 column
                // Create a select element with options
                inputField = "<select>";
                inputField += "<option value='Option 1'>Option 1</option>";
                inputField += "<option value='Option 2'>Option 2</option>";
                inputField += "<option value='Option 3'>Option 3</option>";
                inputField += "</select>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table32bID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('select').val(),// Get the value from the select element
            field6: row.find('input:eq(4)').val()
        };

        $.ajax({
            url: '../meta-3/tabla3.2b_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow33() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table33ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-3/tabla3.3_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow41() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 2) { // Check if it's the field2 column
                // Create a select element with options
                inputField = "<select>";
                inputField += "<option value='Option 1'>Option 1</option>";
                inputField += "<option value='Option 2'>Option 2</option>";
                inputField += "<option value='Option 3'>Option 3</option>";
                inputField += "</select>";
            } else if ($(this).index() === 3) { // Check if it's the field3 column
                // Create an input element with the date picker
                inputField = "<input type='text' class='datepicker' value='" + currentValue + "'>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        // Initialize jQuery UI datepicker for field3
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table41ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('select').val(), // Get the value from the select element
            field3: row.find('.datepicker').val().trim(), // Get the value from the datepicker input
            field4: row.find('input:eq(2)').val().trim(),
            field5: row.find('input:eq(3)').val().trim()
        };

        $.ajax({
            url: '../meta-4/tabla4.1_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow42() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table42ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-4/tabla4.2_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow43() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table43ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-4/tabla4.3_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow51() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 2) { // Check if it's the field2 column
                // Create a select element with options
                inputField = "<select>";
                inputField += "<option value='Option 1'>Option 1</option>";
                inputField += "<option value='Option 2'>Option 2</option>";
                inputField += "<option value='Option 3'>Option 3</option>";
                inputField += "</select>";
            } else if ($(this).index() === 3) { // Check if it's the field3 column
                // Create an input element with the date picker
                inputField = "<input type='text' class='datepicker' value='" + currentValue + "'>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        // Initialize jQuery UI datepicker for field3
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table51ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('select').val(), // Get the value from the select element
            field3: row.find('.datepicker').val().trim(), // Get the value from the datepicker input
            field4: row.find('input:eq(2)').val().trim(),
            field5: row.find('input:eq(3)').val().trim(),
            field6: row.find('input:eq(4)').val().trim()
        };

        $.ajax({
            url: '../meta-5/tabla5.1_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                    console.log('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow52() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 1) { // Check if it's the field2 column
                // Create a select element with options
                inputField = "<select>";
                inputField += "<option value='Option 1'>Option 1</option>";
                inputField += "<option value='Option 2'>Option 2</option>";
                inputField += "<option value='Option 3'>Option 3</option>";
                inputField += "</select>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        // Initialize jQuery UI datepicker for field3
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table52ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('select').val(), // Get the value from the select element
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(1)').val().trim()
        };

        $.ajax({
            url: '../meta-5/tabla5.2_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                    console.log('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow53() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField;
            if ($(this).index() === 6) { // Check if it's the field2 column
                // Create a select element with options
                inputField = "<select>";
                inputField += "<option value='Option 1'>Option 1</option>";
                inputField += "<option value='Option 2'>Option 2</option>";
                inputField += "<option value='Option 3'>Option 3</option>";
                inputField += "</select>";
            } else {
                inputField = "<input type='text' value='" + currentValue + "'>";
            }
            $(this).html(inputField);
        });

        // Initialize jQuery UI datepicker for field3
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Set the desired date format
            showOn: 'focus', // Show the datepicker only when the input field is focused
            autoHide: false // Prevent automatic hiding of the datepicker
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table53ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim(),
            field6: row.find('select').val(),
            field7: row.find('input:eq(5)').val().trim(),
            field8: row.find('input:eq(6)').val().trim()
        };
        $.ajax({
            url: '../meta-5/tabla5.3_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                    console.log('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}

function editRow54() {
    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();

        $('.edit-mode').each(function() {
            $(this).html($(this).data('original-html'));
            $(this).removeClass('edit-mode');
        });

        var row = $(this).closest('tr');
        var originalHtml = row.html();

        row.addClass('edit-mode');
        row.data('original-html', originalHtml);

        row.find('td:not(:last-child):not(:first-child):not(:nth-last-child(2))').each(function() {
            var currentValue = $(this).text().trim();
            var inputField = "<input type='text' value='" + currentValue + "'>";
            $(this).html(inputField);
        });

        row.find('.edit-btn').text('Actualizar');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
    });

    $(document).on('click', '.update-btn', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var rowData = {
            table54ID: row.find('td:eq(0)').text().trim(),
            field1: row.find('input:eq(0)').val().trim(),
            field2: row.find('input:eq(1)').val().trim(),
            field3: row.find('input:eq(2)').val().trim(),
            field4: row.find('input:eq(3)').val().trim(),
            field5: row.find('input:eq(4)').val().trim(),
            field6: row.find('input:eq(5)').val().trim()
        };

        $.ajax({
            url: '../meta-5/tabla5.4_update.php',
            method: 'POST',
            data: rowData,
            success: function(response) {
                if (response === 'success') {
                    alert('Update successful');
                    location.reload();
                } else {
                    alert('Update failed');
                }
            },
            error: function() {
                alert('Error updating row');
            }
        });
    });
}