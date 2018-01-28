
  <!DOCTYPE html><!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
  <meta name="format-detection" content="telephone=no">
  <meta charset="UTF-8">
  <meta name="description" content="Employee Management System">
  <meta name="keywords" content="Employee Management System">
  <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ asset('/img/SiteBadge3.png') }}">
  <title>/</title>
  <!-- CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form.css') }}" rel="stylesheet">
  <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/generics.css') }}" rel="stylesheet">
  <link href="{{ asset('css/token-input.css') }}" rel="stylesheet">
  <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('/css/media-player.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/file-manager.css') }}" rel="stylesheet">
  <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/HoldOn.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
  <link href="{{ asset('incl/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('css/Treant.css') }}" rel="stylesheet">
  <link href="{{ asset('css/collapsable.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('/css/perfect-scrollbar.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/form-builder.css') }}" rel="stylesheet">
  <link href="{{ asset('css/awesome.css') }}" rel="stylesheet">
  <link href="{{ asset('css/table.css') }}" rel="stylesheet">
  <link href="{{ asset('css/toggles.css') }}" rel="stylesheet">
  <link href="{{ asset('css/toast.css') }}" rel="stylesheet">
  <link href="{{ asset('css/map.css') }}" rel="stylesheet">
      <link href="{{asset('css/yajra/jquery.dataTables.min.css')}}" rel="stylesheet">

      <link href="{{ asset('css/toggle-themes/toggles-all.css') }}" rel="stylesheet">
  <!-- DataTables CSS -->
  <link href="{{ asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
  <!-- DataTables Responsive CSS -->
{{--<link href="{{ asset('/bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">--}}
<!-- jQuery Library -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwXS96_uM6y-6ZJZhSJGE87pO-qxpDp-Q&libraries=geometry,places"></script>
    <sript  src=" http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobubble/src/infobubble.js"></sript>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>

     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="{{asset('css/yajra/jquery-1.10.2.min.js')}}"></script>
      <script src="{{asset('css/yajra/jquery.dataTables.min.js')}}"></script>
 <!--  <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <style>
      
      body {
        background-color: #5c788f;
    }
    .eerross{
        background-image: url("{{ asset('public/img/01_fix_background.png') }}");

      width: 100%;
      height: 100%;}

    label {
        font-size: 14px;
    }
      [v-cloak] { display:none; }

      .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate
      {
          color: white;
      }

      .tile, .tile-dark, .tile-title, .table th {
          background: rgba(0,0,0,0.55);
      }
      .dataTables_wrapper .dataTables_processing {
          position: fixed;
          top: 50%;
          left: 50%;
          width: 100%;
          height: 40px;
          margin-left: -50%;
          margin-top: -25px;
          padding-top: 20px;
          text-align: center;
          font-size: 1.2em;
          background-color: black;
      }

      .pagination>.disabled>span, .pagination>.disabled>span:hover, .pagination>.disabled>span:focus, .pagination>.disabled>a, .pagination>.disabled>a:hover, .pagination>.disabled>a:focus {
          color: white;
          background-color: grey;
          border-color: #ddd;
          cursor: not-allowed;
      }
      table.dataTable tbody tr {
           background-color: inherit;
      }
      table.dataTable.no-footer {
          border-bottom: 0.5px solid #5c788f;
      }

  </style>
</head>
<body>
   <header id="header" class="media">
      <a href="" id="menu-toggle"></a>
      <div class="logo pull-left" href="#"></div>
      <div class="media-body">
        <div class="media" id="top-menu">
          <div class="pull-left tm-icon">
           <!--  <a data-drawer="messages" class="drawer-toggle">
              <i class="fa fa-envelope-o fa-2x"></i>
            </a> -->
          </div>
          <div class="pull-left tm-icon">
            <!-- pwe -->
          </div>
          <div id="time" class="pull-right">
            <span id="hours"></span>
            :
            <span id="min"></span>
            :
            <span id="sec"></span>
          </div>
        </div>
      </div>
    </header>
     <div class="clearfix"></div>
      
    <section id="main" class="p-relative" role="main">
   
      <aside id="sidebar">

        <div class="side-widgets overflow">
         
          <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
            <a href="#" data-toggle="dropdown">
              <img class="profile-pic animated" src="{{ asset('/img/sites_badge.png') }}" alt="HowMine">
            </a>
            <ul class="dropdown-menu profile-menu">
              {{--<li><a href="{{ url('all-messages') }}">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>--}}
              <li><a href="{{ url('user-profile') }}">Profile</a> <i class="icon left">
                  &#61903;</i><i class="icon right">&#61815;</i></li>
              <li><a href="{{ url('/auth/logout') }}">Sign Out</a> <i class="icon left">
                  &#61903;</i><i class="icon right">&#61815;</i></li>
            </ul>
           
              <h4 class="m-0">
             {{Auth::user()->name}} {{Auth::user()->surname}}
              </h4>
              {{Auth::user()->email}}
               Human Resource Manager
          </div>
          <div class="s-widget m-b-25">
            <div id="sidebar-calendar"></div>
          </div>
        </div>


        <ul class="list-unstyled side-menu">
      
            <li {{ (Request::is('reports') ? "class=active" : '') }}>
              <a class="sa-side-home" href="{{ url('home') }}">
                <span class="menu-item">HOME</span>
              </a>
            </li>
          
          <li class="dropdown">
            <a class="sa-side-users" href="#">
              <span class="menu-item">STAFF </span>
            </a>
                <li>
                    <a class="" href="{{ url('registerStaff') }}">
                        <span class="">Register Staff</span>
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('staffList') }}">
                        <span class=""> Staff List </span>
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('staffGrades') }}">
                        <span class="">Staff Grades</span>
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('leave') }}">
                        <span class="">Staff Leave</span>
                    </a>
                </li>

            </ul>
          </li>

            <li class="dropdown">
                <a class="sa-side-timesheet" href="#">
                    <span class="menu-item">TIME SHEET</span>
                </a>
                <ul class="list-unstyled menu-item">
                    <li>
                        <a class="" href="{{ url('createTimeSheet') }}">
                            <span class=""> New Time Sheet </span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('timeSheets') }}">
                            <span class=""> Staff Time Sheets </span>
                        </a>
                    </li>

                </ul>
            </li>
         
            <li {{ (Request::is('reports') ? "class=active" : '') }}>
                          {{--<a class="sa-side-timesheet" href="{{ url('timesheet')}}">--}}
                              {{--<span class="menu-item">Time Sheet</span>--}}
                          {{--</a>--}}
            </li>

            <li class="dropdown">
                <a class="sa-side-company_chart" href="#">
                    <span class="menu-item">COMPANY STRUCTURE </span>
                </a>
                <ul class="list-unstyled menu-item">
                    <li>
                        <a class="" href="{{ url('departments') }}">
                            <span class=""> Departments </span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('positions') }}">
                            <span class="">Positions</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('employmentTypes') }}">
                            <span class="">Employment Groups</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
      </aside>
      <section id="content" class="container">
        @yield('content')
      </section>

    </section>
    <script src="{{ asset('js/toggles.js') }}"></script>

    <script src="{{ asset('js/jquery-ui.min.js') }}"></script> 
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->
    <script src="{{ asset('js/scroll.min.js') }}"></script> <!-- Custom Scrollbar -->
    <script src="{{ asset('js/calendar.min.js') }}"></script> <!-- Calendar -->
    <script src="{{ asset('js/feeds.min.js') }}"></script> <!-- News Feeds -->
    <script src="{{ asset('/js/validation/validate.min.js') }}"></script>
     <script src="{{ asset('js/validation/validationEngine.min.js') }}"></script>

    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="{{ asset('js/jquery.tokeninput.js') }}"></script> <!-- Token Input -->
    <script src="{{ asset('bower_components/noty/js/noty/packaged/jquery.noty.packaged.js') }}"></script>
    <script src="{{ asset('bower_components/datatables/media/js/datatables-plugins/pagination/scrolling.js') }}"></script>
    <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('js/media-player.min.js') }}"></script> <!-- Video Player -->
    <script src="{{ asset('js/pirobox.min.js') }}"></script> <!-- Lightbox -->
    <script src="{{ asset('js/file-manager/elfinder.js') }}"></script> <!-- File Manager -->


    <script type="text/javascript" src="{{ asset('incl/oms.min.js') }}"></script>
    <script src="{{ asset('js/fileupload.min.js') }}"></script> <!-- File Upload -->
    <script src="{{ asset('js/HoldOn.min.js') }}"></script> <!-- Spinner -->
    <script src="{{ asset('js/bootstrap-switch.js') }}"></script> <!-- bootstrap-switch. -->
    <script src="{{ asset('js/datetimepicker.min.js') }}"></script> <!-- Date & Time Picker -->
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/socket.io.js') }}"></script>
    <script src="{{ asset('js/calendar.min.js') }}"></script>
    <script src="{{ asset('js/raphael.js') }}"></script>



   @stack('scripts')
</body>
  </html>


