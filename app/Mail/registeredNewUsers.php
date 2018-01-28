<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class registeredNewUsers extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->markdown('mails.registeredUsers')
                    ->with([
                        'name'=>$this->user->name,
                        'surname'=>$this->user->surname,
                        'email'=>$this->user->email,
                        'password'=>$this->user->userName
                        ]);
    }
}
