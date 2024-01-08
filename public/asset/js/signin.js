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
    
});
