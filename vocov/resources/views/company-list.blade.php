@extends('layout.site')

@section('content')
    <h1 class="company">Companies & Organisations <p class="filter">Filter <span>&or;</span></p></h1>
    <form class="search_frm" action="/company/search" method="post">
        <label for="filter">First Name:</label>
        <input id="filter" type="text"><input type="submit" value="Search">
    </form>
    @if(count($companies)==0)
        <p class="info">No companies could be found.</p>
    @else
        <ul class="full">
            @foreach($companies as $c)
                <li><a href="/company/{{$c['id']}}" class="button"><img src="/img/companies/company_{{$c['id']}}.png"
                                                                        alt="Logo"
                                                                        class="icon">{{$c['name']}}</a></li>
            @endforeach
        </ul>
    @endif
@endsection
