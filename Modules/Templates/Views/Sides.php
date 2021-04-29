<body class="sticky-header">
        <section>
            <!-- sidebar left start-->
            <div class="sidebar-left">
                <div class="sidebar-left-info">

                    <div class="user-box">
                        <!-- <div class="d-flex justify-content-center">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="img-fluid rounded-circle"> 
                        </div> -->
                        <div class="text-center text-white mt-2">
                            <h6><?= session()->get('myname'); ?></h6>
                        </div>
                    </div>   
                                        
                    <!--sidebar nav start-->
                    <ul class="side-navigation">
                        <li>
                            <h3 class="navigation-title">Navigation</h3>
                        </li>
                        <li>
                            <a href="<?= site_url('/user_dash'); ?>"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="<?= site_url('/user_profile'); ?>"><i class="ti ti-user"></i> <span>Profile</span></a>
                                <!-- <ul class="child-list">
                                    <li><a href="#"> Garage</a></li>
                                    <li><a href="#"> Update</a></li>
                                </ul> -->
                        </li>
                        <li class="menu-list">
                            <a href="<?= site_url('/#'); ?>"><i class="ti ti-calendar"></i> <span>Appointments</span></a>
                                <ul class="child-list">
                                    <li><a href="#"> New</a></li>
                                    <li><a href="#"> Open</a></li>
                                    <li><a href="#"> Closed</a></li>
                                </ul>
                        </li>
                        <li class="menu-list">
                            <a href="<?= site_url('/#'); ?>"><i class="mdi mdi-wrench"></i> <span>Tech Help</span></a>
                                <ul class="child-list">
                                    <li><a href="#"> Forum</a></li>
                                </ul>
                        </li>
                        <li>
                            <a href="<?= site_url('/logout'); ?>"><i class="mdi mdi-logout"></i> <span>Logout</span></a>
                        </li>
                    </ul><!--sidebar nav end-->
                </div>
            </div>
            <!-- sidebar left end-->


            <!-- body content start-->
            <div class="body-content">
                <!-- header section start-->
                <div class="header-section">
                    <!--logo and logo icon start-->
                    <div class="logo">
                        <a href="<?= site_url('/user_dash'); ?>">
                            <!-- <span class="logo-img">
                                <img src="Modules/Backend/assets/images/logo_sm.png" alt="" height="26">
                            </span> -->
                            <span class="brand-name">My Virtual Repair</span>
                        </a>
                    </div>

                    <!--toggle button start-->
                    <a class="toggle-btn"><i class="ti ti-menu"></i></a>
                    <!--toggle button end-->
                </div>
                <!-- header section end-->