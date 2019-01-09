@extends('layouts.auth')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Register') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form>--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Register') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


<div class="row">

    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class=" card-header card-header-primary" >
                <h2 class="card-title text-center">Inicio de sesion</h2>
            </div>
            <div class="card-body">
                <form action="{{url('/store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Correo electronico</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nombre</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Apellidos</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="bmd-label-floating">Contraseña</label>
                                        <input type="password" class="form-control" >
                                    </div>


                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="bmd-label-floating">Confirmar contraseña</label>
                                        <input type="password" class="form-control" >
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                          <label class="control-label" for="radios">Tipo de usuario</label>
                                          <div class="col-md-6"> 
                                            <label class="radio-inline" for="radios-0">
                                              <input type="radio" name="radios" id="radios-0" value="0" checked="checked">
                                              Usuario común
                                            </label> 
                                            <label class="radio-inline" for="radios-1">
                                              <input type="radio" name="radios" id="radios-1" value="1">
                                              Municipalidad
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="place" style="display: none;">
                                        <!-- Select Basic -->
                                        <div class="form-group">
                                          <label class="col-md-4 control-label" for="selectbasic">Provincia</label>
                                            <select id="province" name="province" class="form-control">
                                              <option value="1">San José</option>
                                            </select>
                                        </div>

                                        <!-- Select Basic -->
                                        <div class="form-group">
                                          <label class="col-md-4 control-label" for="canton">Cantón</label>
                                            <select id="canton" name="canton" class="form-control">
                                              <option value="1">San José</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Registrarse</button>
                            <a href="login" class="btn btn-primary">Iniciar sesion</a>

                        </div>


                    </div>

                </form>

                <div class="col-md-12 " style="text-align: center">
                    <div class="btn-group">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
