$(document).ready(function() {
    $('#profileForm').submit(function(event) {
      event.preventDefault();
  
      // Gather input values
      var age = $('#age').val();
      var dob = $('#dob').val();
      var contact = $('#contact').val();
      // Gather other profile information similarly
  
      // AJAX call to profile.php (replace with your backend endpoint)
      $.ajax({
        type: 'POST',
        url: 'profile.php',
        data: {
          age: age,
          dob: dob,
          contact: contact
          // Add other profile information fields here
        },
        success: function(response) {
          // Handle successful profile update response
          console.log('Profile updated:', response);
          // You can show a success message or redirect to another page upon successful profile update
        },
        error: function(xhr, status, error) {
          // Handle error cases
          console.error('Profile update error:', error);
          // You can display an error message to the user
        }
      });
    });
  });
  