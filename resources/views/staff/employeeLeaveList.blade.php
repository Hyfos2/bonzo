@extends('master')

@section('content')
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <script src="{{asset('js/jquery-1.12.4.js')}}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script>
        function increment()
        {
            count +=1;
        }

        $(document).ready(function(){
            $("#datepicker-Fromdate").datepicker({
                maxDate :-0,
                dateFormat: 'yy-mm-dd'
            });
            $("#datepicker-Todate").datepicker({
                maxDate :-0,
                dateFormat: 'yy-mm-dd'
            });
        });

        $(function()
        {
            $( "#datepicker-Fromdate" ).datepicker({
                prevText:"click for previous months",
                nextText:"click for next months",
                showOtherMonths:true,
                selectOtherMonths: false

            });
            $( "#datepicker-Todate" ).datepicker({
                prevText:"click for previous months",
                nextText:"click for next months",
                showOtherMonths:true,
                selectOtherMonths: true

            });
        });
    </script>
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}"></a>Home</li>
        <li class="active">Staff Leave List</li>
    </ol>

    <h4 class="page-title">LIST</h4>
    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Staff Leave List</h3>
        <a class="btn btn-sm" data-toggle="modal" onClick="launchAddDepartmentModal();" data-target=".modalAddLeave">New
        </a>
    </div>


    <!-- Responsive Table -->
    <div class="block-area" id="responsiveTable">
     
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
    @include('staff.newLeave')
@endsection

@section('footer')

    <script>
        $(document).ready(function() {

            var oTable     = $('#departmentsTable').DataTable({
                "processing": true,

                "dom": 'T<"clear">lfrtip',
                "order" :[[0,"desc"]],
                        "ajax": "{!! url('/departments-list/'.$id_company) !!}",
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
                /*oTable.data().filter(function(v, i) {
                    console.log("  i - ",i,", v - ",v);
                    return v.company == 4 ? true : false;
                }).draw();*/
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
