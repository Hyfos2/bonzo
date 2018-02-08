{!! Form::open(['url' => 'tasks/updateTask', 'method' => 'post', 'class' => 'form-horizontal' ]) !!}

{!! Form::hidden('recordId',$getDetails->id) !!}

<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->name}}" disabled>

    </div>
</div>

<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Surname</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->surname}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputStatus"   style="text-align: left;" class="col-md-2  control-label">Date of Birth</label>
    <div class="col-md-10">

        <input class="form-control input-sm"  style="text-align: left;"type="text"  name="title" value="{{$getDetails->dob}}" disabled>
    </div>
</div>
<div class="form-group">
    <label for="inputTitle"   style="text-align: left;" class="col-md-2 control-label">Employee Number</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->employeeNumber}}" disabled>

    </div>
</div>
<hr class="whiter m-t-10" /><br>
<div class="form-group">
    <label for="inputTitle"   style="text-align: left;" class="col-md-2 control-label">Gender</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->gender}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Employment Date</label>
    <div class="col-md-10">
        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->dateOfEmployment}}" disabled>
    </div>
</div>
<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Annual Leave Days</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->annualLeaveDays}}" disabled>

    </div>
</div>

<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Leave Status</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->onLeave}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Employee Type</label>
    <div class="col-md-10">

        {{--<input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->employment_type->name}}">--}}

    </div>
</div>

<hr class="whiter m-t-10" /><br>
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Employee Type</label>
    <div class="col-md-10">

        {{--<input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->employment_type->name}}">--}}

    </div>
</div>
<div class="form-group">
    <label for="inputTitle" style="text-align: left;"  class="col-md-2 control-label">Department</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->department->name}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Sub Category</label>
    <div class="col-md-10">

        {{--<input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->employment_type->name}}">--}}

    </div>
</div>

<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Position</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->position->name}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Grade</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->grade->name}}" disabled>

    </div>
</div>

<hr class="whiter m-t-10" /><br>

<div class="form-group">
    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Salary</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->salary}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Loyalty</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$getDetails->loyalty}}" disabled>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-info btn-sm m-t-10">SAVE CHANGES</button>
    </div>
</div>
{!! Form::close() !!}

<script>
    $("#note").on("blur",function(ev) {
        console.log("Blurry: ev - ",ev);
        console.log("  val - ",$(ev.currentTarget).val());
        if ($.trim($(ev.currentTarget).val()) == "") $("button[type=submit]").attr("disabled", "disabled");
        else $("button[type=submit]").removeAttr("disabled");
    });
</script>