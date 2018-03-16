@extends('master')
@section('content')

    @if(Auth::user())
    @if(Auth::user()->positionId !=1 || Auth::user()->positionId!=3)
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
        <li class="active">Working Hours List</li>
    </ol>
    @endif
    @endif

    <h4 class="page-title">Working Hours List</h4>
    <!-- Alternative -->
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Working Hours List</h3>
        @if(Auth::user())
            @if(Auth::user()->positionId !=1 || Auth::user()->positionId!=3)
        <a class="btn btn-sm" data-toggle="modal" data-target=".modalAddShiftHours">New
        </a>
            @endif
        @endif

        <a class="btn btn-sm" href ="{{url('workingTeam')}}">View Working Team
        </a>
    </div>



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
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush


