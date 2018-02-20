<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Staff;
use App\LeaveDay;

class LeaveRequest extends Mailable
{
    use Queueable, SerializesModels;


    protected $user;
    protected $getDetails;

    public function __construct(User $user, Staff $getDetails , LeaveDay $leaveDays)
    {
        $this->user = $user;
        $this->getDetails = $getDetails;

        $this->leaveDays  = $leaveDays;
    }

    public function build()
    {
        return $this->markdown('mails.leaveDaysRequest')
            ->with([
                'name'=>$this->user->name,
                'surname'=>$this->user->surname,
                'staffName'=>$this->getDetails->name,
                'staffSurname'=>$this->getDetails->surname,
                'fromDate'  =>$this->leaveDays->startDate,
                'endDate'=>$this->leaveDays->endDate
            ]);
    }
}



