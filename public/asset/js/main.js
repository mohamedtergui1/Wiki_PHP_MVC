(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('bg-primary shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('bg-primary shadow-sm').css('top', '-150px');
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // // Testimonials carousel
    // $(".testimonial-carousel").owlCarousel({
    //     items: 1,
    //     autoplay: true,
    //     smartSpeed: 1000,
    //     dots: true,
    //     loop: true,
    //     nav: true,
    //     navText : [
    //         '<i class="bi bi-chevron-left"></i>',
    //         '<i class="bi bi-chevron-right"></i>'
    //     ]
    // });
 
    $("#logOut").click(() => {
        const logout = "logout";
        $.ajax({
            type: "POST", // Changed to POST
            url: "http://localhost/Wiki_PHP_MVC/signin/logout",
            data: { logout: logout, method: "POST" }, // Specify the method as POST
            success: function (response) {
                if (response === "1") {
                    window.location.href = "http://localhost/Wiki_PHP_MVC/signin";
                }
            },
            error: function (error) {
                console.error("Error during logout:", error);
            }
        });
    });

    $("#search").on("input", () => {
        const typesearch = $("#filter").val().trim();
        const search = $("#search").val().trim();
        console.log(typesearch);
        var link ;
        if(typesearch === "title")  link= "http://localhost/Wiki_PHP_MVC/wiki/findbytitle";
         else if(typesearch=="category")  link= "http://localhost/Wiki_PHP_MVC/wiki/findbycategory";
       else if(typesearch=="tag")  link= "http://localhost/Wiki_PHP_MVC/wiki/findbycategory";
       var  tagCategory ="null";
        if (search !== "") {
            $("#ResultPlace").html("");
              
            $.ajax({
                type: "POST",
                url: link,
                data: { search: search, 
                      tagCategory : tagCategory
                },
                dataType: "json",  
                success: function (response) {
                    response.forEach(res => {
                        showDat(res);
                    });
                },
                error: function (error) {
                    console.error("Error:", error);
                }
            });
        }
    });
    
    
    
    function showDat(res) {
        $("#ResultPlace").append(
            `
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="case-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="http://localhost/Wiki_PHP_MVC/public/asset/wikisImage/${res.wikiImage}" alt="">
                    <a class="case-overlay text-decoration-none" href="http://localhost/Wiki_PHP_MVC/wiki/veiw/${res.id}">
                        <small>${res.category}</small>
                        <h5 class="lh-base text-white mb-3">${res.title}</h5>
                        <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <span class="rounded m-2" style="height:3rem; width:3rem; z-index: 100; overflow:hidden;">
                        <img style="height:3rem; width:3rem; z-index: 100;" src="http://localhost/Wiki_PHP_MVC/public/asset/usersImage/${res.authorImage}" alt="author">
                    </span>
                    <h5>${res.username}</h5>
                </div>
            </div>
            `
        );
    }
    
    
})(jQuery);


