@extends('master')

@section('content')
    <!-- Breadcrumb -->

    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Home</a></li>
        @if(Auth::user()->positionId== 1 || Auth::user()->positionId==2)
        <li><a href="{{ url('registerStaff') }}">Register Staff</a></li>
        <li class="active">Staff List</li>
        @elseif(Auth::user()->positionId==3)
        <li class="active">Staff List</li>
        @endif
    </ol>

    <h4 class="page-title">LIST</h4>
    <!-- Alternative -->
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Staff List</h3>
        <a class="btn btn-sm" href="{{'registerStaff'}}">Register Staff
        </a>
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
            <table class="table tile table-striped" id="departmentsTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Created At</th>
                    <th>Name</th>
                    <th>Acronym</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    {{--@include('departments.edit')--}}
    {{--@include('departments.add')--}}
@endsection

@section('footer')

    <script>
        $(document).ready(function() {

            var oTable     = $('#departmentsTable').DataTable({
                "processing": true,

                "dom": 'T<"clear">lfrtip',
                "order" :[[0,"desc"]],
                        {{--"ajax": "{!! url('/getstaff/') !!}",--}}
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: function(d)
                        {
                            return "<a href='{!! url('list-categories/" + d.id + "') !!}' class='btn btn-sm'>" + d.name + "</a>";

                        },"name" : 'name'},
                    {data: 'acronym', name: 'acronym'},
                    {data: 'actions',  name: 'actions'},
                ],

                "aoColumnDefs": [
                    { "bSearchable": false, "aTargets": [ 1] },
                    { "bSortable": false, "aTargets": [ 1 ] }
                ]

            });

            $("#idCompany").on("change", function(ev) {
                idCompany = $(ev.currentTarget).val();
                console.log("#idCompany.change(ev) idCompany - ",idCompany,", ev - ",ev);
                console.log("  oTable - ",oTable.columns("acronym"));
                oTable.column("company:name").search(idCompany).draw();
            });

        });

        function launchUpdateDepartmentModal(id)
        {

            $(".modal-body #deptID").val(id);
            $.ajax({
                type    :"GET",
                dataType:"json",
                {{--url     :"{!! url('/departments/"+ id + "')!!}",--}}
                success :function(data) {

                    if(data[0] !== null)
                    {

                        $("#modalEditDepartment #name").val(data[0].name);
                        $("#modalEditDepartment #acronym").val(data[0].acronym);
                    }
                    else {
                        $("#modalEditDepartment #name").val('');
                        $("#modalEditDepartment #acronym").val('');
                    }

                }
            });

        }

        @if (count($errors) > 0)

        $('#modalEditDepartment').modal('show');

        @endif


    </script>
@endsection
