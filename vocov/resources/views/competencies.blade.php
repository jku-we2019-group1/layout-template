@extends('layout.site')

@section('styles-head')
    @parent
    <style>
        #chart {
            margin: 0 auto;
            max-width: 800px;
        }

        svg {
            width: 100%;
        }

        circle {
            stroke: #A0A0A0
        }
    </style>
@endsection

@section('scripts-head')
    @parent
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="/js/histogram.js"></script>
@endsection

@section('content')
    <h1>{{ $user['name'] }}: Competencies</h1>
    <h2>Former/Active voluntary services</h2>
    <ul>
        <li>Driver of emergency vehicle (Red Cross)</li>
        <li>Fostering animals (Tierheim Linz)</li>
    </ul>
    <h2>Resulting Competencies</h2>
    <div id="chart"></div>
    @if(isset($data))
        <h2>Detailed Data</h2>
        <dl class="comptencies">

            @foreach($data['CompetenceDomain'] as $cd)
                <dt>{{ $cd['CompetenceDomainName'] }}:</dt>
                <dd>
                    <ul>
                        @foreach($cd['COmpetences'] as $c)
                            <li>{{ $c['CompetenceName']  }}: {{ $c['Degree']  }}</li>
                        @endforeach
                    </ul>
                </dd>
            @endforeach
        </dl>
    @endif
    <script>
        let file = {!! $json ?? '((--no json data--))' !!};
        init(file, 'chart');
    </script>
@endsection
