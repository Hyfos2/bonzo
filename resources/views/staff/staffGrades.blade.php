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
        @if(Session::has('success'))
            <div class="alert alert-success alert-icon">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
                <i class="icon">&#61845;</i>
            </div>
        @endif

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="gradesTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
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
    {{--<script>--}}
        {{--$(document).ready(function() {--}}

            {{--var oTable     = $('#gradesTable').DataTable({--}}
                {{--"processing": true,--}}

                {{--"dom": 'T<"clear">lfrtip',--}}
                {{--"order" :[[0,"desc"]],--}}
               {{--"ajax": "{!! url('/getGrades/') !!}",--}}
                {{--"columns": [--}}
                    {{--{data: 'id', name: 'id'},--}}
                    {{--{data: 'name', name: 'name'},--}}
                    {{--{data: 'grade', name: 'grade'},--}}
                    {{--{data: 'salary', name: 'salary'},--}}
                    {{--{data: function(d)--}}
                        {{--{--}}
                            {{--return "<a href='{!! url('list-categories/" + d.id + "') !!}' class='btn btn-sm'>" + d.name + "</a>";--}}

                        {{--},"name" : 'name'},--}}
                    {{--{data: 'acronym', name: 'acronym'},--}}
                    {{--{data: 'actions',  name: 'actions'},--}}
                {{--],--}}

                {{--"aoColumnDefs": [--}}
                    {{--{ "bSearchable": false, "aTargets": [ 1] },--}}
                    {{--{ "bSortable": false, "aTargets": [ 1 ] }--}}
                {{--]--}}

            {{--});--}}

            {{--$("#idCompany").on("change", function(ev) {--}}
                {{--idCompany = $(ev.currentTarget).val();--}}
                {{--console.log("#idCompany.change(ev) idCompany - ",idCompany,", ev - ",ev);--}}
                {{--console.log("  oTable - ",oTable.columns("acronym"));--}}
                {{--oTable.column("company:name").search(idCompany).draw();--}}
                {{--/*oTable.data().filter(function(v, i) {--}}
                    {{--console.log("  i - ",i,", v - ",v);--}}
                    {{--return v.company == 4 ? true : false;--}}
                {{--}).draw();*/--}}
            {{--});--}}

        {{--});--}}

        {{--function launchUpdateDepartmentModal(id)--}}
        {{--{--}}

            {{--$(".modal-body #deptID").val(id);--}}
            {{--$.ajax({--}}
                {{--type    :"GET",--}}
                {{--dataType:"json",--}}
                {{--url     :"{!! url('/departments/"+ id + "')!!}",--}}
                {{--success :function(data) {--}}

                    {{--if(data[0] !== null)--}}
                    {{--{--}}

                        {{--$("#modalEditDepartment #name").val(data[0].name);--}}
                        {{--$("#modalEditDepartment #acronym").val(data[0].acronym);--}}
                    {{--}--}}
                    {{--else {--}}
                        {{--$("#modalEditDepartment #name").val('');--}}
                        {{--$("#modalEditDepartment #acronym").val('');--}}
                    {{--}--}}

                {{--}--}}
            {{--});--}}

        {{--}--}}

        {{--@if (count($errors) > 0)--}}

        {{--$('#modalEditDepartment').modal('show');--}}

        {{--@endif--}}


    {{--</script>--}}

<script>
    $(function() {
        $('#gradesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!url('/getGrades/')!!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'grade', name: 'grade'},
                {data: 'salary', name: 'salary'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
