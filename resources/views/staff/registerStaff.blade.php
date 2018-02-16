@extends('master')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    var $j = jQuery.noConflict();
    $j(document).ready(function(){
      $j("#datepicker-Todate").datepicker({
       maxDate: new Date(2000, 2 - 1, 1),
           dateFormat:"yy-mm-dd",
            changeYear: true,
            changeMonth: true

        });
        $j("#datepicker-Fromdate").datepicker({
          maxDate :-0,
           dateFormat:"yy-mm-dd"
        });
    });
  var $y = jQuery.noConflict();
    $y(function() 
    {
            $y( "#datepicker-Todate" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
            $y( "#datepicker-Fromdate" ).datepicker({
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true
            });
    });
  </script>

   
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('welcome') }}">Home</a></li>       
        <li><a href="{{ url('staffList') }}">Staff List</a></li>
        <li class="active"> Staff Registration Form</li>
    </ol>

    <h4 class="page-title">Register Staff</h4>

    <!-- Basic with panel-->
    <div class="block-area" id="basic">
        <h3 class="block-title">Staff Registration Form</h3>
        <div class="tile p-15">

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">
            {!! Form::open(['url' => 'addStaff', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"staffRegistrationForm"]) !!}

           <div class="form-group">
                {!! Form::label('First Name', 'First Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('name',old('name'),['class' => 'form-control input-sm','id' => 'name','autocomplete'=>'off']) !!}
                    @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Surname', 'Surname', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('surname',old('surname'),['class' => 'form-control input-sm','id' => 'surname','autocomplete'=>'off']) !!}
                    @if ($errors->has('surname')) <p class="help-block red">*{{ $errors->first('surname') }}</p> @endif
                
                                    </div>
            </div>

             <div class="form-group">
                {!! Form::label('Date Of Birth', 'Date Of Birth', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <p><input type = "text"   value="{{ old('dateOfBirth') }}"   name="dateOfBirth" placeholder ="Pick  A Date" id = "datepicker-Todate" class="form-control input-sm" ></p>
                    @if ($errors->has('dateOfBirth')) <p class="help-block red">*{{ $errors->first('dateOfBirth') }}</p> @endif
                                  </div>
            </div>


              <div class="form-group">
                {!! Form::label('Gender', 'Gender', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::select('gender',[''=>'Select Gender','Male' => 'Male','Female' => 'Female'],0,['class' => 'form-control' ,'id' => 'gender']) !!}
                    @if ($errors->has('gender')) <p class="help-block red">*{{ $errors->first('gender') }}</p> @endif

                </div>
            </div>

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">       

            <div class="form-group">
                {!! Form::label('Recruitment Date', 'Recruitment Date', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                        <input type = "text"   value="{{ old('dateOfEmployment') }}"   name="dateOfEmployment" placeholder ="Pick A Date" id = "datepicker-Fromdate" class="form-control input-sm" >
                    @if ($errors->has('dateOfEmployment')) <p class="help-block red">*{{ $errors->first('dateOfEmployment') }}</p> @endif

                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Employment Type', 'Employment Type', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <select  name="employmentType" class="form-control" >
                        <option selected disabled>Select Employment Type</option>
                        @foreach($employmentTypes as $type)
                            <option  value="{{$type->id}}" @if(old('employmentType') == $type->id) {{ 'selected' }} @endif>{{$type->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('employmentType')) <p class="help-block red">*{{ $errors->first('employmentType') }}</p> @endif


                </div>
            </div>


              <div class="form-group">
                {!! Form::label('Staff Number', 'Staff Number', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('employeeNumber',old('employeeNumber'),['class' => 'form-control input-sm','id' => 'employeeNumber','autocomplete'=>'off']) !!}
                    @if ($errors->has('employeeNumber')) <p class="help-block red">*{{ $errors->first('employeeNumber') }}</p> @endif


                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Department', 'Department', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">

                    <select  name="department" class="form-control" >
                        <option selected disabled>Select Department</option>
                                @foreach($dprtments as $type)
                            <option  value="{{$type->id}}" @if(old('department') == $type->id) {{ 'selected' }} @endif>{{$type->name}}</option>
                                @endforeach
                            </select>
                    @if ($errors->has('department')) <p class="help-block red">*{{ $errors->first('department') }}</p> @endif


                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Position', 'Position', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                   
                     <select name="position" class="form-control"  >
                         <option selected disabled>Select Position</option>
                                @foreach($positions as $type)
                             <option  value="{{$type->id}}" @if(old('position') == $type->id) {{ 'selected' }} @endif>{{$type->name}}</option>
                                @endforeach
                            </select>
                    @if ($errors->has('position')) <p class="help-block red">*{{ $errors->first('position') }}</p> @endif

                </div>
            </div>


             <div class="form-group">
                {!! Form::label('Grade', 'Grade', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <select   name="grade" class="form-control"  >
                        <option selected disabled>Select Grade</option>
                                @foreach($grades as $type)
                            <option  value="{{$type->id}}" @if(old('grade') == $type->id) {{ 'selected' }} @endif>{{$type->grade}}</option>
                                @endforeach
                            </select>
                    @if ($errors->has('grade')) <p class="help-block red">*{{ $errors->first('grade') }}</p> @endif

                </div>
            </div>


            <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" id='submitMemberForm' class="btn btn-info btn-sm m-t-10">Add Staff</button>
                </div>
            </div>

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">


            <div class="form-group">
            </div>


            {!! Form::close() !!}
        </div>
    </div>

@endsection
