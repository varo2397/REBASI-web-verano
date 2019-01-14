@extends('layouts.complainant')

@section('content')

    <a class="btn btn-primary" href="{{ URL::previous() }}">Atras</a>
    <form action="{{ URL::to('reports') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header card-header-primary text-center">
                            <h2>Crear denuncia</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Lugar</lable>
                                        <input class="form-control" required name="place">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Descripción</lable>
                                        <textarea class="form-control" required name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <lable>Lugar</lable>
                                        <input accept="image/*" type="file" name="photos" required multiple class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Crear denuncia</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection