<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">&nbsp;</li>
                <li class="submenu">
                    <a href="doctor-dashboard.php"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-01.svg')}}" alt></span>
                        <span> Dashboard </span></a>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-04.svg')}}" alt></span>
                        <span> Case </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="case-list-doctor.php">Case List</a></li>
                        <li><a href="add-case-doctor.php">Add Case</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-flag"></i> <span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="reports-doctor.php"> Reports </a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-15.svg')}}" alt></span>
                        <span> Invoice </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoices-list-doctor.php"> Invoices List </a></li>
                        <li><a href="view-invoice-doctor.php"> Invoices Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="setting-user.php"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-16.svg')}}"
                                alt></span> <span>Settings</span></a>
                </li>
            </ul>
            <div class="logout-btn">
                <a href="login.php"><span class="menu-side"><img src="{{ asset('images/icons/logout.svg')}}" alt></span>
                    <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>
