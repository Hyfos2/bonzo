@extends('master')
@section('content')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link href="{{ asset('css/token-input.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="{{ asset('js/jquery.tokeninput.js') }}"></script>
  <script>
    var $j = jQuery.noConflict();
    $j(document).ready(function(){
      $j("#datepicker-Todate").datepicker({
         minDate :-0,
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
     var $t = jQuery.noConflict();
     $t("#staffId").tokenInput("{!! url('/getStaffDetails')!!}",{tokenLimit:1});
  </script>


    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}"></a>Home</li>
        <li class="active">Staff on Leave List</li>
    </ol>

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
                    <th>off days</th>
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
    $(function() {
        $('#leaveTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!url('/getLeaveDays/')!!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'approvedBy', name: 'approvedBy'},
                {data: 'offDays', name: 'offDays'},
                {data: 'startDate', name: 'startDate'},
                {data: 'endDate', name: 'endDate'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush