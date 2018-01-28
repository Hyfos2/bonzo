@extends('master')

@section('content')

<!-- Breadcrumb -->
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
             <form class="form-horizontal" method="POST" href="{{'addUser'}}">
                        {{ csrf_field() }}
           
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
                {!! Form::label('Email', 'Email', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('email',NULL,['class' => 'form-control input-sm','email' ,'placeholder'=> '  infor@yahoo.net']) !!}
                  @if ($errors->has('email')) <p class="help-block red">* {{ $errors->first('email') }}</p> @endif
              </div>
            </div>




            <div class="form-group">
                {!! Form::label('Position', 'Position', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('positionId',NULL,['class' => 'form-control input-sm','id' => 'positionId'  ]) !!}
                  @if ($errors->has('id_number')) <p class="help-block red">* {{ $errors->first('id_number') }}</p> @endif
                </div>
            </div>

             <div class="form-group">
                {!! Form::label('Grade', 'Grade', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('gradeId',NULL,['class' => 'form-control input-sm','id' => 'gradeId'  ]) !!}
                  @if ($errors->has('gradeId')) <p class="help-block red">* {{ $errors->first('gradeId') }}</p> @endif
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

   })

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
