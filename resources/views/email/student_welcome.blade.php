@component('mail::message')
# Welcome To Find A Tutor

Thank You <strong>{{$data['first_name']}}</strong>, For The Registration As Student/Parent<br> <br>
<strong>Your Email is : {{$data['email']}}</strong> <br>
<strong>Your Password is : {{$data['password']}}</strong> <br>

@component('mail::button', ['url' => route('student.login')])
Sign In
@endcomponent

Regards,<br>
Find A Tutor Team
@endcomponent
