@extends('master')

@section('content')


    @if(Auth::user())
    @if(Auth::user()->positionId != 1 || Auth::user()->positionId!=3)
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{url('/welcome')}}">Home</a></li>
        <li><a href="{{ url('workingHours') }}">Staff on Shift</a></li>
        <li class="active">Shift Allocation Form</li>
    </ol>
    @endif
    @endif

    <h4 class="page-title">Shift Allocation</h4>

    <div class="block-area" id="basic">
        <h3 class="block-title">Shift Allocation Form</h3>
        <div class="tile p-15">

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">
            {!! Form::open(['url' => 'allocate', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"staffRegistrationForm" ]) !!}

            <div class="form-group">
                {!! Form::label('Staff Name', 'Staff Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name']) !!}
                    @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Shift Name', 'Shift Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('shiftHoursId',NULL,['class' => 'form-control input-sm','id' => 'shiftHoursId']) !!}
                    @if ($errors->has('shiftHoursId')) <p class="help-block red">*{{ $errors->first('shiftHoursId') }}</p> @endif
                </div>
            </div>


              <div class="form-group">
                {!! Form::label('Hours', 'Hours', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                     {!! Form::text('hours',NULL,['class' => 'form-control input-sm','id' => 'hours'  ]) !!}
                    @if ($errors->has('hours')) <p class="help-block red">*{{ $errors->first('hours') }}</p> @endif
                </div>
            </div>

           
            <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" id='submitMemberForm' class="btn btn-info btn-sm m-t-10">Allocate Shift</button>
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


