$(document).ready(function () {
    $("#alert").hide();
    $("#spiner").hide();

 var tag = {
       idtag : 2
 }
    $("#form").on('submit', function (e) {
        e.preventDefault();
        $("#spiner").show();
        $("#signIn").hide();
    
        var formData = new FormData(this);
       
        
     
    
        $.ajax({
            type: "POST",
            url: "http://localhost/Wiki_PHP_MVC/addwiki/insert",
            data: formData,
            contentType: false, 
            processData: false, 
            success: function (response) {
               
                setTimeout(() => {
                    $("#spiner").hide();
                    $("#signIn").show();
                }, 400);
    
              
                if (response === "1") {
                    $("#alert").html("added successful!" ).addClass("alert-success").removeClass("alert-danger").show();
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
