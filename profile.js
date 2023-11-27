$(document).ready(function() {
    // Load user profile details on page load
    loadUserProfile();

    // Handle profile update using AJAX
    $('#content').on('click', '#update-profile-btn', function() {
        updateUserProfile();
    });
});

function loadUserProfile() {
    $.ajax({
        url: 'get_profile_data.php',
        type: 'GET',
        success: function(response) {
            // Populate the form fields with user profile data
            // Assuming the response is a JSON object with user details
            var profileData = JSON.parse(response);
            $('#age').val(profileData.age);
            $('#dob').val(profileData.dob);
            $('#contact').val(profileData.contact);
        }
    });
}

function updateUserProfile() {
    // Collect updated profile data from the form
    var updatedProfileData = {
        age: $('#age').val(),
        dob: $('#dob').val(),
        contact: $('#contact').val()
    };

    $.ajax({
        url: 'update_profile.php',
        type: 'POST',
        data: updatedProfileData,
        success: function(response) {
            // Handle the response after updating the profile
            // For example, show a success message or handle errors
        }
    });
}
