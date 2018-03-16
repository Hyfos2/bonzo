@extends('master')
@section('content')
@include('timeSheets.update')
    @if (\Auth::user())
        <ol class="breadcrumb hidden-xs">
            <li><a href="{{url('welcome')}}">Home</a></li>
            @if(\Auth::user()->positionId== 1 ||  \Auth::user()->positionId==2)
                
                <li><a href="{{ url('timeSheets') }}">Time Sheet List</a></li>
                <li class="active">Time Sheet File</li>
        </ol>
        @endif
@endif
    <h4 class="page-title">RECORD ID :{{ $timeSheetFileRecord->id }}</h4>
    <br>
        
    <div class="block-area container">
        <div class="row">
            <div class="col-md-9">
                 <a style="margin-left:30px;" class="btn btn-sm" data-toggle="modal" data-target=".modalUpdate">Update
        </a>



                <div class="block-area" id="tabs">
                    <div class="tab-container">

                        <div class="tab-content">
                            <div class="tab-pane active" id="taskprofile">
                                <div class="block-area" id="horizontal">
                                    <h3  style="margin-left:-10px;" class="block-title">TIME SHEET DETAILS</h3>
                                    {!! Form::open(['url' => 'timeSheets', 'method' => 'get', 'class' => 'form-horizontal' ]) !!}

<!-- {{csrf_field()}} -->

<div class="form-group">

    <label for="inputTitle" style="text-align: left;" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$timeSheetFileRecord->staff->name}}" disabled>

    </div>
</div>

<div class="form-group">
    <label for="inputTitle"  style="text-align: left;" class="col-md-2 control-label">Surname</label>
    <div class="col-md-10">

        <input class="form-control input-sm" type="text"  name="title" value="{{$timeSheetFileRecord->staff->surname}}" disabled>

    </div>
</div>
<div class="form-group">
    <label for="inputStatus"   style="text-align: left;" class="col-md-2  control-label">Department</label>
    <div class="col-md-10">

        <input class="form-control input-sm"  style="text-align: left;"type="text"  name="title" value="{{$timeSheetFileRecord->staff->department->name}}" disabled>
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-info btn-sm m-t-10">Go Back</button>
    </div>
</div>
{!! Form::close() !!}

                                  


                                </div>

                                <hr class="whiter m-t-20" />

                            </div>


                        </div>
                    </div>


                </div>


                <div class="m-b-15 text-center profile-summary">



                </div>
            </div>

    
            <div class="col-md-3" style="margin-top:50px;">

                 <h3  style="margin-left:1px;" class="block-title">TIME SHEET FILE</h3>


                <div class="tile">
                   

                    <div class="listview narrow">


                    <div class="media p-l-5">
                        <div class="pull-left">

                        </div>
                        <div class="media-body">
                    <table class="table" >
                    <thead width="100%">
                    <tr width="100%">
                        <th>DOWNLOAD</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>{{$timeSheetFileRecord->fileName}} <a href="" download="{{$timeSheetFileRecord->fileName}}"><span class="glyphicon glyphicon-download-alt" onclick="getFileExt();"></span></a></td>
                    </tr>
                    </tbody>
                </table>


                           

                        </div>
                    </div>


                        </div>
               
                
                </div>

            </div>

        </div>

    </div>

@endsection
@section('footer')
<script>
    function getFileExt()
    {
         console.log('am here');

    }
   
</script>
@endsection


