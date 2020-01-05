<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VoCoV (Prototype v0.1)</title>

    <!-- Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Roboto:200,600" rel="stylesheet"-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
@include('layout.header')
@include('layout.context-navigation')
<main>
    <div class="wrapper">
        @section('content')
            <p>Content example</p>
            <h1>Header 1</h1>
            <h2>Header 2</h2>
            <div>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet expedita libero provident repellat sit!
        Aut eaque, facere iure obcaecati quas suscipit vel voluptas. Ad assumenda minus quod recusandae tempore, vero.</span>
                    Architecto <a href="/">consequatur expedita</a> impedit iusto, minima placeat porro. Alias aliquam
                    at aut
                    eaque esse hic
                    illo iure magnam mollitia, optio provident quibusdam, repellendus ullam! Distinctio mollitia
                    quibusdam sit
                    ut veritatis!
                </p>
                <h3>Header 3</h3>
                <p>Accusamus architecto at aut blanditiis consequuntur doloremque dolorum eligendi eum eveniet ex
                    expedita,
                    in nam neque nisi non, odio officia possimus quae quas, qui quisquam saepe sapiente similique vel
                    voluptatibus?</p>
                <h4>Header 4</h4>
                <p>Animi corporis cum cupiditate doloremque enim et fuga laborum modi mollitia necessitatibus numquam
                    officiis
                    perspiciatis possimus quae, quasi repudiandae temporibus tenetur ut vitae voluptas! Consequuntur
                    delectus
                    iste minima natus unde! <span>A aliquam amet autem consequuntur deleniti deserunt et hic impedit iusto laborum, nemo nisi nobis non omnis perferendis quia reiciendis saepe unde! Deleniti eveniet in inventore iure nemo, officia veniam.</span>
                </p></div>
            <ul>
                <li>Liste Entry 1</li>
                <li>Liste Entry 2</li>
                <li>Liste Entry 3</li>
            </ul>
            <ol>
                <li>Liste Entry 1</li>
                <li>Liste Entry 2</li>
                <li>Liste Entry 3</li>
            </ol>
        @show

    </div>
    <div class="wrapper">
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
    </div>
    <div class="wrapper">
        <h1>Max Mustermann <a class="edit-profile" href="/profile/edit">Edit Profile</a></h1>
        <aside>
            <img src="/api/user/profilepicture" alt="Profile picture">
        </aside>
        <h2>Personal Data:</h2>
        <dl>
            <dt>Birthdate:</dt>
            <dd></dd>
            <dt>Address:</dt>
            <dd></dd>
            <dt>Phone:</dt>
            <dd></dd>
            <dt>Email:</dt>
            <dd></dd>
            <dt>CV:</dt>
            <dd><a href="/api/user/cv" title="Open CV.pdf"></a></dd>
        </dl>
        <h2>Competencies</h2>
        <-- add js //-->
    </div>


</main>

<aside class="copyright">
    <div>(c) 2020, JKU Linz</div>
</aside>
<footer>
    <nav>
        <div>
            <h4>Change User:</h4>
            <ul class="sitemap">
                <li><a href="/setuser/A">User A</a></li>
                <li><a href="/setuser/B">User B</a></li>
                <li><a href="/setuser/admin">Admin</a></li>
            </ul>
        </div>
        <div>
            <h4>Sitemap:</h4>
            <ul class="sitemap">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </nav>
</footer>
</body>
</html>
