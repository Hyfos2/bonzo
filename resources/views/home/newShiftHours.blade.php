<!-- <link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css"> -->
<link href="{{asset('css/jquery.timepicker.css')}}" rel="stylesheet"/>
<link href="{{asset('css/jquery.timepicker.min.css')}}" rel="stylesheet"/>
<style>
[class*="timepicker-"] {
     font-size: 12px; 
}
</style>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!-- <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script> -->
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>


    <script>
        var $a = jQuery.noConflict();
        $a(document).ready(function(){
            $a('#startTime').timepicker({
                template: 'modal',
                 timeFormat: 'H:i',
                 interval: 30,
                minTime: '00:00:00',
                 maxTime:'23:00:00'
            });

        });

        var $b = jQuery.noConflict();
        $b(document).ready(function(){
            $b('#endTime').timepicker({
                template: 'modal',
                timeFormat: 'H:i',
                interval: 30,
                  minTime: '00:00:00',
                maxTime:'23:00:00'
            });
        });

    </script>

<div class="modal fade modalAddShiftHours" id="modalAddShiftHours" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='depTitle'>New Shift Hours</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => 'addShift', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addPositionForm" ]) !!}

                 <div class="form-group">
                    {!! Form::label('Shift Name', 'Shift Name', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                       {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name' ,'autocomplete' =>'off']) !!}
                    
                        @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Start Time', 'Start Time', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                    
                        <p><input type = "text"   value="{{ old('timeIn') }}"   name="timeIn" placeholder ="Choose start time" id = "startTime" class="form-control input-sm"></p>
                        @if ($errors->has('acronym')) <p class="help-block red">*{{ $errors->first('acronym') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('End Time', 'End Time', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-10">
                        <p><input type = "text"   value="{{ old('timeOut') }}"   name="timeOut" placeholder ="Choose end time" id = "endTime" class="form-control input-sm"></p>
                        @if ($errors->has('acronym')) <p class="help-block red">*{{ $errors->first('acronym') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" id='submitUpdateDepartmentForm' type="button" class="btn btn-sm">Add Shift</button>
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