@component('mail::message')
# Welcome to UltraVet
We are so happy that you are here! welcome to UltraVet website, Please click the button below to activate your account!
@component('mail::button', ['url' => route('user.activate' , $EmailData)])
Activate Account
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent