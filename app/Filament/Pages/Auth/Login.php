<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Session;

class Login extends BaseLogin
{
    public function mount(): void
    {
        parent::mount();

        // Check for session messages and display them as notifications
        if (Session::has('error')) {
            Notification::make()
                ->title('Access Denied')
                ->body(Session::get('error'))
                ->danger()
                ->send();

            Session::forget('error');
        }
    }
}
