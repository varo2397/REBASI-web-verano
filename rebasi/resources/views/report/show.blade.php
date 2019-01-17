@extends('layouts.complainant')
@section('content')
    <div class="col-md-6 offset-md-3 text-center">
        <div class="card">
            <div class="card-header card-header-primary">
                <h2>
                    Reporte número {{$report->id}}
                </h2>
            </div>
            <div class="card-body">
            	<img src="{{asset($img->route)}}" width="319" height="200">
                <p> Descripción: {{$report->description}}</p>
                <p> Dirección: {{$report->address}}</p>
                <p> Dado en: {{$place->name}}</p>
                @if(Auth::user()->role == 1)
                <form action="/reports/{{$report->id}}" method="POST">
                	@csrf
                	@method('PATCH')
                	<label for="tracing">Seguimiento de la denuncia</label>
                	<div class="form-group">
                		<textarea name="tracing" id="tracing" cols="30" rows="10" class="form-control rounded-0">{{$report->tracing}}</textarea>
                	</div>
                	<button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                @else
                <p> Su denuncia está: {{$report->tracing}}</p>
                @endif
            </div>

        </div>
    </div>

@endsection