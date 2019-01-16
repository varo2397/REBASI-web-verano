@extends('layouts.complainant')

@section('content')

    <a class="btn btn-primary" href="{{ URL::previous() }}">Atras</a>
    <form action="{{ URL::to('reports') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="selectbasic">Provincia</label>
                                        <select id="province" name="province" class="form-control">
                                        </select>
                                        <label for="selectbasic">Cantón</label>
                                        <select id="canton" name="canton" class="form-control">
                                        </select>
                                        <label for="selectbasic">Distrito</label>
                                        <select id="district" name="district" class="form-control">
                                        </select>
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
                                        <lable>Foto</lable>
                                        <input accept="image/*" type="file" name="photos" id="photos" required class="form-control">
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