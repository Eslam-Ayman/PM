<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Ahmed Salah</p>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            @if(auth()->user()->type == 0)
        @if(Request::is('home') || Request::is('users/create') || Request::is('users/*/edit'))
            <li class="treeview active">
        @else
            <li class="treeview">
        @endif
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Users</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu ">
                    <li><a href="/home"><i class="fa fa-circle-o"></i> Show Users</a></li>
                    <li><a href="/users/create"><i class="fa fa-circle-o"></i> Create users</a></li>
                </ul>
            </li>
        @endif
         @if(Request::is('projects') || Request::is('projects/create') || Request::is('projects/*/edit'))
            <li class="treeview active">
        @else
            <li class="treeview">
        @endif
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>projects</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/projects"><i class="fa fa-circle-o"></i> show projects</a></li>
                    <li><a href="/projects/create"><i class="fa fa-circle-o"></i> crearte prjects</a></li>
                </ul>
            </li>
            <li class="header">LABELS</li>

            <li><a href="/logout" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>

            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>