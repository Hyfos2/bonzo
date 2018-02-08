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

            <div class="form-group">
                {!! Form::label('First Name', 'First Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('timeSheetName',NULL,['class' => 'form-control input-sm','id' => 'timeSheetName']) !!}
                    @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Job Number','Job Number' , array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <select  name="jobNumber"   class="form-control">
                        <option selected disabled>Select Department</option>
                        @foreach($dprtments as $type)
                            <option  value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                    {{--{!! Form::text('jobNumber',NULL,['class' => 'form-control input-sm','id'=>'jobNumber']) !!}--}}

                    @if ($errors->has('jobNumber')) <p class="help-block red">* {{ $errors->first('jobNumber') }}</p> @endif
                </div>
            </div>

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">



            <div class="form-group">
                {!! Form::label('Leave', 'Leave', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('leave',NULL,['class' => 'leave form-control input-sm','id' => 'leave' , 'required']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Surface Ordinary Time', 'Surface Ordinary Time', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('surfaceOfOrdinary',NULL,['class' => 'route form-control input-sm','id' => 'surfaceOfOrdinary' , 'required']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Normal Overtime', 'Normal Overtime', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('normalOvertime',NULL,['class' => 'locality form-control input-sm','id' => 'normalOvertime' , 'required']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Double Overtime', 'Double Overtime', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('doubleOverTime',NULL,['class' => 'administrative_area_level_1 form-control input-sm','id' => 'doubleOverTime', 'required']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Postal Code', 'Postal Code', array('class' => 'col-md-3 control-label' , 'required' )) !!}
                <div class="col-md-6">
                    {!! Form::text('postal_code',NULL,['class' => 'postal_code form-control input-sm','id' => 'postal_code' , 'required']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Standby', 'Standby', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('Standby',NULL,['class' => 'Standby form-control input-sm','id' => 'Standby' , 'required']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Night Allowance', 'Night Allowance', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('nightAllowance',NULL,['class' => 'nightAllowance form-control input-sm','id' => 'nightAllowance' , 'required']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('1/2 Shift', '1/2 Shift', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('halfShift',NULL,['class' => 'halfShift form-control input-sm','id' => 'halfShift' , 'required']) !!}

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
