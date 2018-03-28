<div class="modal fade modalError" id="modalError" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='depTitle'>Authentication Failed</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => '', 'method' => 'put', 'class' => 'form-horizontal' ]) !!}

                {!! Form::hidden('deptID',NULL,['id' => 'deptID']) !!}
               <p style="text-align:center ;"> Sorry you are not Authorized to perform this action..</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>