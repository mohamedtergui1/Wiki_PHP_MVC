<div class="details  scrollable-container">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Users</h2>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn">Add user</button>

        </div>

        <table style="width:1125px ;">
            <thead>
                <tr>
                    <td>Full Name</td>
                    <td>email</td>
                    <td>password</td>
                    <td>role</td>
                    <td></td>

                </tr>
            </thead>

            <tbody>

                <?php
                foreach ($data as $user):
                    ?>

                    <tr>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->password ?></td>
                        <td><?= $user->roleID == 1 ? "admin" : "user" ?></td>
                        <td><a href="<?= APP_URL ?>/<?= $user->id ?>" style="margin-right: 5px;"
                                class="status inProgress">Edit</a><a href="<?= APP_URL ?>user/delete/<?= $user->id ?>"
                                style="margin-left: 5px;"
                                onclick="return confirm('Are you sure you want to delete this user?')"
                                class="status return">delete</a>
                        </td>

                    </tr>



                <?php
                endforeach;

                ?>




            </tbody>
        </table>
    </div>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div action="<?= APP_URL ?>category/addCategory" method="POST" class="modal-dialog">
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
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Full Name">
                                <label for="name">Full Name</label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Subject">
                                <label for="message">Password</label>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <select name="roleID" id="roleID" class="form-select" aria-label="Default select example">
                          
                                      <option value="2">author</option>
                                    <option value="1">admin</option>
                        </select>
                        </div>
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
<script src="<?= APP_URL ?>/public/assets/js/user.js"></script>
    <?php
    use App\Helper\SessionHelper;

    SessionHelper::success("success");
    SessionHelper::danger("error");

    ?>