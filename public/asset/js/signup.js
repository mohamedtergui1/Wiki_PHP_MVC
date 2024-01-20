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
            url: "http://localhost/Wiki_PHP_MVC/signup/registre",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                setTimeout(() => {
                    $("#spiner").hide();
                    $("#regester").show();
                }, 400);


                if (response === "1") {
                    $("#alert").html("Registration successful! <br> don' forget your  password").addClass("alert-success").removeClass("alert-danger").show();
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
            $("#labelPassword").text("short password ").css("color", "red");
        } else {
            $("#labelPassword").text("valid password ").css("color", "green");
        }
    });
    const fullNamePattern = /^[a-zA-Z]+(?:\s[a-zA-Z'-]+)*$/;
    $("#username").on("blur", (e) => {
        e.preventDefault();

        if (fullNamePattern.test($(e.target).val())) {
            $("#labelFullName").text("valid  format ").css("color", "green");
        } else {
            $("#labelFullName").text("Invalid full name format").css("color", "red");
        }
    });


});
