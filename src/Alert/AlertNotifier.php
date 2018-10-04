<?php

namespace Airo\Alert;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class AlertNotifier
{
    public function success(Array $messageBag)
    {
        return session(['success' => $messageBag]);
    }
    
    public function errors(Array $messageBag)
    {
        return session([
            'errors' => app(ViewErrorBag::class)->put('default', new MessageBag($messageBag)),
        ]);
    }
}