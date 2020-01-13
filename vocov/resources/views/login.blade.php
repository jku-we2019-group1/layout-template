@extends('layout.site')

@section('content')
    <h1>Login</h1>
    <form class="data_frm" action="/login" method="post">
        <label for="email">E-Mail Address:</label>
        <input id="email" name="email" type="email">
        <label for="password">Password:</label><a href="/">Forgot your password?</a>
        <input id="password" name="password" type="password">
        <input type="submit" value="Login">
    </form>
@endsection
