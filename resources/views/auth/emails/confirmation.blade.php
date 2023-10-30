@extends('layouts.app')
@section('content')
    <style>
        /* Style pour le conteneur principal */
        .container {
            margin-top: 50px;
        }

        /* Style pour la carte */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 10px -3px rgba(0, 0, 0, 0.1);
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

        /* Style pour les alertes */
        .alert {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }

        /* Style pour les liens */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Vérification de l\'adresse e-mail') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </div>
                        @endif

                        {{ __('Avant de continuer, veuillez vérifier votre courriel pour un lien de vérification.') }}
                        {{ __('Si vous n\'avez pas reçu le courriel') }}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici pour en demander un autre') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
