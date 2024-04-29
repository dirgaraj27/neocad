<div class="header">
    <div class="header-left">
        <a href="" class="logo">
            <img src="{{ asset('images/logo.png')}}" width="35" height="35" alt> <span>Dental Lab</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><img src="{{ asset('images/icons/bar-icon.svg')}}" alt></a>
    <a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="{{ asset('images/icons/bar-icon.svg')}}" alt></a>
    <div class="top-nav-search mob-view">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <a class="btn"><img src="assets/img/icons/search-normal.svg" alt></a>
        </form>
    </div>
    <ul class="nav user-menu float-end">

        <li class="nav-item dropdown d-none d-md-block">
            <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img
                    src="assets/img/icons/note-icon-01.svg" alt><span class="pulse"></span> </a>
        </li>
        <li class="nav-item dropdown has-arrow user-profile-list">
            <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                <div class="user-names">
                    <h5>@if(Auth::check())
                        {{ Auth::user()->name }}
                    @endif </h5>
                    <span>Admin</span>
                </div>
                <span class="user-img">
                    <img src="{{ asset('images/user-06.jpg')}}" alt="Admin">
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">My Profile</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="settings.php">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a  class="dropdown-item" href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                </a>
                </form>
            </div>
        </li>
        <li class="nav-item ">
            <a href="#" class="hasnotifications nav-link"><img src="{{ asset('images/icons/setting-icon-01.svg')}}" alt>
            </a>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-end">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fa-solid fa-ellipsis-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
</div>
