{!! Form::open(['url' => 'leave', 'method' => 'get', 'class' => 'form-horizontal' ]) !!}


<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{ucfirst($leaveRequestProfile->staff->name)}}" disabled>

    </div>
</div>

<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Surname</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{ucfirst($leaveRequestProfile->staff->surname)}}" disabled>

    </div>
</div>

<hr class="whiter m-t-10" /><br>
<div class="form-group">
    <label for="inputTitle"   style="text-align: left;" class="col-md-2 control-label">Leave Start Date</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$leaveRequestProfile->startDate}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Leave End  Date</label>
    <div class="col-md-10">
        <input class="form-control input-sm" type="text"  name="title" value="{{$leaveRequestProfile->endDate}}" disabled>
    </div>
</div>
<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Requested Leave Days</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$leaveRequestProfile->daysTaken}} days" disabled>

    </div>
</div>

<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Leave Status</label>
    <div class="col-md-10">
      
            <input class="form-control input-sm" type="text"  name="title" value="{{$leaveRequestProfile->status->status}}" disabled>
    </div>
</div>


<hr class="whiter m-t-10" /><br>
 <h3  style="margin-left:-10px;" class="block-title">HOD DETAILS</h3>
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">

    <input class="form-control input-sm" type="text"  name="title" value="{{ucfirst($leaveRequestProfile->user->name)}}" disabled>

    </div>
</div>

<div class="form-group">
    <label for="inputTitle" style="text-align: left;"  class="col-md-2 control-label">Surname</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{ucfirst($leaveRequestProfile->user->surname)}}" disabled>

    </div>
</div>

<div class="form-group">
    <label for="inputTitle" style="text-align: left;"  class="col-md-2 control-label">Department</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{ucfirst($leaveRequestProfile->user->department->name)}}" disabled>

    </div>
</div>
@if($leaveRequestProfile->status->status =="New")
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Seen </label>
    <div class="col-md-10">
    <input class="form-control input-sm" type="text"  name="title" value="Not Seen" disabled>

    </div>
</div>
@else
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Seen </label>
    <div class="col-md-10">
    <input class="form-control input-sm" type="text"  name="title" value="{{$leaveRequestProfile->updated_at->diffForHumans()}}" disabled>

    </div>
</div>
@endif


<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-info btn-sm m-t-10">Go Back</button>
    </div>
</div>
{!! Form::close() !!}