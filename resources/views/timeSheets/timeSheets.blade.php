@extends('master')

@section('content')
@include('timeSheets.addTimeSheet')
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
    
    
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Staff List</h3>
         <a class="btn btn-sm" data-toggle="modal" onClic data-target=".modalAddTimeSheet">New Upload 
        </a>
    </div>
   


    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="timeSheetTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Staff Name</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        jQuery(document).ready(function($) {

            $(function () {
                $('#timeSheetTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!!url('/getTimeSheet/')!!}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: function(d) {
                            return d.staff.name +" "+d.staff.surname;
                        }, name: 'name'},

                        {data: function(d)
                            {
                                return d.department.name
                            }, name: 'surname'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}

                    ]
                });
            });
        });
    </script>
@endpush

