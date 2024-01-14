<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header mb-5">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Wi.Ki</div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">Discover, Share, Learn: Your Wiki Journey
                    Begins Here</h1>
                <p class="text-white mb-4 animated slideInRight">Explore a collaborative haven of knowledge a Wiki ,
                    where enthusiasts share and discover
                    insightful articles, fostering a community-driven wealth of information.</p>
                <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">Read More</a>
                <a href="<?= APP_URL ?>contact"
                    class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="<?= APP_URL ?>public/asset/img/Wikipedia-Logo-PNG-Transparent.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<div class="container">

    <div style="height:5rem;" class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-2">
            <select id="filter" class="form-select" aria-label="Default select example">
                <option value="title">title</option>
                <option value="category">category</option>
                <option value="tag">tag</option>
            </select>
        </div>
        <div class="col-md-2">
            <select id="categoryTag" class="form-select " aria-label="Default select example">

            </select>
        </div>
        <div class="col-md-8">

            <div class="search">

                <input id="search" type="text" class="form-control" placeholder="search">

            </div>

        </div>

    </div>
</div>



<div class="container-fluid bg-light py-5">
    <div class="container py-5">

        <div id="ResultPlace" class="row g-4">
            <?php
            foreach ($data["wiki"] as $i => $w):
                if ($w->wikiImage == null)
                    continue;
                ?>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="<?= APP_URL ?>public/asset/wikisImage/<?= $w->wikiImage ?>" alt="">
                        <a class="case-overlay text-decoration-none" href="<?= APP_URL ?>wiki/veiw/<?= $w->id ?>">
                            <small>
                                <?= $w->category ?>
                            </small>
                            <h5 class="lh-base text-white mb-3">
                                <?= $w->title ?>
                            </h5>
                            <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                        </a>

                    </div>
                    <div class="d-flex align-items-center  ">
                        <span class="rounded  m-2 " style="height:3rem; width:3rem; z-index: 100; overflow:hidden;  ">
                            <img style="height:3rem; width:3rem; z-index: 100;"
                                src="<?= APP_URL ?>public/asset/usersImage/<?= $w->authorImage ?>" alt="author">

                        </span>
                        <h5>
                            <?= $w->username ?>
                        </h5>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</div>


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
            <div class="modal-header border-0">
                <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-light p-3"
                        placeholder="Type search keyword">
                    <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Full Screen Search End -->





<!-- Service Start -->
<div class="container-fluid bg-light mt-5 py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Categories</div>
                <h1 class="mb-4">Our Excellent Categories for You</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                    amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                    clita duo justo et tempor eirmod magna dolore erat amet</p>
                <a class="btn btn-primary rounded-pill px-4" href="">Read More</a>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row g-4">

                            <?php
                            $category = $data["category"];
                            foreach ($category as $i => $cate):
                                if ($i > 1)
                                    break;
                                ?>


                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-robot fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">
                                            <?= $cate->category ?>
                                        </h5>
                                        <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                                            diam sed stet lorem.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="<?= $cate->id ?>">Show Wikis in this
                                            category</a>

                                    </div>
                                </div>


                                <?php
                            endforeach;

                            ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row g-4">

                            <?php

                            foreach ($category as $i => $cate):
                                if ($i < 2)
                                    continue;
                                if ($i > 3)
                                    break;
                                ?>


                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa fa-robot fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">
                                            <?= $cate->category ?>
                                        </h5>
                                        <p>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                                            diam sed stet lorem.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="<?= $cate->id ?>">Show Wikis in this
                                            category</a>
                                    </div>
                                </div>


                                <?php
                            endforeach;

                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->




<!-- Case Start -->

<!-- Case End -->





<!-- Team Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Some Authors</div>
                <h1 class="mb-4">Meet Our Experienced Team Members</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                    amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                    clita duo justo et tempor eirmod magna dolore erat amet</p>
                <a class="btn btn-primary rounded-pill px-4" href="">Read More</a>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="row g-4">

                            <?php
                            $user = $data["author"];
                            $a = 0;
                            foreach ($user as $i => $u):
                                if ($u->image)
                                    $a++;
                                else
                                    continue;

                                if ($a > 2)
                                    break;
                                ?>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img style=" height: 18rem;     width: 18rem;" class="img-fluid rounded-circle p-4"
                                            src="<?= APP_URL ?>public/asset/usersImage/<?= $u->image ?>" alt="">
                                        <h5 class="mb-0">
                                            <?= $u->username ?>
                                        </h5>
                                        <small>Founder & CEO</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 pt-md-4">
                        <div class="row g-4">
                            <?php
                            $user = $data["author"];
                            $a = 0;
                            foreach ($user as $i => $u):
                                if ($u->image)
                                    $a++;
                                else
                                    continue;

                                if ($a < 3)
                                    continue;
                                if ($a > 4)
                                    break;
                                ?>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img style=" height: 18rem;     width: 18rem;" class="img-fluid rounded-circle p-4"
                                            src="<?= APP_URL ?>public/asset/usersImage/<?= $u->image ?>" alt="">
                                        <h5 class="mb-0">
                                            <?= $u->username ?>
                                        </h5>
                                        <small>Founder & CEO</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- FAQs Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Popular FAQs</div>
            <h1 class="mb-4">Frequently Asked Questions</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="accordion" id="accordionFAQ1">
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                How to build a website?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How long will it take to get a new website?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do you only create HTML websites?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.4s">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Will my website be mobile-friendly?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionFAQ1">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion" id="accordionFAQ2">
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.5s">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Will you maintain my site for me?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.6s">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                I’m on a strict budget. Do you have any low cost options?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.7s">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Will you maintain my site for me?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeIn" data-wow-delay="0.8s">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                I’m on a strict budget. Do you have any low cost options?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionFAQ2">
                            <div class="accordion-body">
                                Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et magna diam
                                aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs Start -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $("#categoryTag").hide();
        $("#filter").on('change', function () {

            var selectedValue = $(this).val().trim();
            var filterSelect = $("#categoryTag");

            filterSelect.html("");

            if (selectedValue === "title") {
                filterSelect.hide(200);
            } else if (selectedValue === "category") {
                <?php foreach ($data["category"] as $cate): ?>
                    filterSelect.append('<option value="<?= $cate->id ?>"><?= $cate->category ?></option>');
                <?php endforeach; ?>
                filterSelect.show(200);
            } else if (selectedValue === "tag") {
                <?php foreach ($data["tag"] as $tag): ?>
                    filterSelect.append('<option value="<?= $tag->id ?>"><?= $tag->tag ?></option>');
                <?php endforeach; ?>
                filterSelect.show(200);
            }
        });
    });
</script>