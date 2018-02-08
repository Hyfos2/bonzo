@extends('master')
@section('content')

<ol class="breadcrumb hidden-xs">
    <li><a href="#">Home</a></li>
    <li><a href="{{ url('usersList') }}">Users List</a></li>
    <li class="active">Registration Form</li>
</ol>
<h4 class="page-title">USERS</h4>

<!-- Basic with panel-->
<div class="block-area" id="basic">
    <h3 class="block-title">Registration Form</h3>
    <div class="tile p-15">

      <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">
             <form class="form-horizontal" method="POST" href="{{'addUser'}}" id="registrationForm" v-on:submit="registerUser" >
                        {{ csrf_field() }}
           
            <div class="form-group">
                {!! Form::label('First Name', 'First Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name', 'v-validate' =>"'alpha_spaces'",'autocomplete'=>'off','v-model'=>'name']) !!}
                    <span class="help-block"  v-cloak v-if="submition && wrongName" style="color:red;">@{{nameFB}}</span>
                    <span style="color: red;"  v-cloak v-show="errors.has('name')" class="help is-danger">@{{errors.first('name') }}</span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Surname', 'Surname', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('surname',NULL,['class' => 'form-control input-sm','id' => 'surname', 'v-validate' =>"'alpha_spaces'",'autocomplete'=>'off','v-model'=>'surname']) !!}
                
                    <span class="help-block"  v-cloak v-if="submition && wrongSurname" style="color:red;">@{{surnameFB}}</span>
                    <span style="color: red;"  v-cloak v-show="errors.has('surname')" class="help is-danger">@{{errors.first('surname') }}</span>
                </div>
            </div>

               <div class="form-group">
                {!! Form::label('Email', 'Email', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  
<input name="email" v-validate="'email'" class="form-control" :class="{'input': true, 'is-danger': errors.has('email') }" type="text" autocomplete="off" v-model="email" placeholder="infor@howbmc.co.zw">

                  @if ($errors->has('email')) <p v-bind:class="{hidden :isHidden}"  class="help-block red">* {{ $errors->first('email') }}</p> @endif
                   <span v-show="errors.has('email')" v-cloak class="help is-danger" style="color:red;">@{{errors.first('email') }}</span>
                    <span class="help-block"  v-cloak v-if="submition && wrongEmail" style="color:red;">@{{emailFB}}</span>
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Position', 'Position', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">

               <select  name="positionId"  v-cloak class="form-control" v-model ="positionId">
        
                                @foreach($pos as $type)
                                    <option  value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>

                    <span class="help-block"  v-cloak v-if="submition && wrongPositionId" style="color:red;">@{{positionFB}}</span>
                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Grade', 'Grade', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">

                   <select  name="gradeId" v-cloak class="form-control" v-model ="gradeId" >
                                @foreach($grade as $type)
                                    <option    value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
          
                   <span class="help-block"  v-cloak v-if="submition && wrongGradeId" style="color:red;">@{{gradeFB}}</span>
                </div>
            </div>

                 <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" id='submitMemberForm' class="btn btn-info btn-sm m-t-10">Register User</button>
                </div>
            </div>


            
            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">

           <div class="form-group">
            </div>

</form>

     <!--    {!! Form::close() !!} -->
    </div>
</div>

@endsection

