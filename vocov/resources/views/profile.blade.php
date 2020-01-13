@extends('layout.site')

@section('styles-head')
    @parent
    <style>
        #chart {
            max-width: 800px;
        }

        svg {
            width: 100%;
        }

        circle {
            stroke: #A0A0A0;
        }

        text {
            fill: transparent;
        }
    </style>
@endsection

@section('scripts-head')
    @parent
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="/js/histogram.js"></script>
@endsection

@section('content')
    <h1>{{ $user['firstname'] }} {{ $user['lastname'] }} ({{ $user['id'] }})<a href="/" title="Edit profile">Edit Profile 🖉</a></h1>
    <div class="split">
        <aside>
            <img src="/img/profile_default.png" alt="Profile picture">
            <a href="{{ url("/profile/{$user['id']}/competencies") }}">
                <div id="chart"></div>
            </a>
        </aside>
        <dl>
            <dt>First Name:</dt>
            <dd>{{ $user['firstname'] }}</dd>
            <dt>Last Name:</dt>
            <dd>{{ $user['lastname'] }}</dd>
            <dt>Date of Birth</dt>
            <dd>{{ $user['birthdate'] }}</dd>
            <dt>Address:</dt>
            <dd>{{ $user['address'] }}</dd>
            <dt>Phone:</dt>
            <dd>{{ $user['phone'] }}</dd>
            <dt>E-Mail Address:</dt>
            <dd><a href="mailto:{{$user['email']}}">{{ $user['email'] }}</a></dd>
            <dt>CV:</dt>
            <dd>No file uploaded</dd>
        </dl>
    </div>

    <script>
        let file = {!! $json ?? '((--no json data--))' !!};
        init(file, 'chart');
    </script>
@endsection
