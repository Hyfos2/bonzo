<!-- Modal Default -->
<div class="modal fade modalAddDepartment" id="modalAddDepartment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='depTitle'>New Departments</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'addDepartment', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"updateDepartmentForm" ]) !!}
                <div class="form-group">
                    {!! Form::label('Name', 'Name', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name','autocomplete'=>'off']) !!}
                        @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Add Department</button>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>