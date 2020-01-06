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
<main>
    <div class="content">
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
</main>
@include('layout.footer')
</body>
</html>
