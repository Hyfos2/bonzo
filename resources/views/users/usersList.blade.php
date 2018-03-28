@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
        <li><a href="{{ url('register') }}">Register Users</a></li>
        <li class="active">Users List</li>
    </ol>
    <h4 class="page-title">Users List</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Users List</h3>
        <a href="{{'register'}}" class="btn btn-sm"> Register Users</a>
         
    </div>

    <div class="block-area" id="responsiveTable">
    <div class="table-responsive">
            <table class="table tile table-striped" id="usersTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>email</th>
                    <th>Position</th>
                    <th>Grade</th>
                    <th>Created at</th>
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
                $('#usersTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!!url('/users/')!!}',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'surname', name: 'surname'},
                        {data: 'email', name: 'email'},
                        {data: 'position.name', name: 'position.name'},
                        {data: 'grade.grade', name: 'grade.grade'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}

                    ]
                });
            });
        });
    </script>
@endpush