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
