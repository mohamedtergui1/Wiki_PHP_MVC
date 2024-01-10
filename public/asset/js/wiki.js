$(document).ready(function () {
   
    $("#alert").hide();
    $("#spiner").hide();

    var tags = [];

    $(".tags").each(function (index, element) {
        $(element).click(function () {
            var obj = {};
            obj["id"] = $(element).val();
            obj["name"] = $(element).text();
            tags.push(obj);

            $("#tagsPlace").html("");
            tags.forEach(function (tag) {
                $("#tagsPlace").append(`
                    <span data-id="${tag.id}" class="btn btn-secondary m-1 py-3 tagSelected">
                        ${tag.name}
                    </span>
                `);
            });
            
            $(element).hide();
            console.log(tags);
        });
    });
    
    
    
    
   
    $("#form").on('submit', function (e) {
        e.preventDefault();
        $("#spiner").show();
        $("#signIn").hide();
        
        var formData = new FormData(this);
        console.log(tags)
        tags.forEach(tag => {
            formData.append("tagId[]", tag.id);
        });

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
                    

                    swal("your Wiki addedd withd succcess ", "You clicked the button!", "success")
                    // setTimeout(() => {
                    //     window.location.href = "http://localhost/Wiki_PHP_MVC/";
                    // }, 400);
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
