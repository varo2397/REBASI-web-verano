@extends('layouts.complainant')

@section('content')
    <a class="btn btn-primary" href="{{ URL::to('reports/create') }}">Agregar denuncia</a>
@endsection