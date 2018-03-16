@extends('master')

@section('content')
    <link href="{{ asset('css/token-input.css') }}" rel="stylesheet"/>

   @if (Auth::user())
           @if(Auth::user()->positionId!=1 || Auth::user()->positionId!=2|| Auth::user()->positionId!=3 )
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('welcome') }}">Home</a></li>
        <li><a href="{{ url('timeSheets') }}">Time Sheets</a></li>
        <li class="active">New Time Sheet</li>
    </ol>
    @endif
    @endif

    <h4 class="page-title">New Time Sheet</h4>

    <!-- Basic with panel-->
    <div class="block-area" id="basic">
        <h3 class="block-title">New Time Sheet</h3>
        <div class="tile p-15">

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">


            {!! Form::open(['url' => 'addTimeSheet', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addTimeSheetForm" ]) !!}
            <input type="hidden" name="Dates"  id="dates">

            <div class="form-group">
                {!! Form::label('First Name', 'First Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('staffName',old('staffName'),['class' => 'form-control input-sm','id' => 'staffName']) !!}
                    @if ($errors->has('staffName')) <p class="help-block red">*{{ $errors->first('staffName') }}</p> @endif
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Job Number','Job Number' , array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <select  name="jobNumber"   class="form-control">
                        <option selected disabled>Select Department</option>
                        @foreach($dprtments as $type)
                            <option  value="{{$type->id}}" @if(old('jobNumber') == $type->id) {{ 'selected' }} @endif>{{$type->name}}</option>
                        @endforeach
                    </select>
                    {{--{!! Form::text('jobNumber',NULL,['class' => 'form-control input-sm','id'=>'jobNumber']) !!}--}}

                    @if ($errors->has('jobNumber')) <p class="help-block red">* {{ $errors->first('jobNumber') }}</p> @endif
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Leave', 'Leave', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {{--{!! Form::text('leave',old('leave'),['class' => 'leave form-control input-sm','id' => 'leave' , 'required']) !!}--}}
                    {!! Form::select('leave',[''=>'Select','Yes' => 'Yes','No' => 'No'],0,['class' => 'form-control' ,'id' => 'leave','autocomplete'=>'off']) !!}
                     @if ($errors->has('leave')) <p class="help-block red">* {{ $errors->first('leave') }}</p> @endif

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Surface Ordinary Time', 'Surface Ordinary Time', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('surfaceOfOrdinary',old('surfaceOfOrdinary'),['class' => 'route form-control input-sm','id' => 'surfaceOfOrdinary' ,'autocomplete'=>'off']) !!}
                    @if ($errors->has('surfaceOfOrdinary')) <p class="help-block red">* {{ $errors->first('surfaceOfOrdinary') }}</p> @endif

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Normal Overtime', 'Normal Overtime', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('normalOvertime',old('normalOvertime'),['class' => 'locality form-control input-sm','id' => 'normalOvertime','autocomplete'=>'off']) !!}
                     @if ($errors->has('normalOvertime')) <p class="help-block red">* {{ $errors->first('normalOvertime') }}</p> @endif


                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Double Overtime', 'Double Overtime', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('doubleOverTime',old('doubleOverTime'),['class' => 'administrative_area_level_1 form-control input-sm','id' => 'doubleOverTime','autocomplete'=>'off']) !!}
                      @if ($errors->has('doubleOverTime')) <p class="help-block red">* {{ $errors->first('doubleOverTime') }}</p> @endif


                </div>
            </div>
<!-- 
            <div class="form-group">
                {!! Form::label('Postal Code', 'Postal Code', array('class' => 'col-md-3 control-label' , 'required' )) !!}
                <div class="col-md-6">
                    {!! Form::text('postalCode',old(''),['class' => 'postal_code form-control input-sm','id' => 'postalCode' , 'required']) !!}

                </div>
            </div> -->

            <div class="form-group">
                {!! Form::label('Standby', 'Standby', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('standBy',old('Standby'),['class' => 'Standby form-control input-sm','id' => 'standBy','autocomplete'=>'off']) !!}
                      @if ($errors->has('standBy')) <p class="help-block red">* {{ $errors->first('standBy') }}</p> @endif

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Night Allowance', 'Night Allowance', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('nightAllowance',old('nightAllowance'),['class' => 'nightAllowance form-control input-sm','id' => 'nightAllowance','autocomplete'=>'off']) !!}
                     @if ($errors->has('nightAllowance')) <p class="help-block red">* {{ $errors->first('nightAllowance') }}</p> @endif


                </div>
            </div>

            <div class="form-group">
                {!! Form::label('1/2 Shift', '1/2 Shift', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('halfShift',old('halfShift'),['class' => 'halfShift form-control input-sm','id' => 'halfShift','autocomplete'=>'off']) !!}
                     @if ($errors->has('halfShift')) <p class="help-block red">* {{ $errors->first('halfShift') }}</p> @endif


                </div>
            </div>



             <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" id='submitMemberForm' class="btn btn-info btn-sm m-t-10">Create Time Sheet</button>
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
        function currentDate()
        {
             var today = new Date();
             return today;
        }
        document.getElementById("dates").innerHTML = currentDate();
    </script>
@endsection
