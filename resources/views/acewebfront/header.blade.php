<header class="mdl-layout__header is-casting-shadow">
    <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button" id="navbarToggle">
        <i class="material-icons menu-icon"></i>
        <i class="material-icons times-icon" style="display: none;">✕</i>
    </div>
    @if (Session::get('gystem_login') || Session::get('loginstaff') == true)
    @else
        <div data-bs-toggle="modal" data-bs-target="#myLogin" aria-expanded="false" role="button" tabindex="0"
            class="mdl-layout__drawer-button-login" id="navbarToggle">
            <i class="fa fa-user-circle i-icon-login" aria-hidden="true"></i>

        </div>
    @endif
    <div aria-expanded="false" role="button" tabindex="0" class="">
        <a href="{{ route('home') }}"><img id="acetopbar" class="acetopbar"
                src="{{ uploaded_asset(get_setting('system_logo_white')) }}" /></a>
    </div>
    <div id="spaceheader" class="mdl-layout__header-row">
        <div id="black_navbar" class="class_menu_black">


            <div class="mdl-layout-spacer"></div>
            @foreach (getnav() as $v)
                @if ($v['link'] == 'about')
                    <a href="#"
                        class="classurl @if (Request::is('vision_mission')) classurl-active @endif @if (Request::is($v['link'] . '*')) classurl-active @endif  @if (Request::is('company_milestone')) classurl-active @endif"
                        id="notification">{{ $v['name'] }}</a>
                    <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect  notifications-dropdown"
                        for="notification">
                        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                            <a href="{{ url('about') }}">
                                <span class="mdl-list__item-primary-content">
                                    <span>Company</span>
                                </span>
                            </a>
                        </li>
                        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                            <a href="{{ url('about_director') }}">Board of directors</a>
                        </li>
                        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                            <a href="{{ url('company_milestone') }}">Group Milestone</a>
                        </li>
                        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                            <a href="{{ url('vision_mission') }}">Vision & Mission</a>
                        </li>
                    </ul>
                @elseif ($v['name'] === 'Corporate Governance')
                    <a href="#"
                        class="classurl @if (Request::is($v['link'] . '*')) classurl-active @endif  @if (Request::is('corporate_governance*')) classurl-active @endif"
                        id="{{ $v['name'] }}">{{ $v['name'] }}</a>
                    <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect  notifications-dropdown"
                        for="{{ $v['name'] }}">
                        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                            <a href="{{ $v['link'] }}">Investor</a>
                        </li>
                        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                            <a href="{{ url('corporate_governance') }}">Corporate Governance</a>
                        </li>
                    </ul>
                @else
                    <a href="{{ url($v['link']) }}"
                        class="classurl @if ($v['name'] == 'Product & Project') @if (Request::is('g_system/*')) classurl-active     @elseif (Request::is($v['link'] . '*')) classurl-active @endif
@elseif (Request::is($v['link'] . '*'))
classurl-active @endif">{{ $v['name'] }}</a>
                @endif
            @endforeach
            @if (Session::get('gystem_login'))
                <!-- <a href="{{ url('mypage') }}"
                    class="classurl @if (Request::is('mypage*')) classurl-active @endif  ">My Page</a> -->
                <div class="avatar-dropdown" id="icon">
                    <img class="rounded-circle user-image"
                        src="@if (getinfoaccount()->image != null) /public/users/{{ getinfoaccount()->image }} @else /public/go_system/images/portrait-missing.png @endif">
                    <span id="hello"> &nbsp; HI {{ getinfoaccount()->username }}</span>
                </div>
                <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                    for="icon">
                    <li class="mdl-list__item mdl-list__item--two-line">
                        <span class="mdl-list__item-primary-content">
                            <span class="user-avatar material-icons mdl-list__item-avatar"
                                style="background-image:url('@if (getinfoaccount()->image != null) /public/users/{{ getinfoaccount()->image }} @else /public/go_system/images/portrait-missing.png @endif');"></span>
                            <span>{{ getinfoaccount()->username }}</span>
                            <span class="mdl-list__item-sub-title">{{ getinfoaccount()->email }}</span>
                        </span>
                    </li>
                    <li class="list__item--border-top"></li>
                    <a href="{{ route('gosford.frontend.profil') }}">
                        <li class="mdl-menu__item mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">account_circle</i>
                                My account
                            </span>
                        </li>
                    </a>
                    <a href="{{ route('gosford.listorder') }}">
                        <li class="mdl-menu__item mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">receipt</i>
                                My Order
                        </li>
                    </a>
                    <li class="list__item--border-top"></li>
                    <a href="{{ route('gosford.logouts') }}">
                        <li class="mdl-menu__item mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                                Log out
                            </span>
                        </li>
                    </a>
                </ul>
            @elseif(Session::get('loginstaff') == true)
                @if (Session::get('loginstaff') == true)
                    <a href="{{ url('staff/back/announcements') }}">
                        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button-login"
                            id="navbarToggle">
                            <i class="fa fa-user-circle i-icon-login" aria-hidden="true"></i>

                        </div>
                    </a>
                @endif
                <a class="classurl" onclick="logoutFunction()" style="font-size:28px;color:white"><i
                        class="fa fa-sign-out" aria-hidden="true"></i></a>
            @else
                <!-- <a id='loginweb' data-bs-toggle="modal" data-bs-target="#exampleModal" class="ace-button">
            Login
        </a> -->
                <div class="dropdown btn-nav-login">
                    <a class="ace-button dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>

                    <!-- Dropdown menu -->
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" target="_blank" href="https://www.gosfordseat.com/gsap.php">GSAP
                            SYSTEM</a>
                        <!-- <a id='loginweb' data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item"
                            href="#">User Login</a> -->
                        <a data-bs-toggle="modal" data-bs-target="#staffModal" class="dropdown-item"
                            href="#">Staff Login</a>
                        <!-- Add more dropdown items as needed -->
                    </div>
                </div>
            @endif

        </div>

    </div>
    <div class="navbar-mobile" id="mobileMenu">
        <ul>
            @foreach (getnav() as $v)
                @if ($v['name'] === 'About')
                    <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle">{{ $v['name'] }}</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Board of Directors</a></li>
                </ul>
            </li> -->

                    <li class="nav-item dropdown">
                        <a style="color: white;" class="nav-link dropdown-toggle" href="#"
                            id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menus dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a style="padding-left: 27px;" href="{{ url('about') }}">Company</a></li>
                            <li><a style="padding-left: 27px;" href="{{ url('about_director') }}">Board of
                                    Directors</a></li>
                            <li><a style="padding-left: 27px;" href="{{ url('company_milestone') }}">Group
                                    Milestone</a></li>
                            <li><a style="padding-left: 27px;" href="{{ url('vision_mission') }}">Vision And
                                    Mission</a></li>

                        </ul>
                    </li>
                @elseif ($v['name'] === 'Corporate Governance')
                    <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle">{{ $v['name'] }}</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Company</a></li>
                    <li><a href="#">Board of Directors</a></li>
                </ul>
            </li> -->

                    <li class="nav-item dropdown">
                        <a style="color: white;" class="nav-link dropdown-toggle" href="#"
                            id="navbarDarkDropdownMenuLinks" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ $v['name'] }}
                        </a>
                        <ul class="dropdown-menus dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLinks">
                            <li><a style="padding-left: 27px;" href="{{ url($v['link']) }}">Investor</a></li>
                            <li><a style="padding-left: 27px;"
                                    href="{{ url('corporate_governance') }}">Corporate Governance</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url($v['link']) }}">{{ $v['name'] }}</a></li>
                @endif
            @endforeach
            @if (Session::get('gystem_login'))
                <!-- <li> <a href="{{ url('mypage') }}">My Page</a></li> -->
            @endif
        </ul>
    </div>
</header>
<div>
    <div style="margin-top: 55vh;" class="modal" id="myLogin">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <center><img style="width:100%" src="{{ uploaded_asset(get_setting('system_logo_white')) }}"
                            height="50"></center>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <center>Select Login Accounts</center>
                    <div style="display: flex;gap:5px;margin-top: 20px;">
                        <a href="{{ route('mobile.login.staff') }}" style="width:100%" class="btn btn-danger"><i
                                class="fa fa-user"></i> STAFF</a>
                        <!-- <a href="{{ route('mobile.login.user') }}" style="width:100%" class="btn btn-danger"><i
                                class="fa fa-user"></i> USER</a> -->
                        <a href="https://www.gosfordseat.com/gsap.php" target="_blank" style="width:100%"
                            class="btn btn-danger"><i class="fa fa-user"></i> GSAP</a>
                    </div>
                </div>

                <!-- Modal footer -->


            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Get references to the icon and navbar-mobile elements
        var $navbarToggle = $('#navbarToggle');
        var $mobileMenu = $('#mobileMenu');
        var $menuIcon = $('.menu-icon');
        var $timesIcon = $('.times-icon');

        // Add a click event handler to the icon
        $navbarToggle.click(function() {
            // Toggle the 'active' class on navbar-mobile
            $mobileMenu.toggleClass('active');

            // Toggle the icons
            $menuIcon.toggle();
            $timesIcon.toggle();

            // Check if the 'active' class is present
            if ($mobileMenu.hasClass('active')) {
                // If it's active, show the navbar with animation
                $mobileMenu.slideDown();
            } else {
                // If it's not active, hide the navbar with animation
                $mobileMenu.slideUp();
            }
        });
    });
</script>


<script>
    const aboutToggle = document.querySelector('#navbarDarkDropdownMenuLink');
    const aboutDropdown = document.querySelector('.dropdown-menus');

    aboutToggle.addEventListener('click', function(e) {
        e.preventDefault();
        if (aboutDropdown.style.display === 'none' || aboutDropdown.style.display === '') {
            aboutDropdown.style.display = 'block';
        } else {
            aboutDropdown.style.display = 'none';
        }
    });

    // Close the dropdown when clicking outside
    window.addEventListener('click', function(e) {
        if (!aboutToggle.contains(e.target) && !aboutDropdown.contains(e.target)) {
            aboutDropdown.style.display = 'none';
        }
    });
</script>

<script>
    function logoutFunction() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "you want to leave this page?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = "{{ route('staff.logoutstuff') }}";
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                // swalWithBootstrapButtons.fire(
                //     'Cancelled',
                //     'Your imaginary file is safe :)',
                //     'error'
                // )
            }
        })

    }
</script>
