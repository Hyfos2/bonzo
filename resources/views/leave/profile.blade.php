@extends('master')
@section('content')
@include('hod.rejectReasons')
    @if (\Auth::user())
        <ol class="breadcrumb hidden-xs">
            <li><a href="{{url('welcome')}}">Home</a></li>
            @if(\Auth::user()->positionId== 1 ||  \Auth::user()->positionId==2)
                
                <li><a href="{{ url('requestListing') }}">Requests List</a></li>
                <li class="active">Request Details</li>
            @elseif(\Auth::user()->positionId==3)
                <li class="active">Request Details</li>
            @endif
        </ol>
        @endif


        <h4 class="page-title">RECORD ID :{{ $leaveRequestProfile->id }}</h4>

    <br>

    <div class="block-area container">
        <div class="row">
            <div class="col-md-9">

                <div class="block-area" id="tabs">
                    <div class="tab-container">

                        <div class="tab-content">
                            <div class="tab-pane active" id="taskprofile">
                                <div id="hodAction">
                                     
                                  
                                   <input type="hidden" id="recordId" value="{{$leaveRequestProfile->id}}">
                                  
                                    <button id="accept" v-on:click="acceptRequest" class="btn btn-primary" style="margin-left:5px; ">Accept</button>


                                      <button id="reject" class="btn btn-primary"  data-toggle="modal" data-target=".modalRejectReason" style="margin-left:5px;">Reject</button>
          
                                                                       
                                      
                                </div>
                                <div class="block-area" id="horizontal">

                                    <h3  style="margin-left:-10px;" class="block-title">LEAVE REQUEST DETAILS</h3>

                                    @include('leave.profileBody')


                                </div>

                                <hr class="whiter m-t-20" />

                            </div>


                        </div>
                    </div>


                </div>


                <div class="m-b-15 text-center profile-summary">



                </div>
            </div>


            <div class="col-md-3" style="margin-top:75px;">

                 <h3  style="margin-left:1px;" class="block-title">LEAVE  DETAILS</h3>


                <div class="tile">
                   

                    @include('hod.leaveRequestRecords')
                </div>

            </div>


                  <div class="col-md-3" style="margin-top:7px;">

                 <h3  style="margin-left:1px;" class="block-title">ANNUAL LEAVE DAYS</h3>


                <div class="tile">


                    <div class="listview narrow">


        <div class="media p-l-5">
            <div class="pull-left">

            </div>
            <div class="media-body">

                <table class="table" >
                    <thead>
                    <tr>
                        <th>Remaining Days</th>
                    </tr>
                    </thead>

                    <tbody>
                   
                    <tr>


                        <td>{{$leaveRequestProfile->staff->annualLeaveDays}} days</td>
                    
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
    <div id="snackbar">Accepting the Request..</div>
    <div id="successBar">Successfully accepted.An email was send to the requester.</div>
    <div id="error">Leave request was accepted already.</div>

    


@endsection


