<div style="width:150% ;" class="details  ">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Categories</h2>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn">Add category</button>
        </div>

        <table>
            <thead>
                <tr>
                    <td> Name</td>


                    <td></td>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data as $cate):
                    ?>
                    <tr>
                        <td><?= $cate->category ?></td>
                        <td><button value="<?= $cate->id ?>" style="margin-right: 5px;"
                                class="status edit inProgress">Edit</button><a
                                href="<?= APP_URL ?>category/deleteCategory/<?= $cate->id ?>" style="margin-left: 5px;"
                                onclick="return confirm('Are you sure you want to delete this category?')"
                                class="status return">delete</a></td>
                    </tr>





                    <?php
                endforeach;
                ?>


            </tbody>
        </table>
    </div>


</div>
<!-- Button trigger modal -->




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= APP_URL ?>category/addCategory" method="POST" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-floating">
                    <input type="text" class="form-control" name="category" id="category" placeholder="Your Name">
                    <label for="name">name</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="add" type="button" class="btn btn-primary"></input>
            </div>
        </div>
    </form>
</div>
<?php
use App\Helper\SessionHelper;

SessionHelper::success("success");
SessionHelper::danger("error");

?>