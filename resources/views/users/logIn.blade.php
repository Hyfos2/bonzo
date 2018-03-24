<div class="listview narrow">


    <div class="media p-l-5">
        <div class="pull-left">

        </div>
        <div class="media-body">

            <table class="table">
                <thead>
                <tr>
                    <th>LOGIN DATE </th>
                    <th>LOGOUT DATE</th>
                    <th>TIME TAKEN</th>
                </tr>
                </thead>

                <tbody>
                @foreach($userDetails as $userDetail)
                    <tr>


                        {{--<td>{{$userDetail->startDate}}</td>--}}
                        {{--<td>{{$userDetail->endDate }}</td>--}}
                        {{--<td>{{ $userDetail->daysTaken}} </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>


</div>