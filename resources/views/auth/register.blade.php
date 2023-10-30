@extends('layouts.app')
@include('navbar', ['appName' => 'Florentin Toupet'])
@section('content')
<div class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-content">
                                <img class="imgIns"
                                    src="https://media.discordapp.net/attachments/1080262834484682772/1162987134437822585/ft_1_blanc.png?ex=654729ac&is=6534b4ac&hm=449665e1808f3ff3c1cfdb41ee5a0802ac2c9ed5fe95c0cfdfff7cd5f805e8c8&=&width=338&height=250">

                                <header class="headerForm">S'inscrire</header>
                                <strong class="invisible">These credentials do not match our records.</strong>
                                <span class="invalid-feedback cache">
                                    <strong>These credentials do not match our records.</strong>
                                </span>
                                <div class="field input-field">
                                    <span class="invalid-feedback cache">
                                        <strong>These credentials do not match our records.</strong>
                                    </span>
                                    <input id="name" type="text"
                                        class="input form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="{{ __('auth.NomComplet') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="field input-field">
                                    <input id="email" type="email"
                                        class="input form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="{{ __('auth.email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="field input-field">
                                    <input id="password" type="password"
                                        class="input form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password" placeholder="{{ __('auth.password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="field input-field">
                                    <input id="password-confirm" type="password" class="input form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="{{ __('auth.cpassword') }}">
                                </div>
                                <div class="field button-field">
                                    <button type="submit">{{ __('auth.register') }}</button>
                                </div>
                                <div class="line"></div>
                                <div class="form-link">
                                    <span>{{ __('auth.Vcompte') }}<a href="/login" class="link signup-link">{{ __('auth.login') }}</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('footer')
    </div>
    <style>
        .imgIns {
            width: 90px;
            padding-left: 10px
        }

        .cache {
            color: transparent;
            user-select: none;
            max-height: 0%;
            min-height: 0em;
        }

        .input.is-invalid {
            border: 2px solid red;
        }

        .password.is-invalid {
            border: 2px solid red;
        }

        .login-form {
            font-family: 'Arial', sans-serif;
            color: #fff;
            text-align: center;
        }

        .container {
            height: 100vh;
            display: flex;
            padding-top: 100px;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 20px 20px -3px #016DCC;
        }

        .card-header {
            background-color: #1c1f24;
            color: #fff;
            border: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .form-content {
            padding: 20px;
        }

        .headerForm {
            font-size: 36px;
            font-weight: 600;
            color: #fff;
            text-align: left;
            margin-top: 0;
            padding: 0 20px;
            padding-bottom: -10px
        }

        .input-field {
            position: relative;
            margin-top: 20px;
        }

        .input,
        .password {
            width: 100%;
            height: 40px;
            background: #3d424f;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px;
        }

        .input:focus,
        .password-focus {
            border: 2px solid #0171d3;
        }

        .password {
            width: 100%;
        }

        .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #ff0000;
            cursor: pointer;
            padding: 5px;
        }

        .button-field {
            margin-top: 20px;
        }

        button {
            width: 100%;
            height: 40px;
            background-color: #0171d3;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #016dcb;
        }

        .form-link {
            text-align: center;
            margin-top: 10px;
        }

        .form-link a {
            color: #0171d3;
            text-decoration: none;
        }

        .form-content a:hover {
            text-decoration: underline;
        }

        .line {
            position: relative;
            height: 1px;
            width: 100%;
            margin: 36px 0;
            background-color: #3d424f;
        }

        .line::before {
            content: 'Ou';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #32363d;
            color: #8b8b8b;
            padding: 0 15px;
        }

        .forgot-pass {
            color: #0171d3;
            text-decoration: none;
        }

        .forgot-pass:hover {
            text-decoration: underline;
        }

        .signup-link {
            color: #0171d3;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }
        .invisible{
            color: transparent;
            user-select: none;
        }
    </style>
@endsection
