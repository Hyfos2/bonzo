@extends('master')
@section('content')
    @if(\Auth::user())
        @if(\Auth::user()->posititonId !=1)
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{url('welcome')}}">Home</a></li>
                <li><a href="{{ url('register') }}">Register Users</a></li>
                <li><a href="{{ url('usersList') }}">Users List</a></li>
                <li class="active">User Profile</li>
            </ol>
        @endif
    @endif

    <h4 class="page-title">User Profile</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">User Profile </h3>
    </div>

    <br>

    <div class="block-area container">
        <div class="row">
            <div class="col-md-9">

                <div class="block-area" id="tabs">
                    <div class="tab-container">

                        <div class="tab-content">
                            <div class="tab-pane active" id="taskprofile">
                                <div class="block-area" id="horizontal">

                                    <h3  style="margin-left:-10px;" class="block-title">USER DETAILS</h3>

                                    @include('users.profileBody')

                                </div>

                                <hr class="whiter m-t-20" />

                            </div>

                            <div id="tasknotes">
                                <div class="block-area" id="horizontal">

                                    <h3 class="block-title">USER ACTIVITIES</h3>

                                    @include('users.activities')

                                </div>



                            </div>

                        </div>
                    </div>
                </div>

                <div class="m-b-15 text-center profile-summary">



                </div>
            </div>

            <div class="col-md-3" style="margin-top:45px;">

                <h3  style="margin-left:1px;" class="block-title">USER LOG IN RECORDS</h3>
                <div class="tile">
                    @include('users.logIn')
                </div>

            </div>

        </div>

    </div>


@endsection


