@extends('layout.site')

@section('content')
    <h1 class="company">Companies & Organisations <a class="filter" href="{{url()->current()}}">Filter &or;</a></h1>
    <form class="search_frm" action="/company/search" method="post">
        <label for="filter">First Name:</label>
        <input id="filter" type="text"><input type="submit" value="Search">
    </form>
    @if(count($companies)==0)
        <p class="info">No companies could be found.</p>
    @else
        <ul class="full">
            @foreach($companies as $c)
                <li><a href="/company/{{$c['id']}}" class="button"><span class="icon"></span>{{$c['name']}}</a></li>
            @endforeach
        </ul>
    @endif
@endsection
