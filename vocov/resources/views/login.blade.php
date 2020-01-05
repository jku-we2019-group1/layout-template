@extends('layout.site')

@section('content')
    <h1>Login</h1>
    <form class="data_frm" action="/" method="post">
        <label for="email">E-Mail Address:</label>
        <input id="email" type="email">
        <label for="password">Password:</label><a href="/">Forgot your password?</a>
        <input id="password" type="password">
        <input type="submit" value="Login">
    </form>
@endsection
