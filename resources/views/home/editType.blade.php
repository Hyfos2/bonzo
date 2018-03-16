<div class="modal fade modalEditType" id="modalEditType" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='depTitle'>Edit Type</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'editType', 'method' => 'put', 'class' => 'form-horizontal', 'id'=>"updateTypeForm" ,"v-on:submit" =>"updateType" ]) !!}

                {!! Form::hidden('deptID',NULL,['id' => 'deptID']) !!}
               <div class="form-group">
                    {!! Form::label('Name', 'Name', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('name',old('name'),['class' => 'form-control input-sm','id' => 'name','autocomplete'=>'off','v-model'=>'name','v-validate' =>"'alpha_spaces'"]) !!}
                        <span class="help-block"  v-cloak v-if="submition && wrongDepartment" style="color:red;">@{{nameFB}}</span>
                        <span style="color: red;"  v-cloak v-show="errors.has('name')" class="help is-danger">@{{errors.first('name') }}</span>
                         @if ($errors->has('name')) <p  v-bind:class="{hidden :isHidden}"  class="help-block red">*{{ $errors->first('name') }}</p> @endif
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