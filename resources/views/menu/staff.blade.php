 @if (Auth::user())
        @if(Auth::user()->roleId ==1)
        
          <li class="dropdown">
            <a class="sa-side-users" href="#">
               <span class="menu-item">STAFF / USERS </span>
            </a>
            <ul class="list-unstyled menu-item">

                <li>
                    <a class="" href="{{ url('usersList') }}">
                        <span class="">Users List </span>
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
                  <li>
                    <a class="" href="{{ url('requestListing') }}">
                        <span class="">Leave Requests</span>
                    </a>
                </li>

            </ul>
          </li>
    @elseif(Auth::user()->gradeId == 10)
          <li class="dropdown">
            <a class="sa-side-users" href="#">
               <span class="menu-item">STAFF</span>
            </a>
            <ul class="list-unstyled menu-item">


                <li>
                    <a class="" href="{{ url('leave') }}">
                        <span class="">Staff Leave</span>
                    </a>
                </li>

            </ul>
          </li>
           @elseif(Auth::user()->gradeId == 10  &&  Auth::user()->departmentId == 2 || Auth::user()->positionId ==5  || Auth::user()->positionId == 4 || Auth::user()->positionId ==3  || Auth::user()->positionId ==2  || Auth::user()->positionId ==8  || Auth::user()->positionId ==9  || Auth::user()->positionId ==10 || Auth::user()->positionId ==20)
           
          <li class="dropdown">
            <a class="sa-side-users" href="#">
               <span class="menu-item">STAFF</span>
            </a>
            <ul class="list-unstyled menu-item">

                <li>
                    <a class="" href="{{ url('requestListing') }}">
                        <span class="">Leave Requests</span>
                    </a>
                </li>
            </ul>
          </li>
          @endif
          @endif