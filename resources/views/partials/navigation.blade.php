<nav>
	<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>

	@auth
		<li>
			<a href="{{ route('user') }}">{{ Auth::user()->name }}</a>
			<ul>
				<li><a href="{{ route('user') }}">Konto</a></li>
				<li><a href="{{ route('dashboard') }}">Kontrollpanel</a></li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li>
	@else
		<li><a href="{{ route('login') }}">Login</a></li>
		<li><a href="{{ route('register') }}">Register</a></li>
	@endauth
</nav>
<nav>
	{{ Breadcrumbs::render() }}
</nav>
