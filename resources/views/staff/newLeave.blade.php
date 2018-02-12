
<div class="modal fade modalAddLeave" id="modalAddLeave" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id='depTitle'>New Leave Form</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'addLeave', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"leaveForm" ]) !!}

                <div class="form-group">
                    {!! Form::label('Staff Name', 'Staff Name', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('staffId',old('staffId'),['class' => 'form-control input-sm','id' => 'staffId']) !!}
                        @if ($errors->has('staffId')) <p class="help-block red">*{{ $errors->first('staffId') }}</p> @endif
                    </div>
                </div>

    
                <div class="form-group">
                    {!! Form::label('Start Date', 'Start Date', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {{--{!! Form::text('startDate',NULL,['class' => 'form-control input-sm','id' => 'startDate']) !!}--}}
                        <p><input type = "text"   value="{{ old('startDate') }}"   name="startDate" placeholder ="Choose start date" id = "datepicker-Fromdate" class="form-control input-sm" ></p>
                        @if ($errors->has('startDate')) <p class="help-block red">*{{ $errors->first('startDate') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('End Date', 'End Date', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {{--{!! Form::text('staffDate',NULL,['class' => 'form-control input-sm','id' => 'staffDate']) !!}--}}
                        <p><input type = "text"   value="{{ old('endDate') }}"   name="endDate" placeholder ="Choose end date" id = "datepicker-Todate" class="form-control input-sm" ></p>
                        @if ($errors->has('startDate')) <p class="help-block red">*{{ $errors->first('startDate') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Leave Reason', 'Leave Reason', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('reason',old('reason'),['class' => 'form-control input-sm','id' => 'reason' ,'rows'=>'5' ]) !!}
                        @if ($errors->has('reason')) <p class="help-block red">*{{ $errors->first('reason') }}</p> @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Add Leave Form</button>
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
