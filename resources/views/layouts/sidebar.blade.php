<div class="sidemenu-wrapper">
    <div class="sidemenu">
        <div class="logo">
            <a class="logoimg" href="{{route('home')}}">
                <img class="" src="{{asset('images/logo.png')}}" alt="logo" />
            </a>
        </div>
        <nav class="sidenavbar">
            <ul class="sidenavbarul">
                <li>
                    <a class="{{ (request()->is('home')) ? 'active' : '' }}" href="{{route('home')}}"><img class="" src="{{asset('images/sidebar-icon-1.png')}}" /><span class="menuname">Dashboard</span></a>
                </li>

                <li>
                    <a class="{{ (request()->is('module')) ? 'active' : '' }}" href="{{route('module.index')}}"><img class="" src="{{asset('images/sidebar-icon-1.png')}}" /><span class="menuname">Module</span></a>
                </li>
                
                <li>
                    <a class="{{ (request()->is('session')) ? 'active' : '' }}" href="{{route('session.index')}}"><img class="" src="{{asset('images/sidebar-icon-1.png')}}" /><span class="menuname">Session</span></a>
                </li>
                
                <li>
                    <a class="{{ (request()->is('logout')) ? 'active' : '' }}" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <img class="" src="{{asset('images/sidebar-icon-4.png')}}" />
                        <span class="menuname">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            Log out
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
