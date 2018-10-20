          <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                    <?php
                   
                    //     $result_set = User::find_all_users();
                    //     while($row = mysqli_fetch_array($result_set)) {
                    //         echo $row['username'] . "<br>";
                    //     }


                    //    $found_user = User::find_users_by_id(2);
                    //    $user = User::instantiation($found_user);

                    //    echo $user->username;
                    //    echo "<br>";

                    //    $users = User::find_all_users();
                    //    foreach($users as $user) {
                    //        echo $user->username . "<br />";
                    //    }

                    //    $found_user = User::find_users_by_id(2);
                    //    echo $found_user->username;


                    // $user = new User();
                    // $user-> username = "newafterstatic";              
                    // $user->save();


                    // $user = User::find_users_by_id(2);
                    // $user->delete();

                    
                    // $user = User::find_users_by_id(12);
                    // $user->password = "Just password";
                    // $user->save();

                  
                    // $user = User::find_users_by_id(13);
                    // $user->username = "KomKIer";
                    // $user->password = "JooMIjf";
                    // $user->first_name = "PotSU";
                    // $user->last_name = "david";
                    // $user->update();

                    // $photos = Photo::find_all();
                    // foreach ($photos as $photo) {
                    //     echo $photo->title . "<br />"; 
                    // }

                    $photo = new Photo();
                    $photo-> title = "New photo";              
                    $photo-> size = "20";              
                    
                    $photo->create();




                    ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboa rd"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

