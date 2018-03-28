@extends('master')
@section('content')
@include('Errors.error')
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="active">Employment Types</li>
    </ol>

    <h4 class="page-title">Employment Type</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Employment Type List</h3>
          @if (Auth::user())
        @if(Auth::user()->roleId != 1)
        <a class="btn btn-sm hidden" data-toggle="modal" data-target=".modalEmploymentType">New
        </a>
         @endif
        @endif
    </div>


    <div class="block-area" id="responsiveTable">

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="typeListTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created at</th>
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
                     {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush



