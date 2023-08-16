<header class="mdl-layout__header is-casting-shadow">
    <div aria-expanded="false" role="button" tabindex="0" class="">
        <a href="{{ route('home') }}"><img id="acetopbar" class="acetopbar"
            src="{{ uploaded_asset(get_setting('system_logo_white')) }}" /></a>
    </div>
    <div class="mdl-layout__header-row">
        <div class="class_menu_black">


        <div class="mdl-layout-spacer"></div>
        @foreach (getnav() as $v)

        @if($v['link']=='about')
        <a  href="#"
        class="classurl @if (Request::is($v['link'] . '*')) classurl-active @endif" id="notification">{{ $v['name'] }}</a>
        <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect  notifications-dropdown"
        for="notification">
            <li class="mdl-menu__item mdl-list__item list__item--border-top">
                <a href="{{url('about')}}">
                <span class="mdl-list__item-primary-content">
                    <span>Company</span>
                </span>
                </a>
            </li>
            <li class="mdl-menu__item mdl-list__item list__item--border-top">
               <a href="{{url('about_director')}}">Board of directors</a>
            </li>
        </ul>
        @else
        <a  href="{{ url($v['link']) }}"
        class="classurl @if($v['name']=='Product & Project') @if (Request::is('g_system/*')) classurl-active     @elseif (Request::is($v['link'] . '*')) classurl-active @endif  @elseif (Request::is($v['link'] . '*')) classurl-active @endif">{{ $v['name'] }}</a>
        @endif
        @endforeach
        @if(Session::get('gystem_login'))
        <a  href="{{ url('mypage') }}"
        class="classurl @if (Request::is('mypage*')) classurl-active @endif  ">My Page</a>
        <div class="avatar-dropdown" id="icon">
            <img  class="rounded-circle user-image" src="@if(getinfoaccount()->image != null) /public/users/{{getinfoaccount()->image}} @else /public/go_system/images/portrait-missing.png @endif">
            <span id="hello"> &nbsp; HI {{ getinfoaccount()->username }}</span>
        </div>
        <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
            for="icon">
            <li class="mdl-list__item mdl-list__item--two-line">
                <span class="mdl-list__item-primary-content">
                    <span class="user-avatar material-icons mdl-list__item-avatar" style="background-image:url('@if(getinfoaccount()->image != null) /public/users/{{getinfoaccount()->image}} @else /public/go_system/images/portrait-missing.png @endif');"></span>
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
            <a href="{{route('gosford.listorder')}}">
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

        @elseif(Session::get('loginstaff')==true)
        @if(Session::get('loginstaff')==true)
        <a href="{{ url('staff/back/announcements') }}"
        class="@if (Request::is('staff/back/announcements')) classurl-active  @endif">Staff</a>
        @endif
        <a class="classurl" onclick="logoutFunction()" style="font-size:28px;color:white"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        @else
        <!-- <a id='loginweb' data-bs-toggle="modal" data-bs-target="#exampleModal" class="ace-button">
            Login
        </a> -->
        <div class="dropdown btn-nav-login">
            <a class="ace-button dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
            </a>

            <!-- Dropdown menu -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" target="_blank" href="https://www.gosfordseat.com/gsap.php">GSAP SYSTEM</a>
                <a id='loginweb' data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item" href="#">User Login</a>
                <a data-bs-toggle="modal" data-bs-target="#staffModal" class="dropdown-item" href="#">Staff Login</a>
                <!-- Add more dropdown items as needed -->
            </div>
        </div>
        @endif
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button"><i class="material-icons"></i></div>
    </div>

    </div>
</header>

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

                window.location.href = "{{route('staff.logoutstuff')}}";
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
