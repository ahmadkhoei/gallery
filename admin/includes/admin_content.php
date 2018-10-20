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


                    $user = new User();
                    $user-> username = "Example_username";
                    $user-> password = "Example_password";
                    $user-> first_name = "John";
                    $user-> last_name = "Doe";

                    $user->create();


                    // $user = User::find_users_by_id(2);
                    // $user->delete();

                    
                    // $user = User::find_users_by_id(12);
                    // $user->password = "Just password";
                    // $user->save();

                  
                    // $user = User::find_users_by_id(5);
                    // $user->username = "testupdate";
                    // $user->update();




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

