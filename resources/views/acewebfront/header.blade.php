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
        class="classurl @if($v['name']=='Product & Project') @if (Request::is('g_system/*')) classurl-active @endif"   @endif @if (Request::is($v['link'] . '*')) classurl-active @endif">{{ $v['name'] }}</a>

        @endif
        @endforeach

        @if(Session::get('gystem_login'))
        <div class="avatar-dropdown" id="icon">

            <img src="https://cdn.iconscout.com/icon/free/png-512/avatar-370-456322.png">
            <span id="hello"> &nbsp; HI {{ getinfoaccount()->username }}</span>
        </div>
        <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
            for="icon">
            <li class="mdl-list__item mdl-list__item--two-line">
                <span class="mdl-list__item-primary-content">
                    <span class="material-icons mdl-list__item-avatar" style="background-image:url('https://cdn.iconscout.com/icon/free/png-512/avatar-370-456322.png');"></span>
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
        @else
        <a id='loginweb' data-bs-toggle="modal" data-bs-target="#exampleModal" class="ace-button">
            Login GSAP
        </a>
        @endif
        <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button"><i class="material-icons"></i></div>
    </div>

    </div>
</header>
