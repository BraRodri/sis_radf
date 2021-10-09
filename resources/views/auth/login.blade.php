@extends('layouts.login-layout')

@section('content')

<div class="mt-5 text-left">
    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
        @csrf

        <h5 class="text-primary">Escriba su correo y contraseña:</h5>

        <div class="form-group row justify-content-md-center">
            <div class="col-md-12">
                <input id="email" type="email" class="form-control input-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Escriba su Correo Electronico" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <div class="col-md-12">
                <input id="password" type="password" class="form-control input-login @error('password') is-invalid @enderror" name="password" required placeholder="Escriba su Contraseña" autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary btn-pill btn-login mt-2">
                {{ __('Login') }} <i class="fas fa-arrow-right"></i>
            </button>
        </div>

        @php /*
        <div class="text-center">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        */ @endphp

    </form>
</div>

@endsection
