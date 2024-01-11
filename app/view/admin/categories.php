

           
            
            <div   style="width:150% ;"  class="details  ">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Users</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table >
                        <thead>
                            <tr>
                                <td> Name</td>
                                
                              
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                foreach($data as $cate ):
                             ?>
                            <tr>
                                <td><?=$cate->category?></td>
                                <td  ><a href="<?=APP_URL?>/<?=$cate->id?>" style="margin-right: 5px;" class="status inProgress">Edit</a><a href="<?=APP_URL?>/<?=$cate->id?>" style="margin-left: 5px;" onclick="return confirm('Are you sure you want to delete this category?')"  class="status return">delete</a></td>
                            </tr>

                           

                         

                         <?php
                            endforeach;
                         ?>

                           
                        </tbody>
                    </table>
                </div>

              
            </div>
