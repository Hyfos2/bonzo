@extends('master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Home</a></li>
        <li><a href="{{ url('register') }}">Register Users</a></li>
        <li class="active">Users List</li>
    </ol>

    <h4 class="page-title">LIST</h4>
    <!-- Alternative -->
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Users List</h3>
        <a href="{{'register'}}" class="btn btn-sm"> Register Users</a>
       
    </div>

    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
        @if(Session::has('success'))
            <div class="alert alert-success alert-icon">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
                <i class="icon">&#61845;</i>
            </div>
        @endif

        <div class="table-responsive overflow">
            <table class="table  table-striped" id="usersTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Created At</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Grade</th>
                   <!--  <th>Actions</th> -->
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{--@include('departments.edit')--}}
    {{--@include('departments.add')--}}

@endsection
    {{--@push('scripts')--}}
        {{--<script>--}}
        {{--$(document).ready(function() {--}}

            {{--var oTable     = $('#usersTable').DataTable({--}}
                {{--"processing": true,--}}
                {{--"serverSide": true,--}}
                {{--"dom": 'T<"clear">lfrtip',--}}
                {{--"order" :[[0,"desc"]],--}}
                {{--"ajax": "{!! url('/users/') !!}",--}}
                {{--"columns": [--}}
                    {{--{data: 'id', name: 'id'},--}}
                    {{--{data: 'created_at', name: 'created_at'},--}}
                    {{--{data: 'name', name: 'name'},--}}
                    {{--{data: 'surname', name: 'surname'},--}}
                    {{--{data: 'email', name: 'email'},--}}
                    {{--{data: 'position', name: 'position'},--}}
                     {{--{data: 'gradeName', name: 'gradeName'},--}}
                    {{--{data: function(d)--}}
                        {{--{--}}
                            {{--return "<a href='{!! url('list-categories/" + d.id + "') !!}' class='btn btn-sm'>" + d.name + "</a>";--}}

                        {{--},"name" : 'name'},--}}
                    {{--{data: 'acronym', name: 'acronym'},--}}
                    {{--{data: 'actions',  name: 'actions'}--}}
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

{{--@endpush--}}
@push('scripts')
<script>
    $(function() {
        $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!url('/users/')!!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'name', name: 'name'},
                {data: 'surname', name: 'surname'},
                {data: 'email', name: 'email'},
                {data: 'position', name: 'position'},
                {data: 'gradeName', name: 'gradeName'}
                ]
             });
});
</script>
@endpush

