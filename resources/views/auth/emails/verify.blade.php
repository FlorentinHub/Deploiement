@if (Route::has('verification.resend'))
    <a href="{{ route('verification.resend') }}">
        Renvoyer le lien de vérification de l'adresse e-mail
    </a>
@endif
