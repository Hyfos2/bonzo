@extends('master')
@section('content')
@include('positions.positionsList')
@include('Errors.error')
    <ol class="breadcrumb hidden-xs">
        
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="active">Positions List</li>
    </ol>
    <h4 class="page-title">Positions</h4>
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Positions List</h3>
         @if (Auth::user())
        @if(Auth::user()->roleId != 1)
        <a class="btn btn-sm hidden" data-toggle="modal"  data-target=".modalAddPosition">New
        </a>
        @endif
        @endif
    </div>

    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
        <div class="table-responsive">
            <table class="table tile table-striped" id="positionsTable">
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
    @include('positions.new')
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#positionsTable').DataTable({
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
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

         function launchUpdatePositionModal(id) {
            

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
                url: "{!! url('/positionDetails/"+ id + "')!!}",
                success: function (data) {
                    if (data!== null) {
                        $("#modalEditDepartment #name").val(data.name);
                         $("#modalEditDepartment #positionID").val(id);
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

