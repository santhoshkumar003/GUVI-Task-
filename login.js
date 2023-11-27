// login.js

$(document).ready(function() {
    // Event listener for login button
    $('#content').on('click', '#login-btn', function() {
        loginUser();
    });
});

function loginUser() {
    // Get the values from the login form
    var username = $('#username').val();
    var password = $('#password').val();

    // Perform AJAX login request
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: { username: username, password: password },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Redirect to the profile page on successful login
                loadContent('profile');
            } else {
                // Display an error message
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: 'Invalid username or password.',
                });
            }
        },
        error: function() {
            // Display an error message
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred during login.',
            });
        }
    });
}
