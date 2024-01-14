$(document).ready(function () {
   
    $("#alert").hide();
    $("#spiner").hide();

    var tags = [];
    $(".tagSelected").each(function (index, element) {
        
            var obj = {};
            obj["id"] = $(element).val();
            obj["name"] = $(element).text().trim();
            tags.push(obj);

           
            showtagsunderInput(tags);

          
            
       
    });
    console.log(tags);
    $(".tags").each(function (index, element) {
        $(element).click(function () {
            var obj = {};
            obj["id"] = $(element).val();
            obj["name"] = $(element).text();
            tags.push(obj);

           
            showtagsunderInput(tags);

            $(element).hide();
            
        });
    });
    
    
    function showtagsunderInput(tags){
        $("#tagsPlace").html("");
        tags.forEach(function (tag) {
            $("#tagsPlace").append(`
                <button value = "${tag.id}" data-id="${tag.id}" class="btn tag btn-secondary m-1 py-3 tagSelected">
                    ${tag.name}
                </button>
            `);
        });
    }
    $(document).on("click", ".tag", function () {
        const clickedValue = $(this).val(); 
       
        tags = tags.filter(tag => tag.id !== clickedValue);
        
        showtagsunderInput(tags);
        
       
        $(".tags").each(function (index, element) {  
             if(  $(element).val() === clickedValue)  $(element).show();

        })
        
        console.log(tags);
    });
    
    
   
    $("#form").on('submit', function (e) {
        e.preventDefault();
        $("#spiner").show();
        $("#signIn").hide();
        
        var formData = new FormData(this);
        var image = $("#image")[0].files[0];
        formData.append("image", image);
        console.log(tags)
        tags.forEach(tag => {
            formData.append("tagId[]", tag.id);
        });

        $.ajax({
            type: "POST",
            url: "http://localhost/Wiki_PHP_MVC/editwiki/update",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                setTimeout(() => {
                    $("#spiner").hide();
                    $("#signIn").show();
                }, 400);

                if (response === "1") {
                    
                    $("#alert").html("added successful! " ).addClass("alert-success").removeClass("alert-danger").show();
                    
                    swal("your Wiki added successful ", "You clicked the button!", "success")
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
