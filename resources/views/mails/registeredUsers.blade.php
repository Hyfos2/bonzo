@component('mail::message')
# Registration Notification

Hi <strong>{{$name}} {{$surname}} </strong> your account has ben successfully created with How Mine  Employee Management System.Below are your credentials;<br>
            -email :{{$email}}<br>
            -password:{{$password}}<br>

@component('mail::button', ['url' => ''])
log in
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
