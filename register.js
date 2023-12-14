$(document).ready(function() {
    $('#registerForm').submit(function(event) {
      event.preventDefault();
  
      // Gather input values
      var fullName = $('#fullName').val();
      var email = $('#email').val();
      var password = $('#password').val();
  
      // AJAX call to register.php (replace with your backend endpoint)
      $.ajax({
        type: 'POST',
        url: 'register.php',
        data: {
          fullName: fullName,
          email: email,
          password: password
        },
        success: function(response) {
          // Handle successful registration response
          console.log('Registration successful:', response);
          // You can show a success message or redirect to a login page upon successful registration
        },
        error: function(xhr, status, error) {
          // Handle error cases
          console.error('Registration error:', error);
          // You can display an error message to the user
        }
      });
    });
  });
  