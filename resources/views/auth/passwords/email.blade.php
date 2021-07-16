@extends('layouts.login-layout')

@section('content')
    <div class="mt-5 text-left">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <h5 class="text-primary">Restablecer contraseña:</h5>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control input-login @error('email') is-invalid @enderror" placeholder="Ingrese su Correo Electronico" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-pill btn-login mt-2">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
@endsection
