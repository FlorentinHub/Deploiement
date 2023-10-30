@extends('layouts.app')
@include('navbar', ['appName' => 'Florentin Toupet'])
@section('content')
<div class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-content">
                                <img class="imgIns" src="https://media.discordapp.net/attachments/1080262834484682772/1162987134437822585/ft_1_blanc.png?ex=654729ac&is=6534b4ac&hm=449665e1808f3ff3c1cfdb41ee5a0802ac2c9ed5fe95c0cfdfff7cd5f805e8c8&=&width=338&height=250">
                                <header class="headerForm">{{ __('auth.login') }}</header>
                                <div class="field input-field">
                                    <input type="email" placeholder="{{ __('auth.email') }}" class="input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="invalid-feedback cache">
                                        <strong>{{ __('auth.failed') }}</strong>
                                    </span>
                                </div>
                                <div class="field input-field">
                                    <input type="password" placeholder="{{ __('auth.password') }}" class="password @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                                    <i class='bx bx-hide eye-icon'></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-link">
                                    <a href="{{ route('password.request') }}" class="forgot-pass">{{ __('auth.forgot_password') }}</a>
                                </div>
                                <div class="field button-field">
                                    <button type="submit">{{ __('auth.login') }}</button>
                                </div>
                            </div>
                        </form>
                        <div class="line"></div>
                        <div class="form-link">
                            <span>{{ __("auth.no_account") }} <a href="{{ route('register') }}" class="link signup-link">{{ __('auth.register') }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>
</div>
<style>
    .imgIns{
        width: 90px;
        padding-left:10px
    }
    .cache{
        color:transparent;
        user-select: none
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
    }

    .input-field {
        position: relative;
        margin-top: 20px;
    }

    .input, .password{
        width: 100%;
        height: 40px;
        background: #3d424f;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px;
    }

    .input:focus, .password-focus {
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

    .form-link a:hover {
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
        content: 'Florentin Toupet';
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
</style>

<script>
    const pwShowHide = document.querySelectorAll(".eye-icon");

    pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
            let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

            pwFields.forEach(password => {
                if (password.type === "password") {
                    password.type = "text";
                    eyeIcon.classList.remove("bx-hide");
                    eyeIcon.classList.add("bx-show");
                } else {
                    password.type = "password";
                    eyeIcon.classList.remove("bx-show");
                    eyeIcon.classList.add("bx-hide");
                }
            });
        });
    });
</script>

<script src="https://unpkg.com/boxicons@2.0.7/"></script>
@endsection
