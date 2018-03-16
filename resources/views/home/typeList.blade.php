W@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="active">Employment Types</li>
    </ol>

    <h4 class="page-title">Employment Type</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Employment Type List</h3>
        <a class="btn btn-sm" data-toggle="modal" data-target=".modalEmploymentType">New
        </a>
    </div>


    <div class="block-area" id="responsiveTable">

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="typeListTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
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
                ajax: '{!!url('/getTypes/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush



