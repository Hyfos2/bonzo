@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('/welcome')}}">Home</a></li>
        <li class="active">Staff Grades</li>
    </ol>

    <h4 class="page-title">Grades</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Staff Grades</h3>
        <a class="btn btn-sm" data-toggle="modal" onClick="launchAddDepartmentModal();" data-target=".modalAddGrade">New
        </a>
    </div>


    <div class="block-area" id="responsiveTable">
    <div class="table-responsive">
            <table class="table tile table-striped" id="gradesTable">
                <thead>
                <tr>
                    <th>Id</th>
                    {{--<th>Name</th>--}}
                    <th>Grade</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('staff.addGrade')
@endsection
@push('scripts')

    <script>
        $(function() {
            $('#gradesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!!url('/getGrades/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    // {data: 'name', name: 'name'},
                    {data: 'grade', name: 'grade'},
                    {data: 'salary', name: 'salary'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
