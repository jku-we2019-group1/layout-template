<header>
    <nav class="main-nav">
        <h1>VoCoV - Volunteer Competenc Visualization</h1>
        <a class="site-logo" href="/" title="Home"><img src="/img/logo-vocov.png" alt="Projektlogo: VoCoV"></a>
        <ul>
            <li><a class="link home" href="/">Home</a></li>

            @if(Session::has('fakeUser'))
                <li><a class="link profile" href="/profile/{{ $user['id'] ?? '1' }}">Profile</a></li>
                <li><a class="link logout" href="/logout">Logout</a></li>
            @else
                <li><a class="link login" href="/login">Login</a></li>
            @endif
        </ul>
    </nav>
    <div class="site-bar">
        @include('layout.context-navigation')
    </div>
</header>
