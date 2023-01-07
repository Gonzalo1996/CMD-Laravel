@extends('connect.master')
@section('title', 'Registrarse')
@section('content')
    <div class="box box_login shadow">
        {!! Form::open(['url' => '/register']) !!}
        <label for="name">Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-user email"></i>
                </div>
            </div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <label for="lastname" class="mtop16">Apellido</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-user email"></i>
                </div>
            </div>
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>

        <label for="email" class="mtop16">Correo electrónico</label>
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

        <label for="cpass" class="mtop16">Confirmar Contraseña</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-lock pass"></i>
                </div>
            </div>
            {!! Form::password('cpassword', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16']) !!}
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
            <a href="{{ url('/login') }}">Ya tengo una cuenta. Ingresar</a>
        </div>
    </div>
@stop