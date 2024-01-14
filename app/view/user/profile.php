<style>
    body {
        background-color: #000000
    }

    .padding {
        padding: 3rem !important;
        margin-left: 200px
    }

    .card-img-top {
        height: 300px;
    }

    .card-no-border .card {
        border-color: #d7dfe3;
        border-radius: 4px;
        margin-bottom: 30px;
        -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem
    }

    .pro-img {
        margin-top: -80px;
        margin-bottom: 20px
    }

    .little-profile .pro-img img {
        width: 128px;
        height: 128px;
        -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 100%
    }

    html body .m-b-0 {
        margin-bottom: 0px
    }

    h3 {
        line-height: 30px;
        font-size: 21px
    }

    .btn-rounded.btn-md {
        padding: 12px 35px;
        font-size: 16px
    }

    html body .m-t-10 {
        margin-top: 10px
    }

    .btn-primary,
    .btn-primary.disabled {
        background: #7460ee;
        border: 1px solid #7460ee;
        -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
        box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
        -webkit-transition: 0.2s ease-in;
        -o-transition: 0.2s ease-in;
        transition: 0.2s ease-in
    }

    .btn-rounded {
        border-radius: 60px;
        padding: 7px 18px
    }

    .m-t-20 {
        margin-top: 20px
    }

    .text-center {
        text-align: center !important
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #455a64;
        font-family: "Poppins", sans-serif;
        font-weight: 400
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }
</style>

<div style="margin-left:64px;" class="padding ml-2 container d-flex  justify-content-center">
    <div class="col-md-8">
        <!-- Column -->
        <div class="card">
            <div class="card-img-top  d-flex justify-content-center" >
             <img style="width: 46%;" 
                src="<?= APP_URL ?>public/asset/img/Wikipedia-Logo-PNG-Transparent.png" alt="Card image cap">
                </div>
            <div class="card-body little-profile text-center">
                <div class="pro-img"><img src="<?= APP_URL . "public/asset/usersImage/" . $infoUser->image ?>" alt="user">
                </div>
                <h3 class="m-b-0">
                    <?= $infoUser->username ?>
                </h3>
                <p>
                    <?= $infoUser->bio ?>
                </p> <a href="javascript:void(0)"
                    class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-abc="true">Edit</a>
                <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">10434</h3><small>Articles</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">434K</h3><small>Followers</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">5454</h3><small>Following</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-light py-5">
    <div class="d-flex justify-content-center  ">
        <h3 class="text-3xl">
            your Wikis
        </h3>
    </div>
    <div class="container py-5">

        <div class="row g-4">
            <?php
            foreach ($data as $i => $w):
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
                    <div class="d-flex align-items-center   ">

                        <a class="btn btn-success 
                        <?= $w->status == null ? "btn-primary" : ($w->status == "accepted" ? "btn-success" : "btn-danger") ?>
                        return">
                            <?= $w->status == null ? "pending" : $w->status ?>
                        </a>

                        <div class="mx-5">
                            <a href="<?= APP_URL ?>editwiki/edit/<?= $w->id ?>" style="margin-left: 5px;"
                                class="btn btn-primary ">update
                            </a>
                            <a href="<?= APP_URL ?>wiki/deleteWiki/<?= $w->id ?>" style="margin-left: 5px;"
                                onclick="return confirm('Are you sure you want to delete this wiki?')"
                                class="btn btn-danger return">delete
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div id="alert" class=" alert alert-success" role="alert">

                    </div>
                <form id="form">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" value="<?=$infoUser->username?>" name="username"
                                    placeholder="Full Name">
                                <label for="name">Full Name</label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="<?=$infoUser->email?>" id="email" name="email"
                                    placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" value="" class="form-control" id="password" name="password"
                                    placeholder="Subject">
                                <label for="message">Password</label>
                            </div>
                        </div>
                        <input type="hidden" value="<?=$infoUser->id?>" class="form-control" id="id" name="id"
                        
                        
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="file" class="form-control" id="image" name="image" placeholder="Subject">
                                <label for="message">Image</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit"><span></span>
                                <span id="regester">ADD</span>
                                <div id="spiner" class=" spinner-border text-light" role="status">

                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               
            </div>
        </div>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= APP_URL ?>/public/assets/js/editUser.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
use App\Helper\SessionHelper;

SessionHelper::success("success");
SessionHelper::danger("error");

?>