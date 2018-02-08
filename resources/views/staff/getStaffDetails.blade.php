@extends('master')
@section('content')
    @if (\Auth::user())
        <ol class="breadcrumb hidden-xs">
            <li><a href="{{url('welcome')}}">Home</a></li>
            @if(\Auth::user()->positionId== 1 ||  \Auth::user()->positionId==2)
                <li><a href="{{ url('registerStaff') }}">Register Staff</a></li>
                <li><a href="{{ url('staffList') }}">Staff List</a></li>
                <li class="active">Staff Details</li>
            @elseif(\Auth::user()->positionId==3)
                <li class="active">Staff Details</li>
            @endif
        </ol>
        @endif


        <h4 class="page-title">RECORD ID :{{ $getDetails->id }}</h4>

    <br>

    <div class="block-area container">
        <div class="row">
            <div class="col-md-9">

                <div class="block-area" id="tabs">
                    <div class="tab-container">

                        <div class="tab-content">
                            <div class="tab-pane active" id="taskprofile">
                                <div class="block-area" id="horizontal">

                                    <h3  style="margin-left:-10px;" class="block-title">STAFF DETAILS</h3>

                                    @include('staff.edit')


                                </div>

                                <hr class="whiter m-t-20" />

                            </div>

                            <div class="tab-pane" id="tasknotes">

                                <h3 class="block-title">TASK NOTES</h3>


                                {{--@include('tasknotes.add')--}}

                            </div>


                            <div class="tab-pane" id="taskfiles">

                                <h3 class="block-title">TASK FILES</h3>

                                {{--@include('taskfile.add')--}}


                            </div>

                            <div class="tab-pane" id="taskreminders">

                                <h3 class="block-title">TASK REMINDERS</h3>

                                {{--@include('taskreminders.add')--}}

                            </div>

                            <div class="tab-pane" id="taskrelations">

                                <h3 class="block-title">RELATED TASKS</h3>

                            </div>

                        </div>
                    </div>


                </div>


                <div class="m-b-15 text-center profile-summary">



                </div>
            </div>

            <div class="col-md-3" style="margin-top:45px;">



                <div class="tile">
                    <h2 class="tile-title">STAFF LEAVE RECORDS</h2>

                    @include('staff.leaveRecords')
                </div>

            </div>

        </div>

    </div>


@endsection

