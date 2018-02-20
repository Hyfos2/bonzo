<div class="listview narrow">


        <div class="media p-l-5">
            <div class="pull-left">

            </div>
            <div class="media-body">

                <table class="table" >
                    <thead width="100%">
                    <tr width="100%">
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>DAYS TAKEN</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($staffLeaveRecords as $staffLeaveRecord)
                    <tr>


                        <td>{{$staffLeaveRecord->startDate}}</td>
                        <td>{{$staffLeaveRecord->endDate }}</td>
                        <td>{{$staffLeaveRecord->daysTaken}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>


</div>