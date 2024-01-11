
            
            <div    class="details  scrollable-container">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Users</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table style="width:1125px ;" >
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
                                foreach($data as $user ):
                             ?>

                            <tr>
                                <td><?=$user->username?></td>
                                <td><?=$user->email?></td>
                                <td><?=$user->password?></td>
                                <td><?=$user->roleID == 1 ? "admin" : "user"?></td>
                                <td  ><a href="<?=APP_URL?>/<?=$user->id?>" style="margin-right: 5px;" class="status inProgress">Edit</a><a href="<?= APP_URL ?>/<?= $user->id ?>" style="margin-left: 5px;" onclick="return confirm('Are you sure you want to delete this user?')" class="status return">delete</a>
</td>
                              
                            </tr>

                           

                         <?php 
                               endforeach;

                            ?>

                        

                           
                        </tbody>
                    </table>
                </div>

              
            </div>
