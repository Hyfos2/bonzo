<!-- Modal Default -->
<div class="modal fade modalAddSubDept" id="modalAddSubDept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                <h4 class="modal-title" id='depTitle'>Department Categories</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'categories', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addCatForm"  ,"v-on:submit" =>"addCat"]) !!}

                    <div class="form-group">
                    {!! Form::label('Department', 'Department', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-9">

                        {!! Form::select('departmentId',$selectDept,"",['class' => 'form-control' ,'id' => 'departmentId','v-model '=>"departmentId" ,'placeholder'=>'Select Department']) !!}
                        <span class="help-block"  v-cloak v-if="submition && wrongDpt" style="color:red;">@{{dptFB}}</span>
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('Sub Department', 'Sub Department', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-9">
                        {!! Form::text('name',old('name'),['class' => 'form-control input-sm','id' => 'name','autocomplete'=>'off','v-model'=>'name','v-validate' =>"'alpha_spaces'"]) !!}
                        <span class="help-block"  v-cloak v-if="submition && wrongCatName" style="color:red;">@{{catNameFB}}</span>
                        <span style="color: red;"  v-cloak v-show="errors.has('name')" class="help is-danger">@{{errors.first('name') }}</span>
                        @if ($errors->has('name')) <p  v-bind:class="{hidden :isHidden}"  class="help-block red">*{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>
            

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Add Category</button>
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