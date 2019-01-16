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
                <p> Descripción: {{$report->description}}</p>
                <p> Dado en: {{$place->name}}</p>
                <form action="/reports/{{$report->id}}" method="POST">
                	@csrf
                	@method('PATCH')
                	<label for="tracing">Seguimiento de la denuncia</label>
                	<div class="form-group">
                		<textarea name="tracing" id="tracing" cols="30" rows="10" class="form-control rounded-0"></textarea>
                	</div>
                	<button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>

        </div>
    </div>

@endsection