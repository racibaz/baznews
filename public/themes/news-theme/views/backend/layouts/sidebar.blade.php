<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            </div>
            <div class="pull-left info">
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @php
                $dashboard = new \App\Http\Controllers\Backend\DashboardController();
                echo $dashboard->routeList();
            @endphp

            <li class="header"></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>