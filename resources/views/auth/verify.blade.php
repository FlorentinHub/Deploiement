@include('navbar', ['appName' => 'Florentin Toupet'])
@extends('layouts.app')
@section('content')
    <div class="verify-email-container">
        <div class="verify-email-content">
            <h1>Mail envoyé à : {{ Auth::user()->email }}</h1>
            <p>Un e-mail de vérification a été envoyé à votre adresse e-mail. Veuillez vérifier votre boîte de réception (et
                vos spams le cas échéant) et cliquer sur le lien de vérification pour activer votre compte.</p>
            <form action="{{ route('verification.resend') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Renvoyer l'e-mail de confirmation</button>
            </form>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Se déconnecter</button>
            </form>
        </div>
    </div>
@endsection
<style>
    .verify-email-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .verify-email-content {
        text-align: center;
        background-color: transparent;
        border-radius: 10px;
        box-shadow: 0 10px 10px -3px rgba(255, 255, 255, 0.8);
        padding: 20px;
        color: #fff;
        width: 80%;
        max-width: 400px;
    }

    .verify-email-content h1 {
        font-size: 24px;
    }

    .verify-email-content p {
        font-size: 18px;
        margin: 20px 0;
    }

    .verify-email-content form {
        margin-top: 20px;
    }

    .btn {
        display: inline-block;
        background-color: #0171d3;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px;
        font-size: 16px;
        text-decoration: none;
    }

    .btn.btn-primary {
        background-color: #0171d3;
    }

    .btn.btn-primary:hover {
        background-color: #016dcb;
    }

    .btn.btn-danger {
        background-color: #ff0000;
    }

    .btn.btn-danger:hover {
        background-color: #cc0000;
    }
</style>
