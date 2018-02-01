 @if (Auth::user())
           @if(Auth::user()->positionId ==1  || Auth::user()->positionId == 4)
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
                            <span class="">Staff on Shift</span>
                        </a>
                    </li>        
        
                </ul>
            </li>
             @elseif(Auth::user()->positionId ==3)
           <li class="dropdown">
                <a class="sa-side-timeBoss" href="#">
                    <span class="menu-item">SHIFT HOURS</span>
                </a>
                <ul class="list-unstyled menu-item">
                    <li>
                        <a class="" href="{{ url('workingHours') }}">
                            <span class="">Staff on Shift</span>
                        </a>
                    </li> 
                </ul>
            </li>
            
              @elseif(Auth::user()->positionId ==2)
           <li class="dropdown">
                <a class="sa-side-timeBoss" href="#">
                    <span class="menu-item">SHIFT HOURS</span>
                </a>
                <ul class="list-unstyled menu-item">
                    <li>
                        <a class="" href="{{ url('workingHours') }}">
                            <span class="">Staff on Shift</span>
                        </a>
                    </li> 
                </ul>
            </li>
             @endif
@endif