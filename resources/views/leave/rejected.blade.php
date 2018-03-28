@extends('master')
@section('content')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}"> -->
     <link href="{{ asset('css/token-input.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <!-- <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script> -->
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
         <li><a href="{{ url('/pendingRequests') }}">Pending Requests</a></li>
          <li><a href="{{ url('/leave') }}">Accepted Requests</a></li>
        <li class="active">Rejected Requests</li>
    </ol>
@endif
@endif
    <h4 class="page-title">Rejected Requests</h4>
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Rejected Requests</h3>
        <a class="btn btn-sm" data-toggle="modal" data-target=".modalAddLeave">New Request
        </a>
    </div>


    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
     
        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="rejectsTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>Rejected by</th>
                    <th>Leave days</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('staff.newLeave')
@endsection
@push('scripts')
    <script>
   var name ="{!!\Auth::user()->name!!}"+" "+ "{!!\Auth::user()->surname!!}";
        $(function() {
            $('#rejectsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!!url('/getRejectedRequest/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data : function(d)
                        {
                            return d.staff.name +" "+d.staff.surname;
                        },name:'staffId'},
                    {data:function(d)
                      {
                        return d.user.name+ " "+d.user.surname;
                      },name:'created_by'},
                         {data: 'daysTaken', name: 'daysTaken'},
                    {data: 'startDate', name: 'startDate'},
                    {data: 'endDate', name: 'endDate'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush

