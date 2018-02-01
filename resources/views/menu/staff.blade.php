 @if (Auth::user())
@if(Auth::user()->positionId==2)
        
          <li class="dropdown">
            <a class="sa-side-users" href="#">
               <span class="menu-item">STAFF </span>
            </a>
            <ul class="list-unstyled menu-item">

  
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

    
          @elseif(Auth::user()->positionId==3)
        
          <li class="dropdown">
            <a class="sa-side-users" href="#">

               <span class="menu-item">STAFF </span>
            </a>
            <ul class="list-unstyled menu-item">
             
            
              

                <li>
                    <a class="" href="{{ url('staffList') }}">
                        <span class=""> Staff List </span>
                    </a>
                </li>

                <li>
                    <a class="" href="{{ url('leave') }}">
                        <span class="">Staff Leave</span>
                    </a>
                </li>

            </ul>
          </li>

@elseif(Auth::user()->positionId==1)
          <li class="dropdown">
            <a class="sa-side-users" href="#">
               <span class="menu-item">STAFF </span>
            </a>
            <ul class="list-unstyled menu-item">
             
              <li>
                <a class="" href="{{ url('usersList') }}">
                  <span class=""> Users List </span>
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


          @elseif(Auth::user()->positionId==4)
          <li class="dropdown">
            <a class="sa-side-users" href="#">
               <span class="menu-item">STAFF </span>
            </a>
            <ul class="list-unstyled menu-item">            
               
               <li>
                    <a class="" href="{{ url('staffList') }}">
                        <span class=""> Staff List </span>
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('leave') }}">
                        <span class="">Staff Leave</span>
                    </a>
                </li>

            </ul>
          </li>

          @endif
          @endif