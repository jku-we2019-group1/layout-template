@extends('layout.site')

@section('styles-head')
    @parent
    <style>
        #chart {
            width: 100%;
            z-index: 2;
        }

        svg * {
            fill: grey;
        }

        svg text {
            fill: yellow;
            font: 12px sans-serif;
            text-anchor: end;
        }
    </style>
@endsection

@section('scripts-head')
    @parent
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="/js/histogram.js"></script>
@endsection

@section('content')
    <h1>Profile: {{ $user['id'] }}</h1>
    <div class="split">
        <aside>
            <img src="/api/user/ID/profilepicture" alt="Profile picture">
        </aside>
        <dl>
            <dt>First Name:</dt>
            <dd></dd>
            <dt>Last Name:</dt>
            <dd></dd>
            <dt>Date of Birth</dt>
            <dd></dd>
            <dt>Address:</dt>
            <dl></dl>
            <dt>Phone:</dt>
            <dl></dl>
            <dt>E-Mail Address:</dt>
            <dl></dl>
            <dt>CV:</dt>
            <dd></dd>
        </dl>
    </div>
    <div id="chart"></div>
    <script>
        let file = {!! $json ?? 'null // no json data' !!};
        init(file, 'chart');
    </script>
@endsection
