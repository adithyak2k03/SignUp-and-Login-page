$(document).ready(function() {
    $('#loginForm').submit(function(event) {
      event.preventDefault();
  
      // Gather input values
      var email = $('#email').val();
      var password = $('#password').val();
  
      // AJAX call to login.php (replace with your backend endpoint)
      $.ajax({
        type: 'POST',
        url: 'login.php',
        data: {
          email: email,
          password: password
        },
        success: function(response) {
          // Handle successful login response
          console.log('Login successful:', response);
          // You can redirect to profile page or perform other actions upon successful login
        },
        error: function(xhr, status, error) {
          // Handle error cases
          console.error('Login error:', error);
          // You can display an error message to the user
        }
      });
    });
  });
  