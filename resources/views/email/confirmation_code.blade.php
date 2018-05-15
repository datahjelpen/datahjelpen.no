<h1>Hei {{ $user->name }}.</h1>
<p>Handlingen du forsøker å gjøre krever av sikkerhetsgrunner en bekreftelse på at det er du som utfører denne.</p>
<p><strong>bekreftelseskode</strong> <code>{{ $user->confirmation_code }}</code></p>
