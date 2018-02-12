@extends('master')
@section('content')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link href="{{ asset('css/token-input.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    var $j = jQuery.noConflict();
    $j(document).ready(function(){
      $j("#datepicker-Todate").datepicker({
         minDate :+1,
           changeMonth: true,
           dateFormat:"yy-mm-dd"

        });
        $j("#datepicker-Fromdate").datepicker({
           minDate :-0,
           changeMonth: true,
           dateFormat:"yy-mm-dd"
        });
    });
  var $y = jQuery.noConflict();
    $y(function() 
    {
            $y( "#datepicker-Todate" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
            $y( "#datepicker-Fromdate" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
    });
   
  </script>

@if(Auth::user())
@if(Auth::user()->positionId !=1 || Auth::user()->positionId !=2)
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="active">Staff on Leave List</li>
    </ol>
@endif
@endif
    <h4 class="page-title">Not working Staff</h4>
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Staff  on Leave List</h3>
        <a class="btn btn-sm" data-toggle="modal" data-target=".modalAddLeave">New
        </a>
    </div>


    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
     
        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="leaveTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>Approved by</th>
                    <th>Leave days</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    {{--@include('departments.edit')--}}
    @include('staff.newLeave')
@endsection
@push('scripts')
    <script>
       {{--// var name ="{{\Auth::user()->name}}"+" "+ "{{\Auth::user()->surname}}";--}}
        $(function() {
            $('#leaveTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!!url('/getLeaveDays/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data : function(d)
                        {
                            return d.staff.name +" "+d.staff.surname;
                        },name:'staffId'},
                    // {data: 'staffId', name: 'staffId'},
                    {data: 'created_by',name:'created_by'},
                         {data: 'daysTaken', name: 'daysTaken'},
                    {data: 'startDate', name: 'startDate'},
                    {data: 'endDate', name: 'endDate'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush

