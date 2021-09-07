@component('mail::message')
# Introduction
Dear {{ $first_name }},

In order to verify your account please click the following

<form action="{{ 'localhost:8000/verify/'.$email.'/'.$ticket}}" method="POST" >
    @csrf

<button class="bg-green-500 text-white" >
   {{__('VERIFY')}}
<button>

</form>

or past this link in your browser

{{ 'localhost:8000/verify'.$email.'/'.$ticket}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
