@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li><a href="{{ url('/requestListing') }}">Leave Requests</a></li>
        <li class="active">Staff On Leave</li>
    </ol>

    <h4 class="page-title">Staff On Leave</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">staff on Leave</h3>
        <a class="btn btn-sm" href="{{url('requestListing')}}">Leave Requests
        </a>
    </div>


    <div class="block-area" id="responsiveTable">

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="notWorkingTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Start Date</th>
                     <th>End Date</th>
                    <th>Leave Period (in days)</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(function() {
            $('#notWorkingTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!!url('/getStaffNotWorking/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data:   function(d)
                        {
                            return d.staff.name+" "+d.staff.surname;
                        }, name: 'name'},
                     {data: 'startDate', name: 'startDate'},
                      {data: 'endDate', name: 'endDate'},
                     {data: 'daysTaken', name: 'daysTaken'},

                     {data: function(d){
                        return d.user.name+" "+d.user.surname;
                     }, name: 'created_by'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush



