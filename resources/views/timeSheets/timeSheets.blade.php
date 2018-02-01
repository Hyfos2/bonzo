@extends('master')

@section('content')
    <!-- Breadcrumb -->
@if(Auth::user())
    @if(Auth::user()->positionId==2)
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
        <li class="active">Staff Time Sheets List</li>
    </ol>
     @elseif(Auth::user()->positionId==1)
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
         <li><a href="{{ url('createTimeSheet') }}">New Time Sheet</a></li>
        <li class="active">Staff Time Sheets List</li>
    </ol>
    @elseif(Auth::user()->positionId==3)
     <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
        <li><a href="{{ url('createTimeSheet') }}">New Time Sheet</a></li>
        <li class="active">Staff Time Sheets List</li>
    </ol>

    @endif
    @endif

    <h4 class="page-title">Time Sheets List</h4>
    <!-- Alternative -->
    
    <div class="block-area " id="alternative-buttons" >
        <h3 class="block-title">Staff Time Sheets List</h3>
    
    </div>
   


    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="departmentsTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Created At</th>
                    <th>Name</th>
                    <th>Acronym</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

