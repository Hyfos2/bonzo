
{!! Form::open(['url' => 'usersList', 'method' => 'get', 'class' => 'form-horizontal' ]) !!}


<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value=" {{$userDetails->name}}" disabled>

    </div>
</div>

<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Surname</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value=" {{$userDetails->surname}}" disabled>

    </div>
</div>
<hr class="whiter m-t-10" /><br>
<div class="form-group">
    <label for="inputStatus"   style="text-align: left;" class="col-md-2  control-label">Department</label>
    <div class="col-md-10">

        <input class="form-control input-sm"  style="text-align: left;"type="text"  name="title" value=" {{$userDetails->department->name}}" disabled>
    </div>
</div>
<div class="form-group">
    <label for="inputTitle"   style="text-align: left;" class="col-md-2 control-label">Sub department</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value=" {{$userDetails->category->name}}" disabled>

    </div>
</div>

<div class="form-group">
    <label for="inputTitle"   style="text-align: left;" class="col-md-2 control-label">Position</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value=" {{$userDetails->position->name}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Grade</label>
    <div class="col-md-10">
        <input class="form-control input-sm" type="text"  name="title" value=" {{$userDetails->grade->grade}}" disabled>
    </div>
</div>

<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Role</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value=" {{$userDetails->role->name}}" disabled>

    </div>
</div>
<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Registered </label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value=" {{$userDetails->created_at->diffForHumans()}}" disabled>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-info btn-sm m-t-10">Go Back</button>
    </div>
</div>

{!! Form::close() !!}