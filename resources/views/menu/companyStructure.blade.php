@if (Auth::user())
@if(Auth::user()->gradeId == 11 || Auth::user()->gradeId == 10  || Auth::user()->roleId == 1 || Auth::user()->positionId == 35 || Auth::user()->positionId == 5 || Auth::user()->positionId == 4  || Auth::user()->positionId == 3  || Auth::user()->positionId == 2  || Auth::user()->positionId == 8  || Auth::user()->positionId == 9  || Auth::user()->positionId == 10  || Auth::user()->positionId == 20)

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
                        <a class="" href="{{ url('categories') }}">
                            <span class=""> Categories </span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('positions') }}">
                            <span class="">Positions</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('employmentGroup') }}">
                            <span class="">Employment Types</span>
                        </a>
                    </li>

                </ul>
            </li>
@endif
@endif
            