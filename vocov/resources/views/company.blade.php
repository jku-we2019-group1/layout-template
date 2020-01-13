@extends('layout.site')

@section('content')
    <div class="splitted">
        <aside>
            <img src="/img/company/comp_{{$company['id']}}.png" alt="Company logo">
        </aside>
        <article>
            <h1 class="company">{{ $company['name'] }}
                <button href="/company/{{$company['id']}}/apply">Apply</button>
            </h1>

            <h2>Who are we?</h2>
            <p>{{$company['description']}}</p>
            <h2>What do we offer?</h2>
            <p>Find our <a href="/company/{{$company['id']}}/offers"></a>latest offers</p>
            <h2>Contact information</h2>
            <dl>
                <dt>Adress</dt>
                <dd></dd>
                <dt>Phone</dt>
                <dd><a href="tel:{{$company['phone']}}">{{$company['phone']}}</a></dd>
                <dt>Email</dt>
                <dd><a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a></dd>
            </dl>
        </article>
    </div>
@endsection
