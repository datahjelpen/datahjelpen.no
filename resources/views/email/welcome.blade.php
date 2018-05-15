<h1>Welcome</h1>
<p>Thank you for signing up for {{ config('app.name') }}.</p>
<p><strong>We need you to verify your email</strong></p>
<p>Click the link to verify your email {{ route('user.verify', $email_token) }}</p>
