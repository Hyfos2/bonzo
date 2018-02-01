@extends('master')

@section('content')


    @if(Auth::user())
    @if(Auth::user()->positionId !=1 || Auth::user()->positionId!=3)
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
        <li class="active">Shift Hours List</li>
    </ol>
    @endif
    @endif

    <h4 class="page-title">Working Hours List</h4>
    <!-- Alternative -->
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Shift Hours List</h3>
        <a class="btn btn-sm" data-toggle="modal" data-target=".modalAddShiftHours">New
        </a>
         <a class="btn btn-sm" href ="">View Staff Shift
        </a>
    </div>


    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
        
        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="shiftTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Working Hours</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    {{--@include('departments.edit')--}}
    @include('home.newShiftHours')
@endsection

@push('scripts')

@push('scripts')
<script>
    $(function() {
        $('#shiftTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!url('/getShifts/')!!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'timeIn', name: 'timeIn'},
                {data: 'timeOut', name: 'timeOut'},
                {data: 'workingHours', name: 'workingHours'},
                {data: 'created_by', name: 'created_by'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush

   
@endpush
@push('scripts')
<script>
    $(function() {
        $('#positionsTable').DataTable({
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

