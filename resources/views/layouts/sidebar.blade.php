<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">&nbsp;</li>
                <li class="submenu">
                    <a href="{{ url('/admin/dashboard') }}"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-01.svg')}}" alt></span>
                        <span> Dashboard </span></a>

                </li>
                <li>
                    <a href="{{ url('/calendar') }}"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-04.svg')}}" alt></span>
                        <span> Case </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/cases') }}">Case List</a></li>
                        <li><a href="{{ url('cases/create') }}">Add Case</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-02.svg')}}" alt></span>
                        <span> Users </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('admin/users') }}">All User List</a></li>
                        <li><a href="{{ url('admin/users/create') }}">Add User</a></li>




                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('images/icons/bar-icon.svg')}}" alt></span>
                        <span> Services </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/service_types') }}">Service Type</a></li>
                        <li><a href="{{ url('/services') }}">Services</a></li>
                        <li><a href="{{ url('/services/create') }}">Add New Service</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('images/icons/document-icon.svg')}}" alt></span>
                        <span> PriceBook </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/pricebook') }}">PriceBook List</a></li>
                        <li><a href="{{ url('/pricebook/create') }}">Add New PriceBook</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-flag"></i> <span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="reports.php"> Reports </a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-15.svg')}}" alt></span>
                        <span> Invoice </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoices-list.php"> Invoices List </a></li>
                        <li><a href="view-invoice.php"> Invoices Details</a></li>
                        <li><a href="invoices-settings.php"> Invoices Settings</a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings.php"><span class="menu-side"><img src="{{ asset('images/icons/menu-icon-16.svg')}}"
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
