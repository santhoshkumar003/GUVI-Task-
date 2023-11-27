function registerUser() {
    var username = $('#username').val();
    var password = $('#password').val();
    var email = $('#email').val();

    // Validate inputs (add your validation logic here)

    $.ajax({
        url: 'register.php',
        type: 'POST',
        data: {
            username: username,
            password: password,
            email: email
        },
        success: function(response) {
            // Handle the registration response
            if (response.success) {
                // Registration successful, you may redirect or show a success message
                // For example, you can redirect to the login page
                loadContent('login');
            } else {
                // Registration failed, show an error message
                showError(response.message);
            }
        },
        error: function() {
            // Handle the AJAX error
            showError('Error during registration. Please try again.');
        }
    });
}

function showError(message) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: message
    });
}
