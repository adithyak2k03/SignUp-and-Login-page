function updateUser() {
    var dob = $('#dob').val();
    var age = $('#age').val();
    var contact = $('#contact').val();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    

    // alert("Registering user...");
    // alert(firstname + lastname);  
    // console.log("ooooooooooooooooo",);  

    alert("updating userr....");
    $.ajax({
        type: 'POST',
        url: 'profile_user.php',
        data: {
            username: localStorage.getItem("token"),
            dob: dob,
            age: age,
            contact: contact,
            firstname: firstname,
            lastname: lastname,
        },
        success: function(response) {
            // alert(username);
            $('#response').html(response);
            // console.log("ooooooooooooooooo");
            
        }
    });
}

function logOut(){
    localStorage.removeItem("token");
    window.location.href ="index.html";
}



// function fetchUser(){
    var username = localStorage.getItem("token");
    $.ajax({
        type: 'POST',
        url: 'fetch_user.php',
        data: {
            username: username,
        },
        success: function(response) {
            // console.log(username);
            // console.log(response);
            // const res = response.json();
            const res = JSON.parse(response)
            console.log(">>>>>>>",res);

            var heading_element = document.getElementById("profileheading");
            heading_element.innerHTML= localStorage.getItem("token") + "'s Profile"; 
            
            var firstname_element = document.getElementById("firstname");
            firstname_element.value = res.firstname;

            var lastname_element = document.getElementById("lastname");
            lastname_element.value = res.lastname;


            var age_element = document.getElementById("age");
            age_element.value = res.age;

            var contact_element = document.getElementById("contact");
            contact_element.value = res.contact;

            var dob_element = document.getElementById("dob");
            dob_element.value = res.dob;

            $('#response').html(response);
            // console.log("ooooooooooooooooo");
            
        }
    });

// }
