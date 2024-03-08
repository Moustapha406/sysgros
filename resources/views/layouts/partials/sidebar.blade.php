<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('/') }}"> <img alt="image" src="{{asset('assets/img/logo patisen.png')}}" class="header-logo" /> <span
                    class="logo-name"></span>
            </a>
        </div>
         
        <ul class="sidebar-menu">

            
            
        

        
            @can('user-read')

                <li class="menu-header">Administration</li>

                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <span class="material-symbols-outlined">groups</span><span>Parametrage</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{route('users.index')}}">Utilisateurs</a></li>
                        @can('role-read')
                            <li><a class="nav-link" href="{{route('roles.index')}}">Roles</a></li>
                        @endcan
                        @can('permission-read')
                            <li><a class="nav-link" href="{{route('permissions.index')}}">Permissions</a></li>
                        @endcan

                    </ul>
                </li>
                
            @endcan
            
            <li class="menu-header">Gestion</li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <span class="material-symbols-outlined">menu</span><span>Gestion des vis</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('/')}}">vis</a></li>
                </ul>
            </li>

            
            
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
