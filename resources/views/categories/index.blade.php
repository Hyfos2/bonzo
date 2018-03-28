@extends('master')
@section('content')
@include('categories.edit')
@include('Errors.error')

    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('/welcome')}}">Home</a></li>
        <li class="active">Department Categories</li>
    </ol>

    <h4 class="page-title">Categories</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Categories</h3>
         @if (Auth::user())
        @if(Auth::user()->roleId != 1)
        <a class="btn btn-sm hidden" data-toggle="modal"  data-target=".modalAddSubDept">New
        </a>
        @endif
        @endif
    </div>


    <div class="block-area" id="responsiveTable">
    <div class="table-responsive">
            <table class="table tile table-striped" id="categoriesTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Department</th>
                    <th>Sub Department</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('categories.add')
@endsection
@push('scripts')

    <script>
        $(function() {
            $('#categoriesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!!url('/getCategories/')!!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'department.name', name: 'department.name'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

         function launchUpdateSubDeptModal(id) {
            
            $(".modal-body #deptID").val(id);
                //var id =id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{!! url('/catDetails/"+ id + "')!!}",
                success: function (data) {
                    if (data!== null)
                     {
                        console.log('data',data);
                         $("#modalUpdateCat #department").val(data.department.name);
                         $("#modalUpdateCat #name").val(data.name);
                         $("#modalUpdateCat #catID").val(id);
                    }
                
                }
            });

        }

        @if (count($errors) > 0)
      $('#modalAddSubDept').modal('show');
       var name = $("#name").val();
      $('#modalAddSubDept #name').val(name);
    @endif
    </script>
@endpush
