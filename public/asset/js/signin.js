$(document).ready(function () {
    $("#alert").hide();
    $("#spiner").hide();


    $("#form").on('submit', function (e) {
        e.preventDefault();
        $("#spiner").show();
        $("#signIn").hide();
    
        var formData = new FormData(this);
        
        
     
    
        $.ajax({
            type: "POST",
            url: "http://localhost/Wiki_PHP_MVC/signin/login",
            data: formData,
            contentType: false, 
            processData: false, 
            success: function (response) {
               
                setTimeout(() => {
                    $("#spiner").hide();
                    $("#signIn").show();
                }, 400);
    
              
                if (response === "1") {
                    $("#alert").html("log in successful! <br> enjoy" ).addClass("alert-success").removeClass("alert-danger").show();
                    setTimeout(() => {

                        window.location.href = "http://localhost/Wiki_PHP_MVC/";

                    }, 400);
                } else {
                    $("#alert").html(response).removeClass("alert-success").addClass("alert-danger").show();
                }
            },
            error: function (error) {
                console.log(error);
               
                $("#alert").html("Error during registration").removeClass("alert-success").addClass("alert-danger").show();
            }
        });
    });


    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    $("#email").on("blur", (e) => {
        e.preventDefault();
    
        if (emailPattern.test($(e.target).val())) {
            $("#labelEmail").text("Valid email format").css("color", "green");
        } else {
            $("#labelEmail").text("Invalid email format").css("color", "red");
        }
    });
    
    $("#password").on("blur", (e) => {
        e.preventDefault();
    
        if ($(e.target).val().length < 5) {
            $("#labelPassword").text("Invalid password format").css("color", "red");
        } else {
            $("#labelPassword").text("short password ").css("color", "green");
        }
    });
    
    
    
});
