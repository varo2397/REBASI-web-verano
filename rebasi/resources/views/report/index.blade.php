@extends('layouts.complainant')

@section('content')
    <a class="btn btn-primary" href="{{ URL::to('reports/create') }}">Agregar denuncia</a>

    <div class="col-md-12">
        <div class="row">
            @foreach($reports as $report)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>
                                {{ $report->description }}
                            </h3>
                            <h4>
                                {{ $report->place }}
                            </h4>
                            {{--<a href="{{  }}"></a>--}}
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection