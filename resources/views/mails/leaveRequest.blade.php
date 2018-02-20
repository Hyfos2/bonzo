
@component('mail::message')
  
 Hi <strong> {{ucfirst($name)}} {{ucfirst($surname)}} </strong>.<br><strong> {{ucfirst($staffName)}} {{ucfirst($staffSurname)}}</strong> from your department has requested a leave from {{$fromDate}} to {{$endDate}}.Click the below button to view more about this.

    Click this button <button type="button" href=" http://localhost:8000"></button>, to log in
    <!-- @component('mail::button', ['url' =>'http://localhost:8000'])
        log in
    @endcomponent
 -->
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
