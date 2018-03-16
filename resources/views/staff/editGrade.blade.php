<div class="modal fade modalEditGrade" id="modalEditGrade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='depTitle'>Edit Grade</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'editGrade', 'method' => 'put', 'class' => 'form-horizontal', 'id'=>"updateGradeForm" ,"v-on:submit" =>"updateGrade" ]) !!}

                {!! Form::hidden('gradeID', NULL,['id' => 'gradeID']) !!}

                <div class="form-group">
                    {!! Form::label('Grade', 'Grade', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('grade',old('grade'),['class' => 'form-control input-sm','id' => 'grade','autocomplete'=>'off','v-model'=>'grade','v-validate' =>"'numeric'"]) !!}
                        <span class="help-block"  v-cloak v-if="submition && wrongUpdateGrade" style="color:red;">@{{gradeFB}}</span>
                        <span style="color: red;"  v-cloak v-show="errors.has('grade')" class="help is-danger">@{{errors.first('grade') }}</span>
                        @if ($errors->has('grade')) <p  v-bind:class="{hidden :isHidden}"  class="help-block red">*{{ $errors->first('grade') }}</p> @endif
                    </div>
                </div>
                

                 <div class="form-group">
                    {!! Form::label('salary', 'Salary', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('salary',old('salary'),['class' => 'form-control input-sm','id' => 'salary','autocomplete'=>'off','v-model'=>'salary','v-validate' =>"'decimal'"]) !!}
                        <span class="help-block"  v-cloak v-if="submition && wrongUpdateSalary" style="color:red;">@{{salaryFB}}</span>
                        <span style="color: red;"  v-cloak v-show="errors.has('salary')" class="help is-danger">@{{errors.first('salary') }}</span>
                        @if ($errors->has('salary')) <p class="help-block red">*{{ $errors->first('salary') }}</p> @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
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