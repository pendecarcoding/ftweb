<header class="mdl-layout__header is-casting-shadow">
    <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button">
        <a href="{{ route('home') }}"><img id="acetopbar" class="acetopbar"
            src="{{ uploaded_asset(get_setting('system_logo_white')) }}" /></a>
    </div>
    <div class="mdl-layout__header-row">
        <div class="class_menu_black">


        <div class="mdl-layout-spacer"></div>
        @foreach (getnav() as $v)
        <a  href="{{ url($v['link']) }}"
        class="classurl @if (Request::is($v['link'] . '*')) classurl-active @endif">{{ $v['name'] }}</a>
        @endforeach

        <!-- <div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon notification" id="notification"
            data-badge="23">
            notifications_none
        </div> -->
        <!-- Notifications dropdown-->

        <!-- <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right mdl-shadow--2dp notifications-dropdown"
            for="notification">

            <li class="mdl-list__item">
                You have 23 new notifications!
            </li>
            <li class="mdl-menu__item mdl-list__item list__item--border-top">
                <span class="mdl-list__item-primary-content">
                    <span class="mdl-list__item-avatar background-color--primary">
                        <i class="material-icons">plus_one</i>
                    </span>
                    <span>You have 3 new orders.</span>
                </span>
                <span class="mdl-list__item-secondary-content">
                    <span class="label">just now</span>
                </span>
            </li>
            <li class="mdl-menu__item mdl-list__item list__item--border-top">
                <span class="mdl-list__item-primary-content">
                    <span class="mdl-list__item-avatar background-color--secondary">
                        <i class="material-icons">error_outline</i>
                    </span>
                    <span>Database error</span>
                </span>
                <span class="mdl-list__item-secondary-content">
                    <span class="label">1 min</span>
                </span>
            </li>
            <li class="mdl-menu__item mdl-list__item list__item--border-top">
                <span class="mdl-list__item-primary-content">
                    <span class="mdl-list__item-avatar background-color--primary">
                        <i class="material-icons">new_releases</i>
                    </span>
                    <span>The Death Star is built!</span>
                </span>
                <span class="mdl-list__item-secondary-content">
                    <span class="label">2 hours</span>
                </span>
            </li>
            <li class="mdl-menu__item mdl-list__item list__item--border-top">
                <span class="mdl-list__item-primary-content">
                    <span class="mdl-list__item-avatar background-color--primary">
                        <i class="material-icons">mail_outline</i>
                    </span>
                    <span>You have 4 new mails.</span>
                </span>
                <span class="mdl-list__item-secondary-content">
                    <span class="label">5 days</span>
                </span>
            </li>
            <li class="mdl-list__item list__item--border-top">
                <button href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ALL NOTIFICATIONS</button>
            </li>
        </ul> -->
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
        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="ace-button">
            Login GSAP
        </a>
        @endif
    </div>

    </div>
</header>
