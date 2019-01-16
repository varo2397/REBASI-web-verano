@extends('layouts.complainant')

@section('content')
    <a class="btn btn-primary" href="{{ URL::to('reports/create') }}">Agregar denuncia</a>

    <div class="col-md-12">
        <div class="row">
            @foreach($reports as $report)
                <div class="col-md-4">
                    <a href="reports/{{$report->id}}/edit">
                        <div class="card">
                            <img src="{{asset($report->route)}}" alt="">
                            <div class="card-body">
                                <h3>
                                    {{ $report->description }}
                                </h3>
                                <h4>
                                    {{ $report->name }}
                                </h4>
                                @if($report->tracing)
                                <h4>
                                    Seguimiento: {{ $report->tracing }}
                                </h4>
                                @endif
                                {{--<a href="{{  }}"></a>--}}
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
        </div>
    </div>
@endsection