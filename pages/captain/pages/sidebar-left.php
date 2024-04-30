<?php

	echo '<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div>
            <div class="pull-left info">
                <h4>Hello, '.$_SESSION['role'].'</h4>

            </div>
        </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        ';
                    if($_SESSION['role'] == "Captain"){
                        echo '
                    <ul class="sidebar-menu">
                            <li>
                                <a href="../dashboard/dashboard.php">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Barangay Officials</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                    <li>
                                        <a href="../officials/officials.php">
                                            <i class="fa fa-user"></i> <span>Barangay Officials</span>
                                        </a>
                                    </li>
                                <li>
                                    <a href="../kabataan/kabataan.php">
                                        <i class="fa fa-user"></i> <span>Sangguniang Kabataan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../purok_leader/purok_lead.php">
                                        <i class="fa fa-user"></i> <span>Purok Leader</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../kawani/kawani.php">
                                        <i class="fa fa-user"></i> <span>Barangay Staff</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../tanod/tanod.php">
                                        <i class="fa fa-user"></i> <span>Barangay Police</span>
                                    </a>
                                </li>
                                    </ul>
                            <li>
                            <a href="../resident/resident.php">
                                <i class="fa fa-users"></i> <span>Resident</span>
                            </a>
                        </li>
                            <li>
                                <a href="../household/household.php">
                                    <i class="fa fa-home"></i> <span>Household</span>
                                </a>
                            </li>
                            
                            <li class="treeview">
                            <a href="#">
                            <i class="fa fa-file"></i>
                            <span>Barangay Cerificates</span>
                            <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../clearance/clearance.php"><i class="fa fa-file"></i>Clearance</a></li>
                                <li><a href="../residency/residency.php"><i class="fa fa-file"></i>Residency</a></li>
                                <li><a href="../indigency/indigency.php"><i class="fa fa-file"></i>Indigency</a></li>
                                <li><a href="../business_cert/business_cert.php"><i class="fa fa-file"></i>Business Permit</a></li>
                                <li><a href="../livestock/livestock_cert.php"><i class="fa fa-paw"></i>Livestock Sale</a></li>
                                <li><a href="../land/land.php"><i class="fa fa-map-o"></i>Deed of Sale for Land</a></li>
                                <li><a href="../vehicle/vehicle_cert.php"><i class="fa fa-car"></i>Vehicle Deed of Sale</a></li>
                            </ul>
                        </li>

                            <li>
                                <a href="../blotter/blotter.php">
                                    <i class="fa fa-users"></i> <span>Blotter</span>
                                </a>
                            </li>
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Activity</span>
                                </a>
                            </li>
                            <li>
                                <a href="../report/report.php">
                                    <i class="fa fa-file"></i> <span>Report</span>
                                </a>
                            </li>
                        </li>
                            <li>
                                <a href="../logs/logs.php">
                                    <i class="fa fa-history"></i> <span>Logs</span>
                                </a>
                            </li>                            
                            
                    </ul>';
                    }
                    elseif($_SESSION['role'] == "Resident"){
                        echo '
                        <ul class="sidebar-menu">
                        <li><a href="../resident/clearance.php"><i class="fa fa-file"></i>Clearance</a></li>
                        <li><a href="../resident/residency.php"><i class="fa fa-file"></i>Residency</a></li>
                        <li><a href="../resident/indigency.php"><i class="fa fa-file"></i>Indigency</a></li>
                        <li><a href="../resident/business_cert.php"><i class="fa fa-file"></i>Business Certificate</a></li>

                        <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file"></i>
                            <span>Other Certificates</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../resident/livestock_cert.php"><i class="fa fa-paw"></i> Livestock Sale</a></li>
                            <li><a href="../resident/land.php"><i class="fa fa-map-o"></i> Deed of Sale for Land</a></li>
                            <li><a href="../resident/vehicle_cert.php"><i class="fa fa-car"></i> Vehicle Deed of Sale</a></li>
                        </ul>
                    </li>
                    
                            <li>
                            <a href="../activity/activity.php">
                                <i class="fa fa-calendar"></i> <span>Activity</span>
                            </a>
                        </li>
                        </ul>';
                    }
                    elseif($_SESSION['role'] == "Absentee"){
                        echo '
                        <ul class="sidebar-menu">
                        <li><a href="../absentee/business_cert.php"><i class="fa fa-file"></i>Business Certificate</a></li>

                            <li>
                            <a href="../activity/activity.php">
                                <i class="fa fa-calendar"></i> <span>Activity</span>
                            </a>
                        </li>
                        </ul>';
                    }
                    elseif(isset($_SESSION['staff'])){
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../officials/officials.php">
                                    <i class="fa fa-user"></i> <span>Barangay Officials</span>
                                </a>
                            </li>
                            <li>
                                <a href="../household/household.php">
                                    <i class="fa fa-home"></i> <span>Household</span>
                                </a>
                            </li>
                            <li>
                                <a href="../resident/resident.php">
                                    <i class="fa fa-users"></i> <span>Resident</span>
                                </a>
                            </li>
                            <li>
                                <a href="../zone/zone.php">
                                    <i class="fa fa-user"></i> <span>Zone Leader</span>
                                </a>
                            </li>
                            <li>
                                <a href="../permit/permit.php">
                                    <i class="fa fa-file"></i> <span>Permit</span>
                                </a>
                            </li>
                            <li>
                                <a href="../blotter/blotter.php">
                                    <i class="fa fa-users"></i> <span>Blotter</span>
                                </a>
                            </li>
                            <li>
                                <a href="../clearance/clearance.php">
                                    <i class="fa fa-file"></i> <span>Clearance</span>
                                </a>
                            </li>
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Activity</span>
                                </a>
                            </li>
                        </ul>';
                    }
                    else{
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../permit/permit.php">
                                    <i class="fa fa-file"></i> <span>Permit</span>
                                </a>
                            </li>
                            <li>
                                <a href="../clearance/clearance.php">
                                    <i class="fa fa-file"></i> <span>Clearance</span>
                                </a>
                            </li>
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Activity</span>
                                </a>
                            </li>
                        </ul>';
                    }
                echo '
                </section>
                <!-- /.sidebar -->
            </aside>
	';
?>