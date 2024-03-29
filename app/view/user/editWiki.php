    <!-- Hero Start -->
    <?php
            $tags = $data["tags"];
            $allTags = $data["Alltags"];
            $wiki = $data["wiki"][0];
            $category = $data["category"];

           
    ?>
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight"><?=$title?></h1>
                  
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/hero-img.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


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


    <!-- Contact Start -->
    <div  class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3"><?=$title?></div>
                <h1 class="mb-4">Connect with Us: Your Feedback Matters!</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <p class="text-center mb-4">Thank you for reaching out to us. Your feedback, inquiries, and suggestions are valuable to us as we strive to enhance your experience on our website. If you have questions about the content, need assistance with a particular feature, or wish to report any issues, please feel free to contact us using the form below. Our dedicated team is committed to providing timely and informative responses. We appreciate your engagement and look forward to 
                        hearing from you. Your input contributes to the continuous improvement of our platform, ensuring a valuable and user-friendly experience for all. </p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                    <div id="alert" class=" alert alert-success" role="alert">
                        
                        </div>
                        <form  id="form" >
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" value="<?=$wiki->title?>" class="form-control" name="title" id="title" placeholder="Your Name">
                                        <label for="name">title</label>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?=$wiki->id?>" >
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                    <select class="form-control" name="categoryID" id="categoryID">
                                        <option selected  value="<?=$wiki->categoryID?>"><?=$wiki->category?></option>
                                        <?php
                                           
                                            foreach ($category as $cate):
                                                if($wiki->categoryID==$cate->id) continue;
                                        ?>
                                            <option value="<?= $cate->id ?>"><?= $cate->category ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                        <label for="subject">Category</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="content" name="content" style="height: 150px"><?=$wiki->content?></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                <div class="col-6">
                            <div class="form-floating">
                                <input type="file" class="form-control" id="image" name="image" placeholder="Subject">
                                <label for="message">Image</label>
                            </div>
                        </div>
                                <div id="tagsPlace" class="d-flex flex-wrap" >

                                <?php
                               
                                       foreach($tags as $t):
                                        
                                  ?>
                                    <button value = "<?=$t->id?>"  class="btn tag btn-secondary m-1 py-3 tagSelected"><?=$t->tag?></button>
                                       <?php
                                       endforeach;
                                  ?>

                                </div>
                                <span  class="btn btn-success mt-3 mb-3 py-3" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                    Add Tags
                                </span>
                                <button class="btn btn-primary w-100 py-3" type="submit"><span></span>
                                    <span id="regester">update</span>
                                    <div id="spiner" class=" spinner-border text-light" role="status">

                                    </div>
                                </button>
                                                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php 
             
              foreach($allTags as $t):
                

        ?>
    <button value="<?=$t->id?>"  class=" <?= in_array($t,$tags) ? "d-none" : ""  ?>  btn btn-success mb-3 py-3 tags "  >
    <?=$t->tag?>
                                </button>
        <?php 
         
              endforeach;
         ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/8bbf5ux15rmt3choi30m1dz7v2m6imkwwv77qovmswf0mq5z/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>


    <!-- Contact End -->
        
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= APP_URL ?>/public/asset/js/wikiEdit.js"></script>
 


    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">