<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        VerifyEmail::toMailUsing(function ($notifiable) {

            // Генерация ссылки для подтверждения письма
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(60),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification())
                ]
            );

            // Переменные, которые будут доступны в шаблоне письма
            $vars = [
                'url' => $verifyUrl
            ];

            return (new MailMessage)
                ->subject('Подтверждение почты') // Тема письма
                ->markdown('emails.verify', $vars); // Шаблон письма
        });
    }
}
