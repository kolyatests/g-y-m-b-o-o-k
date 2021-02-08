<p>
    Almost done {{$user->name}}! To complete the registration, we just need to confirm your email address:<br>
    <a href="mailto:{{$user->email}}">{{$user->email}}</a>.
</p>
<p>
    <a href="{{URL::temporarySignedRoute('verifyEmail', now()->addHour(), ['email' => $user->email, 'user' => $user->id])}}">
        Verify email address</a>.
</p>

Once verified, you can start using all functions.<br>
Does not work? Paste the following link into your browser:
<a href="{{URL::temporarySignedRoute('verifyEmail', now()->addHour(), ['email' => $user->email, 'user' => $user->id])}}">
    {{URL::temporarySignedRoute('verifyEmail', now()->addHour(), ['email' => $user->email, 'user' => $user->id])}}</a><br>
You received this email because you recently created a new account. If it's not you, ignore this letter.


