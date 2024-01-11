<div class="details  scrollable-container">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Users</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <table style="width:1125px ;">
            <thead>
                <tr>
                    <td>title</td>
                    <td>category</td>
                    <td>author</td>
                    <td>stats</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>



                <?php
                foreach ($data as $wiki):
                    ?>



                    <tr>
                        <td><?= $wiki->title ?></td>
                        <td><?= $wiki->category ?></td>
                        <td><?= $wiki->username ?></td>
                        <td>
                            <?php
                            if ($wiki->status) {
                                echo $wiki->status; ?>

                            <?php } else { ?>
                                <a href="<?= APP_URL ?>Wiki/changeStatus/<?= $wiki->id ?>/akcepted" style="margin-right: 5px;"
                                    class="status delivered">approve</a><a
                                    href="<?= APP_URL ?>Wiki/changeStatus/<?= $wiki->id ?>/rejected" style="margin-left: 5px;"
                                    class="status return">reject</a>



                            <?php } ?>
                        </td>

                        <td><a href="<?= APP_URL ?><?= $wiki->id ?>" style="margin-right: 5px;"
                                class="status inProgress">Edit</a><a href="<?= APP_URL ?>wiki/deleteWiki/<?= $wiki->id ?>"
                                style="margin-left: 5px;"
                                onclick="return confirm('Are you sure you want to delete this wiki?')"
                                class="status return">delete</a></td>

                    </tr>

                    <?php


                endforeach;

                ?>






            </tbody>
        </table>
    </div>


</div>