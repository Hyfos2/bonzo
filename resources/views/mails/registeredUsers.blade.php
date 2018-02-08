@component('mail::message')
# Registration Notification

Hi <strong> {{ucfirst($name)}} {{ucfirst($surname)}} </strong> your account has been successfully created with How Mine  Employee Management System.Below are your credentials;<br>
            - email :   {{$email}}<br>
            - password: <strong> {{$password}}</strong><br>

Click on the button below, to log in
@component('mail::button', ['url' => env('APP_URL')])
log in
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
