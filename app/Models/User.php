<?php

namespace App\Models;

use Illuminate\Notifications\Messages\MailMessage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Notification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }
    public function isAdmin()
    {
        return $this->isAdmin;
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
class CustomVerifyEmail extends VerifyEmail
{
    protected $redirectTo = '/';

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Vérification de votre adresse e-mail')
            ->line('Cliquez sur le bouton ci-dessous pour vérifier votre adresse e-mail.')
            ->action('Vérifier mon adresse e-mail', $this->verificationUrl($notifiable))
            ->line('Si vous n\'avez pas créé de compte, vous pouvez ignorer cet e-mail.');
    }
}
