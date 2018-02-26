<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\LeaveDay;
use App\User;

class rejectRequest extends Mailable
{
    use Queueable, SerializesModels;
    protected $requester;
    protected $HodDetails;
    public function __construct(LeaveDay $requester ,User $HodDetails)
    {
        $this->requester =$requester;
        $this->HodDetails =$HodDetails;
    }

    public function build()
    {
        return $this->markdown('mails.rejectRequest')
            ->with([
                'name'=>$this->requester->user->name,
                'surname'=>$this->requester->user->surname,
                'hodName'=>$this->HodDetails->name,
                'staffName'=>$this->requester->staff->name,
                'staffSurname'=>$this->requester->staff->surname,
                'startDate'=>$this->requester->startDate,
                'endDate'=>$this->requester->endDate,
                'department'=>$this->HodDetails->department->name,
                'hodSurname'=>$this->HodDetails->surname,
                'reason'=>$this->requester->rejectionReason
                ]);

    }
}
