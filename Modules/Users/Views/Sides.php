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

                    <!--mega menu start-->
                    <!-- <div id="navbar-collapse-1" class="navbar-collapse collapse mega-menu">
                        <ul class="nav navbar-nav">                           
                            <li class="dropdown">
                                <a href="javascript:;" data-toggle="dropdown" class=""> English <i class="mdi mdi-chevron-down"></i> </a>
                                <ul role="menu" class="dropdown-menu language-switch">
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> German </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Italian </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> French </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Spanish </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Russian </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <form class="search-content" action="index.html" method="post">
                                    <input type="text" class="form-control mt-3" name="keyword" placeholder="Search...">
                                    <span class="search-button"><i class="ti ti-search"></i></span>
                                </form>
                            </li>
                        </ul>
                    </div> -->
                    <!--mega menu end-->

                    <div class="notification-wrap">
                        <!--right notification start-->
                        <div class="right-notification">
                            <ul class="notification-menu">
                                <li>
                                    <a href="javascript:;" class="notification" data-toggle="dropdown">
                                        <i class="mdi mdi-bell-outline"></i>
                                        <span class="badge badge-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu mailbox dropdown-menu-right">
                                        <li>
                                          <div class="drop-title">Notifications</div>
                                        </li>
                                        <li class="notification-scroll">
                                            <div class="message-center">
                                                <a href="#">
                                                    <div class="user-img"> 
                                                        <i class="ti ti-star"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Jane A. Seward</h6>
                                                        <span class="mail-desc">Iwon meddle and...</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-heart"></i> 
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Michael W. Salazar</h6>
                                                        <span class="mail-desc">Lovely gide learn for you...</span> 
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img"> 
                                                        <i class="ti ti-image"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>David D. Chen</h6>
                                                        <span class="mail-desc">Send his new photo...</span> 
                                                    </div>
                                                </a> 
                                                <a href="#">
                                                    <div class="user-img"> 
                                                        <i class="ti ti-bell"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Irma J. Hendren</h6>
                                                        <span class="mail-desc">6:00 pm our meeting so...</span> 
                                                    </div>
                                                </a> 
                                            </div>
                                        </li>
                                        <li> 
                                            <a class="text-center bg-light" href="javascript:void(0);"> 
                                                <strong>See all notifications</strong> 
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:;" class="notification" data-toggle="dropdown">
                                        <i class="mdi mdi-email-outline"></i>
                                        <span class="badge badge-danger">9</span>
                                    </a>
                                    <ul class="dropdown-menu mailbox dropdown-menu-right">
                                        <li>
                                            <div class="drop-title">New Messages 5</div>
                                        </li>
                                        <li class="notification-scroll">
                                            <div class="message-center">
                                                <a href="#">
                                                    <div class="user-img">
                                                         <img src="Modules/Backend/assets/images/users/avatar-2.jpg" alt="user" class="rounded-circle"> 
                                                         <span class="profile-status online pull-right"></span>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Cassie T. Bishop</h6>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                        <span class="time">9:30 AM</span> 
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <img src="Modules/Backend/assets/images/users/avatar-3.jpg" alt="user" class="rounded-circle"> 
                                                        <span class="profile-status busy pull-right"></span> 
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Rudy A. Scott</h6>
                                                        <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> 
                                                    </div>
                                                </a> 
                                                <a href="#">
                                                    <div class="user-img">
                                                        <img src="Modules/Backend/assets/images/users/avatar-4.jpg" alt="user" class="rounded-circle"> 
                                                        <span class="profile-status away pull-right"></span> 
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Kevin D. Jernigan</h6>
                                                        <span class="mail-desc">I am a singer!</span> 
                                                        <span class="time">9:08 AM</span> 
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img"> 
                                                        <img src="Modules/Backend/assets/images/users/avatar-5.jpg" alt="user" class="rounded-circle"> 
                                                        <span class="profile-status offline pull-right"></span> 
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Jane A. Seward</h6>
                                                        <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> 
                                                    </div>
                                                </a> 
                                            </div>
                                        </li>
                                        <li> 
                                            <a class="text-center bg-light" href="javascript:void(0);"> <strong>See all notifications</strong> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <!-- <div class="sb-toggle-right">
                                        <i class="mdi mdi-apps"></i>
                                    </div> -->
                                </li>
                            </ul>
                        </div><!--right notification end-->
                    </div>
                </div>
                <!-- header section end-->