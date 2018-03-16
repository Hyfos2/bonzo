<!-- Modal Default -->
<div class="modal fade modalUpdateCat" id="modalUpdateCat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                <h4 class="modal-title" id='depTitle'>Update</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'updateCat', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"UpdateCatForm"  ,"v-on:submit" =>"updateCat"]) !!}

                
                 {!! Form::hidden('catID', NULL,['id' => 'catID']) !!}

                <div class="form-group">
                    {!! Form::label('Department', 'Department', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('deparment',null,['class' => 'form-control input-sm','id' => 'department','autocomplete'=>'off','disabled'=>'disabled']) !!}
                    </div>
                </div>
                

                 <div class="form-group">
                    {!! Form::label('Category', 'Category', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        {!! Form::text('name',old('name'),['class' => 'form-control input-sm','id' => 'name','autocomplete'=>'off','v-model'=>'name','v-validate' =>"'alpha_spaces'"]) !!}
                        <span class="help-block"  v-cloak v-if="submition && wrongCatName" style="color:red;">@{{salaryFB}}</span>
                        <span style="color: red;"  v-cloak v-show="errors.has('name')" class="help is-danger">@{{errors.first('name') }}</span>
                        @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
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