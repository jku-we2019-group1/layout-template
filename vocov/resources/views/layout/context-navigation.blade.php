<nav class="context-nav">
    <ul>
        @if(isset($links))
            @foreach($links as $l)
                <li @if(isset($l['active']))class="active"@endif><a href="{{$l['href']}}">{{$l['name']}}</a>
                    @if(isset($l['sublinks']))
                        <ul class="submenu">
                            @foreach($l['sublinks'] as $s)
                                <li @if(isset($s['active']))class="active"@endif><a
                                        href="{{$s['href']}}">{{$s['name']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</nav>
