<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><!--<a class="navbar-brand" href="index.php"><span class="fa fa-map-signs"></span>Best Salon <span class="dashboard_text">Get your best style</span></a>-->
                   <a href='index.php'>
                       <img src="../images/logo.PNG" style="height: 70px;width: 225px">
                   </a>
                </h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="header">MAIN MENU</li>
                    <li class="treeview">
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-plus"></i>
                            <span>Customers</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="customers.php"><i class="fa fa-angle-right"></i> New Customer</a></li>
                            <li><a href="customers.php"><i class="fa fa-angle-right"></i> All Customers</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-home"></i>
                            <span>Add Salon</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="salons.php"><i class="fa fa-angle-right"></i> New Salon</a></li>
                            <li><a href="salons.php"><i class="fa fa-angle-right"></i> All Salons</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pencil-square"></i>
                            <span>My Styles</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="styles.php"><i class="fa fa-angle-right"></i> New Style</a></li>
                            <li><a href="styles.php"><i class="fa fa-angle-right"></i> All Styles</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-plus"></i>
                            <span>Add Stylist</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="stylists.php"><i class="fa fa-angle-right"></i> Stylists</a></li>
                        </ul>
                    </li>
                    <li class="header">REPORTS</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-pdf-o"></i>
                            <span>All Reports</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a target="_blank" href="style_report.php"><i class="fa fa-angle-right"></i> Styles Report</a></li>
                            <li><a target="_blank" href="sal_report.php"><i class="fa fa-angle-right"></i> Salon Report</a></li>
                            <li><a data-toggle="modal" href="#payment"><i class="fa fa-angle-right"></i> Payments Report</a></li>
                            <li><a target="_blank" href="cust_report.php"><i class="fa fa-angle-right"></i> Customers Report</a></li>
                        </ul>
                    </li>
                    <li class="header">OTHER</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>My Settings</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="my-prof.php"><i class="fa fa-angle-right"></i>Profile</a></li>
                            <li><a href="../logout.php?logout"><i class="fa fa-angle-right"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>
<!-- MAKING DATA TOBGGLE FOR PAYMENT-->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">SELECT DATES</h4>
            </div>
            <div class="modal-body">
                <form action="pay_report.php" method="post" target="_blank">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Starting From:</label>
                        <input type="date" class="form-control" name="date1" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Last Date:</label>
                        <input type="date" class="form-control" name="date2" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="dates" class="btn btn-primary">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MAKING DATA TOBGGLE FOR PAYMENT-->