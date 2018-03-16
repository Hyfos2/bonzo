@extends('master')

@section('content')
@include('departments.editDepartment')

    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}"></a>Home</li>
        <li class="active">Departments List</li>
    </ol>

    <h4 class="page-title">Department List</h4>
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
                     <th>Created At</th>
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
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        function launchUpdateDepartmentModal(id) {
            

            if (!id) {
                $('#deptID').modal('show');
                // $(".modal-body #deptID").val('');
                var idCompany = $("#idCompany").val();
                $("#modalEditDepartment #company").val(idCompany);
                $("#modalEditDepartment #name").val('');
                $("#modalEditDepartment #acronym").val('');
                return;
            }
            $(".modal-body #deptID").val(id);
                //var id =id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{!! url('/departmentsDetails/"+ id + "')!!}",
                success: function (data) {
                    if (data!== null) {
                        $("#modalEditDepartment #name").val(data.name);
                         $("#modalEditDepartment #deptID").val(id);
                    }
                    else {
                        $("#modalEditDepartment #name").val('');
                    }
                }
            });

        }
        @if (count($errors) > 0)

// $('#modalEditDepartment').modal('show');
$('#modalAddDepartment').modal('show');

    @endif
    </script>
@endpush


