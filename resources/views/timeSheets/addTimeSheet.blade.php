<div class="modal fade modalAddTimeSheet" id="modalAddTimeSheet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='depTitle'>Upload Time Sheet</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'addTimeSheetFile', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addTimeSheetFileForm" ,'files'=>'true']) !!}

                 <div class="form-group">
                    {!! Form::label('Shift Name', 'Shift Name', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-9">
                       {!! Form::text('staffName',NULL,['class' => 'form-control input-sm','id' => 'staffName' ,'autocomplete' =>'off']) !!}
                    
                    @if ($errors->has('staffName')) <p class="help-block red">*{{ $errors->first('staffName') }}</p> @endif
                    </div>
                </div>

                 <div class="form-group">
                    {!! Form::label('Department', 'Department', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-9">

                        {!! Form::select('department',$selectDept,"",['class' => 'form-control' ,'id' => 'department','placeholder'=>'Select Department']) !!}

                        @if ($errors->has('department')) <p class="help-block red">*{{ $errors->first('department') }}</p> @endif
                      
                    </div>
                </div>


                 <div class="form-group">
                    {!! Form::label('Attach File', 'Attach File', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-9">

                     <input type='file' name='fileName' id='fileName' class='form-control' ><br>
                       
                        @if ($errors->has('fileName')) <p class="help-block red">*{{ $errors->first('fileName') }}</p> @endif
                      
                    </div>
                </div>


         
              
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Upload Time Sheet</button>
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