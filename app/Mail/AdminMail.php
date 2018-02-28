<?php

namespace App\Mail;

use App\LeaveDay;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Department; 

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $adminDetails;
    protected $department;
    protected  $leaveDays;

    public function __construct(Department $department,User $adminDetails,LeaveDay $leaveDays)
    {
        $this->department =$department;
        $this->user =$adminDetails;
        $this->leaveDays =$leaveDays;
    }
    public function build()
    {

        return $this->markdown('mails.AdminMail')->with(
            [
                'name'=>$this->user->name,
                'surname'=>$this->user->surname,
                'email'=>$this->user->email,
                'message'=>'A new leave request has been made but there are no HODs set for the  '.$this->department->name. ' ' . 'department, please set them up immediately and inform the intended user.This request has a record ID of'.' '.$this->leaveDays->id.' '.'For further action log in with the button below.'
        ]);
    }
}
