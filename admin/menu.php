<div class="sticky-header header-section ">
    <div class="header-left">

        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <div class="profile_details_left"><!--notifications of menu start -->
            <ul class="nofitications-dropdown">
                <li class="dropdown head-dpdn">
                    <?php

                    $result = mysqli_query($con,"SELECT COUNT(Booking_Id) FROM Booking_Table ORDER BY Booking_Id DESC  ");
                    $row8 = mysqli_fetch_array($result);

                    $x = $row8[0];
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo $x; ?></span></a>
                    <ul class="dropdown-menu">


                        <li>
                            <div class="notification_header">
                                <h3>You have <?php echo $x; ?> bookings</h3>
                            </div>
                        </li>
                        <li><a href="#">
                                <div class="user_img"><img src="" alt=""></div>
                                <div class="notification_desc">
                                    <p>Selected this style</p>
                                    <p><span>1 hour ago</span></p>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>


                        <li>
                            <div class="notification_bottom">
                                <a href="#">See all booking</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="clearfix"> </div>
    </div>
    <div class="header-right">


        <!--search-box-->
        <div class="search-box">
            <form class="input">
                <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" >
                <label class="input__label" for="input-31">
                    <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
                        <path d="m0,0l404,0l0,77l-404,0l0,-77z">
                    </svg>
                </label>
            </form>
        </div><!--//end-search-box-->

        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img style="width: 60px;" class="img-thumbnail" src="../images/user-admin.png" alt=""> </span>
                            <div class="user-name">
                                <p><?php echo $username; ?></p>
                                <span>Administrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                        <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
                        <li> <a href="my-prof.php"><i class="fa fa-suitcase"></i> Profile</a> </li>
                        <li> <a href="../logout.php?logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>