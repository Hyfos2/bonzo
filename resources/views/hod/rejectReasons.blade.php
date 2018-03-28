
<div class="modal fade modalRejectReason" id="modalRejectReason" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <!--   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                <h4 class="modal-title" id='depTitle'>Reject Reasons</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'rejectReason/'.$leaveRequestProfile->id, 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"rejectReasonForm"]) !!}
                <input type="hidden" value="{{$leaveRequestProfile->id}}">
            
                <div class="form-group">
                    {!! Form::label('Reason', 'Reason', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('name',NULL,['class' => 'form-control input-sm','id' => 'name','autocomplete'=>'off','rows'=>6]) !!}
                        @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Reject</button>
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