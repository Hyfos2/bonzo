@extends('master')

@section('content')

    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}"></a>Home</li>
        <li class="active">Departments List</li>
    </ol>

    <h4 class="page-title">LIST</h4>
    <!-- Alternative -->
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Departments List</h3>
        <a class="btn btn-sm" data-toggle="modal"  data-target=".modalAddDepartment">New
        </a>
    </div>


    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="departmentsTable">
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
    {{--@include('departments.edit')--}}
    @include('departments.new')
@endsection
@push('scripts')
<script>
    $(function() {
        $('#departmentsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!url('/getDepartment/')!!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush

