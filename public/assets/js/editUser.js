$(document).ready(function () {
    
    $("#alert").hide();
    $("#spiner").hide();


    $("#form").on('submit', function (e) {
        e.preventDefault();
        $("#spiner").show();
        $("#regester").hide();
    
        var formData = new FormData(this);
        var image = $("#image")[0].files[0];
        
        formData.append("image", image);
    
        $.ajax({
            type: "POST",
            url: "http://localhost/Wiki_PHP_MVC/user/editUser",
            data: formData,
            contentType: false, 
            processData: false, 
            success: function (response) {
               
                setTimeout(() => {
                    $("#spiner").hide();
                    $("#regester").show();
                }, 400);
    
              
                if (response === "1") {
                    $("#alert").html("your information update successful!" ).addClass("alert-success").removeClass("alert-danger").show();
                    
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
