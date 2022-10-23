@component('mail::message')
# Reset Your Password
You've requested a reset password for your UltraVet account, Please click the link below to reset your passowrd. <br>
If you didn't send this request, please ignore this email and your account will remain secure.

@component('mail::button', ['url' => route('user.getSetPassword' , [$EmailData->id, md5($EmailData->id)])])
Reset My Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent