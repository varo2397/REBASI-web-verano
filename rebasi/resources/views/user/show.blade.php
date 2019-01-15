@extends('layouts.complainant')
@section('content')
    <div class="col-md-6 offset-md-3 text-center">
        <div class="card">
            <div class="card-header card-header-primary">
                <h2>
                    Información personal
                </h2>
            </div>
            <div class="card-body">
                <p> Nombre completo: {{ $user->name }}   </p>
                <p> Correo electronico: {{ $user->email }}</p>

            </div>

        </div>
    </div>

@endsection