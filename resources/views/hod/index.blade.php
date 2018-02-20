@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="active">Leave Request List</li>
    </ol>

    <h4 class="page-title">Leave Request List</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Leave Request List</h3>
        <!-- <a class="btn btn-sm" data-toggle="modal" data-target=".modalEmploymentType">New
        </a> -->
    </div>


    <div class="block-area" id="responsiveTable">

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="typeListTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Reason for leave</th>
                    <th>Leave Period (in days)</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('home.new')

@endsection
@push('scripts')
    <script>
        $(function() {
            $('#typeListTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!!url('/getRequest/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data:   function(d)
                        {
                            return d.staff.name+" "+d.staff.surname;
                        }, name: 'name'},
                     {data: 'reasonForRequest', name: 'reasonForRequest'},
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



