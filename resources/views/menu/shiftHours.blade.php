 @if (Auth::user())
           @if(Auth::user()->gradeId ==11 || Auth::user()->roleId == 1  || Auth::user()->positionId == 20)
            <li class="dropdown">
                <a class="sa-side-timeBoss " href="#">
                    <span class="menu-item">SHIFT HOURS </span>
                </a>
                <ul class="list-unstyled menu-item">
                  
                    <li>
                        <a class="" href="{{ url('allocateShifts') }}">
                            <span class="">Allocate Shifts</span>
                        </a>
                    </li>

                      <li>
                        <a class="" href="{{ url('workingHours') }}">
                            <span class="">Working Hours</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('workingTeam') }}">
                            <span class="">Staff on Shift</span>
                        </a>
                    </li>

                </ul>
            </li>
             @else
           <li class="dropdown">
                <a class="sa-side-timeBoss" href="#">
                    <span class="menu-item">SHIFT HOURS</span>
                </a>
                <ul class="list-unstyled menu-item">
                    <li>
                        <a class="" href="{{ url('workingHours') }}">
                            <span class="">Working Hours</span>
                        </a>
                    </li> 
                      <li>
                        <a class="" href="{{ url('workingTeam') }}">
                            <span class="">Staff on Shift</span>
                        </a>
                    </li>
                </ul>
            </li>
             @endif
@endif