<h1>{{ $subject }}}</h1>
<p>Takk for at du registrerte deg.</p>
<p><strong>Vi trenger deg til å bekrefte din e-postadresse.</strong></p>
<p>Klikk på linken for å bekrefte e-postadressen din {{ route('user.verify', $email_token) }}</p>
