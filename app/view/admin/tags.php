<div style="width:150% ;" class="details  ">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Users</h2>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn">Add Tag</button>
        </div>

        <form id="formEdit" method="post" class="row" action="<?= APP_URL ?>tag/updatetag">
            <div class="form-floating  col">
                <input id="edit_name" name="tag" value="" type="text" class="form-control" placeholder="Your Name">
                <input id="edit_id" name="id" type="hidden" value="">
                <label for="name">name</label>
            </div>
            <div class="form-floating  col">

                <button type="submit" class="btn btn-primary">edit</button>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <td> Name</td>


                    <td></td>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data as $tag):
                    ?>
                    <tr>
                        <td class="editname">
                            <?= $tag->tag ?>
                        </td>
                        <td><button value="<?= $tag->id ?>" style="margin-right: 5px;"
                                class="status edit inProgress">Edit</button><a
                                href="<?= APP_URL ?>tag/deleteTag/<?= $tag->id ?>" style="margin-left: 5px;"
                                onclick="return confirm('Are you sure you want to delete this tag?')"
                                class="status return">delete</a></td>
                    </tr>
                    <?php
                endforeach;
                ?>


            </tbody>
        </table>
    </div>


</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= APP_URL ?>tag/addtag" method="POST" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add tag</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-floating">
                    <input type="text" class="form-control" name="tag" id="tag" placeholder="Your Name">
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#formEdit").hide();
        const name = $(".editname");

        $(".edit").each(function (i, e) {
            $(e).click(function () {
                $("#formEdit").show(100);
                $("#edit_id").val($(e).val());
                $("#edit_name").val(name[i].textContent);
            });
        });
    });
</script>