<?php

$wiki = $data["wiki"];
$wiki = $wiki[0];
$tag =  $data["tags"];

?>
<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight"><?= $wiki->title ?> </h1>

            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="img/hero-img.png" alt="" style="max-height: 300px;">
            </div>
        </div>
    </div>
</div>
<div class="   ">

    <div>
    <img style="width:100%; height:28rem;" class="img-fluid" src="<?= APP_URL ?>public/asset/wikisImage/<?= $wiki->wikiImage ?>" alt="">
                        <a class="case-overlay text-decoration-none p-5 " >
                        <div class="lh-base text-white mb-3 d-flex flex-wrap">
                        <h6 class="text-white"  >category</h6>
                            <small class="mx-2" >
                                
                                <?= $wiki->category ?>
                            </small>
                        </div>
                            <div class="lh-base text-white mb-3 d-flex flex-wrap"> 
                                 <h6 class="text-white mx-2 mt-1"  >tags</h6>
                            <?php
                             foreach($tag as $t): 
                              ?>
                            
                            <small class="mx-2" >
                                <?= $t->tag ?>
                            </small>
                            <?php 
                        endforeach;  
                        ?>
                            </div>
                            <div class="lh-base text-white mb-3 d-flex flex-wrap">
                            <h6 class="text-white"  >date and time</h6>
                            <small class="mx-2" > 
                            <?= $wiki->datetime ?>
                            </small>
                            </div>
                        </a>

        <div class="d-flex flex-wrap">

        </div>
        

    </div>
    

</div>
<div class="pt-5 container">
    <?= $wiki->content ?>
</div>

