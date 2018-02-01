@component('mail::message')
# Registration Notification

Hi <strong> {{ucfirst($name)}} {{ucfirst($surname)}} </strong> your account has been successfully created with How Mine  Employee Management System.Below are your credentials;<br>
            - email :   {{$email}}<br>
            - password: <strong> {{$password}}</strong><br>

@component('mail::button', ['url' => ''])
log in
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
