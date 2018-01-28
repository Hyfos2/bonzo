@extends('master')

@section('content')
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Home</a></li>       
        <li><a href="{{ url('workingHours') }}">Staff on Shift</a></li>
        <li class="active">Shift Allocation Form</li>
    </ol>

    <h4 class="page-title">FOrm</h4>

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

@section('footer')


    <script>
        $(document).ready(function(){
            $('#startTime').timepicker({
                template: 'modal'
            });

        });

        $('#timepicker1').timepicker({
            template: 'modal'

        });
        $(document).ready(function(){
            $('#endTime').timepicker({
                template: 'modal'
            });
        });

        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '11',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
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
