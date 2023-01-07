@extends('connect.master')
@section('title', 'Login Actualizado')
@section('content')
    <div class="box box_login shadow">
        {!! Form::open(['url' => '/login']) !!}
        <label for="email">Correo electrónico</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-envelope-open email"></i>
                </div>
            </div>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <label for="pass" class="mtop16">Contraseña</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-lock pass"></i>
                </div>
            </div>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Ingresar', ['class' => 'btn btn-success mtop16']) !!}
        {!! Form::close() !!}

        @if ($errors->any())
        <div class="alert alert-danger mtop16">
            <ul>
                <p>{{'Se ha producido un error: '}}</p>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="footer mtop16">
            <a href="{{ url('/register') }}">¿No tienes una cuenta? Registrate</a>
            <a href="{{ url('/recover') }}">Recuperar contraseña</a>
        </div>
    </div>
@stop