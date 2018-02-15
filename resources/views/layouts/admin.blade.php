<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Research Division</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    <!-- X-editable -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        form button {
            display: inline;
        }

        #flashMessage {
            margin-top: 10px !important;
        }

    </style>
<?php

function skin($user)
{
    if ($user->hasRole('admin') || $user->hasRole('superadmin')) {
        return 'skin-black';
    } elseif ($user->hasRole('rr')) {
        return 'skin-blue';
    } elseif ($user->hasRole('me')) {
        return 'skin-red';
    } else {
        return 'skin-white';

    }
}

?>
@yield('styles')


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition {{ skin(Auth::user()) }} sidebar-mini fixed">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>R</b>DBC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Research</b>Division</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/uploads/user-{{ Auth::user()->id }}.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"> {{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/uploads/user-{{ Auth::user()->id }}.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                    <small>{{ \Illuminate\Support\Facades\Auth::user()->email }}</small>
                                    <small>Member
                                        since: {{ \Illuminate\Support\Facades\Auth::user()->created_at  }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">

                                    <a href="/admin/edit" class="btn btn-default btn-flat">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="#" class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">

                    {{-- Make this a png file later depending on the role of the user --}}
                    <img src="/uploads/user-{{ Auth::user()->id }}.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </p>
                    <a href="#"><i
                                class="fa fa-circle text-success"></i> {{ \Illuminate\Support\Facades\Auth::user()->email }}
                    </a>
                </div>
            </div>
            <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
        {{--<div class="input-group">--}}
        {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
        {{--<span class="input-group-btn">--}}
        {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat">--}}
        {{--<i class="fa fa-search"></i>--}}
        {{--</button>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            @if(Auth::user()->hasRole('superadmin'))
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MANAGEMENT</li>
                    <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                        <a href="/admin/users">
                            <i class="fa fa-dashboard"></i>
                            <span>Users</span>
                        </a>

                    </li>
                </ul>
            @endif
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="/admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>

                </li>
                {{--<li class="treeview menu-open">--}}
                {{--<a href="#">--}}
                {{--<i class="fa fa-envelope-o"></i> <span>Mail</span>--}}
                {{--<span class="pull-right-container">--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}

                {{--R R--}}
                @if(Auth::user()->hasRole('rr') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                    <li class="@if(isset($ordinance))
                    @if($ordinance->is_monitoring === 0)
                            active
                        @endif
                    @elseif(isset($resolution))
                    @if($resolution->is_monitoring === 0)
                            active
                    @endif
                    @elseif((Request::is('admin/ordinances/*/edit') or Request::is('admin/resolutions/*/edit')))
                            active
                        @elseif(isset($type))
                    @if(($type === 'RR')
                    and (Request::is('admin/ordinances*') or Request::is('admin/resolutions*')))
                            active
                        @endif
                    @elseif(request()->type === 'RR')
                            active
                        @endif treeview menu">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Research & Records</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="">
                            <li class="@if(Request::is('admin/ordinances/create*') and request()->type === 'RR')
                                    active
                                @elseif(isset($type))
                            @if($type === 'RR' and Request::is('admin/ordinances'))
                                    active
                                @endif
                            @endif">
                                <a href="/admin/ordinances">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Ordinances</span>
                                </a>
                            </li>
                            <li class="@if(isset($resolution))
                            @if($resolution->is_monitoring === 0)
                                    active
                                @endif
                            @elseif(Request::is('admin/resolutions/create*') and request()->type === 'RR')
                                    active
                                @elseif(isset($type))
                            @if($type === 'RR' and Request::is('admin/resolutions'))
                                    active
                                @endif
                            @endif">
                                <a href="/admin/resolutions">
                                    <i class="fa fa-circle-o"></i> <span>Resolutions</span>
                                    <span class="pull-right-container">
                            </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- ME --}}
                @if(Auth::user()->hasRole('me') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))

                    <li class="@if(isset($ordinance))
                    @if($ordinance->is_monitoring === 1)
                            active
                    @endif
                    @elseif(isset($resolution))
                    @if($resolution->is_monitoring === 1)
                            active
                    @endif
                    @elseif(((Request::is('admin/forms/ordinances*') and request()->type === 'ME')
                        or (Request::is('admin/forms/resolutions*') and request()->type === 'ME'))
                        or (Request::is('admin/forms/ordinances*') or Request::is('admin/forms/resolutions*'))
                        or request()->type === 'ME')
                            active
                    @endif treeview menu">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Monitoring & Evaluation</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu" style="">
                            {{--<li class="{{ Request::is('admin/forms') ? 'active' : '' }}">--}}
                            {{--<a href="/admin/forms">--}}
                            {{--<i class="fa fa-book"></i>--}}
                            {{--<span class="{{ Request::is('admin/forms') ? 'text-danger' : '' }}">Ordinances and Resolution</span>--}}
                            {{--<span class="pull-right-container"></span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            <li class="@if(isset($ordinance))
                            @if($ordinance->is_monitoring === 1)
                                    active
                                @endif
                            @elseif(Request::is('admin/forms/ordinances*') or Request::is('admin/forms/ordinances*')
                            or (Request::is('admin/ordinances/create*') and request()->type === 'ME'))
                                    active
                                    @endif">
                                <a href="/admin/forms/ordinances"><i class="fa fa-circle-o"></i>
                                    <span>Ordinances</span>
                                </a>
                            </li>
                            <li class="@if(isset($resolution))
                            @if($resolution->is_monitoring === 1)
                                    active
                                @endif
                            @elseif(Request::is('admin/forms/resolutions*')
                            or (Request::is('admin/resolutions/create*') and request()->type === 'ME'))
                                    active
                            @endif">
                                <a href="/admin/forms/resolutions"><i class="fa fa-circle-o"></i>
                                    <span>Resolutions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
                    <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
                        <a href="/admin/pages">
                            <i class="fa fa-file-code-o"></i>
                            <span>Pages</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/logs*') ? 'active' : '' }}">
                        <a href="/admin/logs">
                            <i class="fa fa-shield"></i>
                            <span>Logs</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                @endif

                {{--<li class="{{ Request::is('admin/change*') ? 'active' : '' }}">--}}
                {{--<a href="/admin/change-password">--}}
                {{--<i class="fa fa-wrench"></i>--}}
                {{--<span class="{{ Request::is('admin/forms/change*') ? 'text-danger' : '' }} ">Account</span>--}}
                {{--<span class="pull-right-container">--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content" style="margin: 0 5%">
            <!-- Info boxes -->
            @if(Session::has('flash_message'))
                <div id="flashMessage" class="alert {{Session::get('alert-class', 'alert-success')}}"
                     style="margin-top: 8vh;">
                    {!! Session::get('flash_message') !!}
                </div>
            @endif
            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.1
        </div>
        <strong>Copyright &copy; 2017 <a href="https://adminlte.io"> Research Division, Baguio City</a>.</strong> All
        rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<script src="/bower_components/ckeditor/ckeditor.js"></script>
<script src="/js/parsley.min.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')

    })


</script>

{{-- Custom Scripts per page--}}
@yield('scripts')

</body>
</html>
