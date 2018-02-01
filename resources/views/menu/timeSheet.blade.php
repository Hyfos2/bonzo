 @if (\Auth::user())
@if(\Auth::user()->positionId == 2)
            <li class="dropdown">
                <a class="sa-side-timesheet" href="#">
                    <span class="menu-item">TIME SHEET</span>
                </a>
                <ul class="list-unstyled menu-item">
                    <li>
                        <a class="" href="{{ url('timeSheets') }}">
                            <span class=""> Staff Time Sheets </span>
                        </a>
                    </li>

                </ul>
            </li>
            @elseif(\Auth::user()->positionId == 3)
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
            @elseif(\Auth::user()->positionId==1)
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

         @endif
         @endif