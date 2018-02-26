@extends('master')

@section('content')
    <!-- Breadcrumb -->
    @if (\Auth::user())
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('welcome')}}">Home</a></li>
        @if(\Auth::user()->positionId== 1 ||  \Auth::user()->positionId==2)
        <li><a href="{{ url('registerStaff') }}">Register Staff</a></li>
        <li class="active">Staff List</li>
        @elseif(\Auth::user()->positionId==3)
        <li class="active">Staff List</li>
        @endif
    </ol>


    <h4 class="page-title">Staff List</h4>
    <!-- Alternative -->
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Staff List</h3>
        @if(\Auth::user()->positionId!= 1 || \Auth::user()->positionId!=2)
        <a class="btn btn-sm" href="{{'registerStaff'}}">Register Staff
        </a>
            @endif
    </div>
    @endif

    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
    
        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="staffTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>department</th>
                    <th>position</th>
                    <th>action</th>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    {{--@include('departments.edit')--}}
    {{--@include('departments.add')--}}
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#staffTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! '/getstaff/' !!}',
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'surname' },
                    { data: 'department.name'},
                    { data: 'position.name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush



