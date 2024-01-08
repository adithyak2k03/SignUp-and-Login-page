function registerUser() {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var username = $('#username').val();
    var password = $('#password').val();

    // alert("Registering user...");
    alert(firstname + lastname);  
    // console.log("ooooooooooooooooo",);  

    $.ajax({
        type: 'POST',
        url: 'register_user.php',
        data: {
            firstname: firstname,
            lastname: lastname,
            username: username,
            password: password
        },
        success: function(response) {
            // alert(username);
            $('#response').html(response);
            // console.log("ooooooooooooooooo");
            
        }
    });
}
