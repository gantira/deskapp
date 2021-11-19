<div class="brand-logo">
    <a href="index.html">
        <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
        <img src="{{ asset('vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
    </div>
</div>
<div class="menu-block customscroll">
    <div class="sidebar-menu">
        <ul id="accordion-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <div class="sidebar-small-cap">Apps</div>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-email-1"></span><span class="mtext">Email</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('email') }}">Inbox</a></li>
                    <li><a href="#">Compose</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
