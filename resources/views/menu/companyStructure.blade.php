 @if (Auth::user())
           @if(Auth::user()->positionId==1)
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
                        <a class="" href="{{ url('employmentGroup') }}">
                            <span class="">Employment Groups</span>
                        </a>
                    </li>

                </ul>
            </li>
            @elseif(Auth::user()->positionId == 2)
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
                        <a class="" href="{{ url('employmentGroup') }}">
                            <span class="">Employment Groups</span>
                        </a>
                    </li>

                </ul>
            </li>
              @elseif(Auth::user()->positionId==4)
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
                        <a class="" href="{{ url('employmentGroup') }}">
                            <span class="">Employment Groups</span>
                        </a>
                    </li>

                </ul>
            </li>
             @endif

            @endif
            