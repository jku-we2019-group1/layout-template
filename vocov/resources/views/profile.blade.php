@extends('layout.site')

@section('content')
    <h1>{{ username }} <a class="edit-profile" href="/editprofile">Edit Profile</a></h1>
    <aside>
        <img src="/api/user/profilepicture" alt="Profile picture">
    </aside>
    <h2>Personal Data:</h2>
    <dl>
        <dt>Birthdate:</dt>
        <dd>{{ birthday }}</dd>
        <dt>Address:</dt>
        <dd>{{ adress }}</dd>
        <dt>Phone:</dt>
        <dd>{{ phone }}</dd>
        <dt>Email:</dt>
        <dd>{{ email }}</dd>
        <dt>CV:</dt>
        <dd><a href="/api/user/cv" title="Open CV.pdf"></a></dd>
    </dl>
    <h2>Competencies</h2>
    <-- add js //-->
@endsection
