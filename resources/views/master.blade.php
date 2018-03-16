
  <!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
  <meta name="format-detection" content="telephone=no">
  <meta charset="UTF-8">
  <meta name="description" content="Employee Management System">
  <meta name="keywords" content="Employee Management System">
  <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ asset('/img/main.png') }}">
  <title>How Mine EMS</title>

   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/generics.css') }}" rel="stylesheet">
   <link href="{{ asset('css/form.css') }}" rel="stylesheet">
   <link href="{{ asset('css/awesome.css') }}" rel="stylesheet">
   <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toggles.css') }}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">

    <!-- <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet"> -->
  <!--  <link href="{{ asset('/css/perfect-scrollbar.css') }}" rel="stylesheet">
   <link href="{{ asset('css/collapsable.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/token-input.css') }}" rel="stylesheet">-->
  <!-- <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
 -->
    <link href="{{asset('css/jquery.dataTables.min.css')}}">
    <link href="{{ asset('css/vue.css') }}" rel="stylesheet">
 <link href="{{ asset('css/token-input.css') }}" rel="stylesheet"/>
    

<style>ss
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
    input[type=search] {
        /* -webkit-appearance: none; */
        background-color: inherit;
        border-color: white;
        border-radius: 0.5px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
        cursor: default;
        color: #fff!important;
        border: 1px solid transparent;
        background: transparent;
        box-shadow: black;
    }
    .control-label{

    }

  </style>
   <link href="{{ asset('css/notifications.css') }}" rel="stylesheet">
  
</head>

<body>
   <header id="header" class="media">
      <a href="" id="menu-toggle"></a>
      <div class="logo pull-left" href="#"></div>
      <div class="media-body">
        <div class="media" id="top-menu">
          <div class="pull-left tm-icon">
          </div>
          <div class="pull-left tm-icon">
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
              <img class="profile-pic animated" src="{{ asset('/img/main.png') }}" alt="HowMine">
            </a>
            <ul class="dropdown-menu profile-menu">
              {{--<li><a href="{{ url('all-messages') }}">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>--}}
              {{--<li><a href="{{ url('user-profile') }}">Profile</a> <i class="icon left">--}}
                  {{--&#61903;</i><i class="icon right">&#61815;</i></li>--}}
              <li>

                 
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Sign Out
                            </a><i class="icon left">
                  &#61903;</i><i class="icon right">&#61815;</i>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        

          </li>
            </ul>
            @if (\Auth::user())
              <h4 class="m-0">
               {{\Auth::user()->name}}  {{\Auth::user()->surname}}
              </h4>

               {{\Auth::user()->email}}<br/>
            @endif
          </div>
          <div class="s-widget m-b-25">
            <div id="sidebar-calendar"></div>
          </div>
        </div>

        <ul class="list-unstyled side-menu">
      
            <li {{ (Request::is('reports') ? "class=active" : '') }}>
              <a class="sa-side-home" href="{{ url('welcome') }}">
                <span class="menu-item">HOME</span>
              </a>
            </li>
            @if (\Auth::check())

                @include('menu.staff')
             @include('menu.timeSheet')
             @include('menu.companyStructure')
             @include('menu.shiftHours')
        </ul>

      </aside>

      <section id="content" class="container">
        @yield('content')
      </section>
        @endif
    </section>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <script src ="{{asset('js/toastr.min.js')}}"></script>

<script src="{{ asset('js/jquery.tokeninput.js') }}"></script>

   <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

  <!--  <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script> -->

   <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{asset('js/vee-validate.js')}}"></script>
    <script src="{{asset('js/vee-validate2.js')}}"></script>
    <script>
        Vue.use(VeeValidate);
    </script>
     <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
     <!-- <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script> -->


   <script src="{{ asset('js/main.js') }}"></script>
  <script>
              @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
  </script>
    <script>
  
    // var $t = jQuery.noConflict();
     $("#staffId").tokenInput("{!! url('/getStaffDetails')!!}",{tokenLimit:1});
     $("#staffname").tokenInput("{!! url('/getStaffDetails')!!}",{tokenLimit:1});
     $("#staffName").tokenInput("{!! url('/getStaff')!!}",{tokenLimit:1});
</script>
<script>
     $("#shiftHours").tokenInput("{!! url('/getShiftDetails')!!}",{tokenLimit:1});
</script>
   

  @stack('scripts')

</body>
  </html>

