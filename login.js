function loginUser() {
    var username = $('#username').val();
    var password = $('#password').val();

    $.ajax({
        type: 'POST',
        url: 'login_user.php',
        data: {
            username: username,
            password: password
        },
        success: function(response) {
            var jsonResponse = JSON.parse(response);
            // console.log(">>>>>>>>>>",response);
            
            if (jsonResponse.status === "success") {
                localStorage.setItem("token", username);
                window.location.href = 'profile.html';
            } else {
                alert("Invalid username or password!")
                $('#response').html(jsonResponse.message);
                window.location.href = 'index.html';
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#response').html('Error: Unable to process the request.');
            window.location.href = 'index.html';
        }
    });
}
