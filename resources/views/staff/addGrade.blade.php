<!-- Modal Default -->
<div class="modal fade modalAddGrade" id="modalAddGrade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                <h4 class="modal-title" id='depTitle'>Staff Grades</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'addGrade', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"updateDepartmentForm" ]) !!}
                {{--{!! Form::hidden('id',Auth::user()->id) !!}--}}

                <div class="form-group">
                    {!! Form::label('Name', 'Name', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name','autocomplete'=>'off']) !!}
                        @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Grade', 'Grade', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('grade',NULL,['class' => 'form-control input-sm','id' => 'grade','autocomplete'=>'off']) !!}
                        @if ($errors->has('grade')) <p class="help-block red">*{{ $errors->first('grade') }}</p> @endif
                    </div>
                </div>

                 <div class="form-group">
                    {!! Form::label('salary', 'Salary', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('salary',NULL,['class' => 'form-control input-sm','id' => 'salary','autocomplete'=>'off']) !!}
                        @if ($errors->has('salary')) <p class="help-block red">*{{ $errors->first('salary') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Add Grade</button>
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