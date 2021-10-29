<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3></div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="javascript:void(0);" class="waves-effect {{request()->is('admin') ? 'active' :' '}}">
                    <i class="mdi mdi-av-timer fa-fw" data-icon="v"></i>
                    <span class="hide-menu"> Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#" class="waves-effect {{request()->is('admin/job*') ? 'active' :''}}">
                    <i class="mdi mdi-briefcase fa-fw"></i>
                    <span class="hide-menu">Job Board<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin.job_board.list')}}"><i class="fa-fw">L</i><span class="hide-menu">List</span></a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="waves-effect {{request()->is('admin/student*') ? 'active' :''}}">
                    <i class="mdi mdi-account-multiple fa-fw"></i>
                    <span class="hide-menu">Students<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin.student.list')}}"><i class="fa-fw">L</i><span class="hide-menu">List</span></a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="waves-effect {{request()->is('admin/tutor*') ? 'active' :''}}">
                    <i class="mdi mdi-account fa-fw"></i>
                    <span class="hide-menu">Tutors<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin.tutor.list')}}"><i class="fa-fw">L</i><span class="hide-menu">List</span></a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.area.list')}}" class="waves-effect {{request()->is('admin/area*') ? 'active' :''}}">
                    <i class="mdi mdi-map-marker fa-fw"></i>
                    <span class="hide-menu">Areas</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.subscribers.list')}}" class="waves-effect {{request()->is('admin/subscribers*') ? 'active' :''}}">
                    <i class="mdi mdi-account-plus fa-fw"></i>
                    <span class="hide-menu">Subscribers</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.web.home')}}" class="waves-effect {{request()->is('admin/web-config') ? 'active' :''}}">
                    <i class="mdi mdi-earth fa-fw"></i>
                    <span class="hide-menu">Web Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
