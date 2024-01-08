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
            localStorage.setItem("token",username);
            // window.location.href = 'profile.html';
            console.log("helo",response);
            if (response.trim() === "success") {
                // window.location.href = 'profile.html';
            } else {
                $('#response').html(response);
            }
        }
    });
}
