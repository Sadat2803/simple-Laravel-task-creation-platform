<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
        @if(Auth::user()->isAdmin())
            Administrateur
        @else
            {{Auth::user()->first_name}}
        @endif
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
              @if(Auth::user()->isAdmin())
                Administrateur
            @else
                {{Auth::user()->first_name}} ({{Auth::user()->department->name}})
            @endif
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a id="sideBarToggle" href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
    </nav>
</header>



