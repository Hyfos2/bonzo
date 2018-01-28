@extends('master')

@section('content')
 <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
<script src="{{{asset('js/jquery-1.12.4.js')}}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script>
        function increment()
        {
            count +=1;
        }

        $(document).ready(function(){
            $("#datepicker-Fromdate").datepicker({
                maxDate :-0,
                dateFormat: 'yy-mm-dd'
            });
            $("#datepicker-Todate").datepicker({
                maxDate :-0,
                dateFormat: 'yy-mm-dd'
            });
        });

        $(function()
        {
            $( "#datepicker-Fromdate" ).datepicker({
                prevText:"click for previous months",
                nextText:"click for next months",
                showOtherMonths:true,
                selectOtherMonths: false

            });
            $( "#datepicker-Todate" ).datepicker({
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

    <h4 class="page-title">STAFF</h4>

    <!-- Basic with panel-->
    <div class="block-area" id="basic">
        <h3 class="block-title">Staff Registration Form</h3>
        <div class="tile p-15">

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">
            {!! Form::open(['url' => 'addStaff', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"staffRegistrationForm" ]) !!}

            <div class="form-group">
                {!! Form::label('First Name', 'First Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name']) !!}
                    @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Surname', 'Surname', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('surname',NULL,['class' => 'form-control input-sm','id' => 'surname']) !!}
                    @if ($errors->has('surname')) <p class="help-block red">*{{ $errors->first('surname') }}</p> @endif
                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Date Of Birth', 'Date Of Birth', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <p><input type = "text"   value="{{ old('dob') }}"   name="dob" placeholder ="Pick Date" id = "datepicker-Todate" class="form-control input-sm"></p>
                    @if ($errors->has('dob')) <p class="help-block red">* {{ $errors->first('dob') }}</p> @endif
                </div>
            </div>


              <div class="form-group">
                {!! Form::label('Gender', 'Gender', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::select('gender',['0' => 'Select Gender','Male' => 'Male','Female' => 'Female'],0,['class' => 'form-control' ,'id' => 'gender']) !!}
                    @if ($errors->has('gender')) <p class="help-block red">*{{ $errors->first('gender') }}</p> @endif
                </div>
            </div>

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">       

            <div class="form-group">
                {!! Form::label('Recruitment Date', 'Recruitment Date', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                        <p><input type = "text"   value="{{ old('dateOfEmployment') }}"   name="dateOfEmployment" placeholder ="Pick A Date" id = "datepicker-Fromdate" class="form-control input-sm"></p>
                    @if ($errors->has('dateOfEmployment')) <p class="help-block red">* {{ $errors->first('dateOfEmployment') }}</p> @endif
                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Employment Type', 'Employment Type', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                
                    <select  name="employementTypeId"  class="form-control" >
                        <option  selected disabled >Select Type</option>
                                @foreach($employmentTypes as $type)
                                    <option  value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>

                </div>
            </div>


              <div class="form-group">
                {!! Form::label('Staff Number', 'Staff Number', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('employeeNumber',NULL,['class' => 'form-control input-sm','id' => 'employeeNumber' , 'required']) !!}

                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Department', 'Department', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">

                    <select  name="departmentId"  class="form-control" id="droneTypeData" >
                        <option  selected disabled >Select Department</option>
                                @foreach($dprtments as $type)
                                    <option  value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>

                    @if ($errors->has('departmentId')) <p class="help-block red">* {{ $errors->first('departmentId') }}</p> @endif
                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Position', 'Position', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                   
                     <select name="positionId" class="form-control" id="droneTypeData" >
                        <option  selected disabled >Select Position</option>
                                @foreach($positions as $type)
                                    <option  value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                    @if ($errors->has('departmentId')) <p class="help-block red">* {{ $errors->first('departmentId') }}</p> @endif
                </div>
            </div>


             <div class="form-group">
                {!! Form::label('Grade', 'Grade', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <select   name="gradeId" class="form-control" >
                           <option  selected disabled >Select Grade</option>
                                @foreach($grades as $type)
                                    <option  value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                    @if ($errors->has('departmentId')) <p class="help-block red">* {{ $errors->first('departmentId') }}</p> @endif
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

@section('footer')
    <script>
        $(document).ready(function() {
            $("#province").change(function(){

                $.get("{{ url('/api/dropdown/districts/province')}}",
                    { option: $(this).val()},
                    function(data) {
                        $('#district').empty();
                        $('#municipality').empty();
                        $('#ward').empty();
                        $('#district').removeAttr('disabled');
                        $('#district').append("<option value='0'>Select one</option>");
                        $('#municipality').append("<option value='0'>Select one</option>");
                        $('#ward').append("<option value='0'>Select one</option>");
                        $.each(data, function(key, element) {
                            $('#district').append("<option value="+ key +">" + element + "</option>");
                        });
                    });

            });
            $("#district").change(function(){
                $.get("{{ url('/api/dropdown/municipalities/district')}}",
                    { option: $(this).val() },
                    function(data) {
                        $('#municipality').empty();
                        $('#municipality').removeAttr('disabled');
                        $('#municipality').append("<option value='0'>Select one</option>");
                        $.each(data, function(key, element) {
                            $('#municipality').append("<option value="+ key +">" + element + "</option>");
                        });
                    });
            });
            $("#municipality").change(function(){
                $.get("{{ url('/api/dropdown/wards/municipality')}}",
                    { option: $(this).val() },
                    function(data) {
                        $('#ward').empty();
                        $('#ward').removeAttr('disabled');
                        $('#ward').append("<option value='0'>Select one</option>");
                        $.each(data, function(key, element) {
                            $('#ward').append("<option value="+ key +">" + element + "</option>");
                        });
                    });
            });

        })

    </script>
@endsection
