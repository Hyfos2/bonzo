@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="active">Positions List</li>
    </ol>
    <h4 class="page-title">Positions</h4>
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Positions List</h3>
        <a class="btn btn-sm" data-toggle="modal" onClick="launchAddDepartmentModal();" data-target=".modalAddPosition">New
        </a>
    </div>

    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
        <div class="table-responsive">
            <table class="table tile table-striped" id="positionsTable">
                <thead>
                <tr>
                    <th>Id</th>
                   
                    <th>Name</th>
            
                     <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('positions.new')
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#positionsTable').DataTable({
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                processing: true,
                serverSide: true,
                ajax: '{!!url('/getPositions/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush

