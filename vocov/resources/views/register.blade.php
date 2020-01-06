@extends('layout.site')

@section('content')
    <h1>Register</h1>
    <aside>
        <img src="/api/user/ID/profilepicture" alt="Profile picture">
        <button type="submit">Upload Profile Picture"</button>
    </aside>
    <form class="data_frm" action="/register/volunteer" method="post">
        <label for="name">First Name:</label>
        <input id="name" type="text">
        <label for="surname">Last Name:</label>
        <input id="surname" type="text">
        <label for="birthdate">Date of Birth:</label>
        <input id="birthdate" type="date">
        <label for="address">Address:</label>
        <input id="address" type="text">
        <label for="phone">Phone:</label>
        <input id="phone" type="tel">
        <label for="email">E-Mail Address:</label>
        <input id="email" type="email">
        <label for="cv">CV:</label>
        <input id="cv" type="file">
        <input type="submit" value="Login">
    </form>
@endsection
