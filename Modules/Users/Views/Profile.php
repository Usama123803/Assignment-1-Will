
                <div class="container-fluid">
                    <div class="page-head">
                        <h4 class="my-2"><?= $userdata['first_name'].' '.$userdata['last_name']; ?>'s Profile</h4>
                        <?php
                            if(session()->getFlashdata('success'))
                            {
                                echo "<div class=\"alert alert-success\" role=\"alert\">";
                                echo session()->getFlashdata('success');
                                echo "</div>";
                            }
                        ?>
                    </div>
                    <div class="row">
                        <!-- User Profile -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="card m-b-30 border-1">
                                <div class="row text-center text-white profile-block" style="height: 25px;">
                                </div>
                                
                                <div class="row text-center profile-block">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h5 class="mt-3"><b>Update Your Info</b></h5>
                                            <?php
                                                $validation = \Config\Services::validation();
                                                if($validation->getErrors() or session()->getFlashdata('error'))
                                                {
                                                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                                                    echo $validation->listErrors();
                                                    echo session()->getFlashdata('error');
                                                    echo "</div>";
                                                }
                                                elseif(session()->getFlashdata('profile'))
                                                {
                                                    echo "<div class=\"alert alert-success\" role=\"alert\">";
                                                    echo session()->getFlashdata('profile');
                                                    echo "</div>";
                                                }
                                            ?>
                                        </div> 
                                        <form class="form mt-5 contact-form" method="post">
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-line" type="text" name="first_name" placeholder="First Name" required="required" value="<?= $userdata['first_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-line" type="text" name="last_name"  placeholder="Last Name" required="required" value="<?= $userdata['last_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-line" type="email" name="email" placeholder="Email" disabled value="<?= $userdata['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-line" type="password" name="current_password" placeholder="Current Password">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-line" type="password" name="new_password" name="password" placeholder="New Password">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-line" type="text" name="phone" placeholder="Phone: 999-888-7777" value="<?= $userdata['phone']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 mt-4">
                                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- User Profile -->
                        <!-- Vehicles -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="card m-b-30 border-1s">
                                <div class="row text-center text-white profile-block" style="height: 25px;"></div>
                                    <div class="row text-center profile-block">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                <h5 class="mt-3"><b>Your Garage</b></h5>
                                                <a href="<?= site_url('/add_vehicle'); ?>"><button class="btn btn-primary" >Add</button></a><br>
                                                <div style="height: 25px;"></div>
                                                <?php
                                                    if(!$garage)
                                                    {
                                                        echo "Nothing in your garage";
                                                    }
                                                    else
                                                    { ?>
                                                        <div class="table-responsive-sm">
                                                        <table class="table">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Year</th>
                                                                    <th scope="col">Make</th>
                                                                    <th scope="col">Model</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <?php
                                                                        foreach($garage as $g)
                                                                        {
                                                                            echo "<tr>";
                                                                            echo "<td><a href=\"".site_url('/edit_vehicle//'.$g->id)."\">".$g->year."</a></td>";
                                                                            echo "<td>".$g->make."</td>";
                                                                            echo "<td>".$g->model."</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                            </div> 
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!-- Vehicles -->
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="card m-b-30 border-0">
                                <div class="row text-center text-white profile-block" style="height: 25px;">
                                    <!-- <div class="col-4 align-self-center">
                                        <a href="#">
                                            <i class="fa fa-phone"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 ml-auto align-self-center">
                                        <a href="#">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                    </div> -->
                                </div>
                                <!-- <div class="card-body pro-img mx-auto text-center">
                                    <img src="Modules/Backend/assets/images/users/avatar-7.jpg" alt="" class="rounded-circle mx-auto d-block">
                                </div> -->
                                <div class="text-center">
                                    <h5>Robert N. Carlile</h5>
                                    <p class="text-muted">Founder of Company</p>
                                    <p class="text-muted p-2">Hi I'm Robert Carlile,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                                    <button class="btn btn-outline-info mb-3">Follow</button>
                                </div>
                                
                                <div class="row text-center profile-block">
                                    <div class="col-6 align-self-center py-3 border-right">
                                        <p class="profile-count">15,521</p>
                                        <p class="mb-0">Followers</p>
                                    </div>
                                    <div class="col-6 align-self-center py-3">
                                        <p class="profile-count">772</p>
                                        <p class="mb-0">Followings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card m-b-30 border-0">
                                <div class="row text-center text-white profile-block" style="height: 25px;">
                                    <!-- <div class="col-4 align-self-center">
                                        <a href="#">
                                            <i class="fa fa-phone"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 ml-auto align-self-center">
                                        <a href="#">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                    </div> -->
                                </div>
                                <!-- <div class="card-body pro-img mx-auto text-center">
                                    <img src="Modules/Backend/assets/images/users/avatar-7.jpg" alt="" class="rounded-circle mx-auto d-block">
                                </div> -->
                                <div class="text-center">
                                    <h5>Robert N. Carlile</h5>
                                    <p class="text-muted">Founder of Company</p>
                                    <p class="text-muted p-2">Hi I'm Robert Carlile,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
                                    <button class="btn btn-outline-info mb-3">Follow</button>
                                </div>
                                
                                <div class="row text-center profile-block">
                                    <div class="col-6 align-self-center py-3 border-right">
                                        <p class="profile-count">15,521</p>
                                        <p class="mb-0">Followers</p>
                                    </div>
                                    <div class="col-6 align-self-center py-3">
                                        <p class="profile-count">772</p>
                                        <p class="mb-0">Followings</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>                   
                    
                </div><!--end container-->

                <!--footer section start-->
                <footer class="footer">
                    <!-- 2018 &copy; Syntra. -->
                </footer>
                <!--footer section end-->
            </div>
            <!--end body content-->
        </section>

        