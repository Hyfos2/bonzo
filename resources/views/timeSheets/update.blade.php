<div class="modal fade modalUpdate" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='depTitle'>Update Time Sheet</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'updateSheet', 'method' => 'put', 'class' => 'form-horizontal', 'id'=>"updateFileForm" ,'files'=>'true']) !!}
                 {!! Form::hidden('id',$timeSheetFileRecord->id) !!}

                   <div class="form-group">
                    {!! Form::label('Attach File', 'Attach File', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-9">

                     <input type='file' name='fileName' id='fileName' class='form-control' ><br>
                        @if ($errors->has('fileName')) <p class="help-block red">*{{ $errors->first('fileName') }}</p> @endif
                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Update</button>
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