<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('/') }}"> <img alt="image" src="{{asset('assets/img/logo patisen.png')}}" class="header-logo" /> <span
                    class="logo-name"></span>
            </a>
        </div>
         
        <ul class="sidebar-menu">

            
                <li class="menu-header">Administration</li>
           

            
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <span class="material-symbols-outlined">groups</span><span>Parametrage</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{route('users.index')}}">Utilisateurs</a></li>

                    </ul>
                </li>
            

            {{-- <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <span class="material-symbols-outlined">menu</span><span>Gestion des menus</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Menu</a></li>

                </ul>
            </li> --}}

            
            
            {{--            @endcan--}}

            
            

            {{-- <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <span class="material-symbols-outlined"><span class="material-symbols-outlined">add_reaction</span></span><span>X3</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Services</a></li>
                    <li><a class="nav-link" href="">Sites</a></li>
                    <li><a class="nav-link" href="">Pays</a></li>
                </ul>
            </li> --}}

            
        </ul>
        <ul class="sidebar-menu">
            {{-- @foreach ($list_menus as $menu )
                @includeIf('layouts.partials.menu-item')
            @endforeach --}}
         </ul>
    </aside>
</div>
