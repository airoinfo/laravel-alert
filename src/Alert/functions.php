<?php

if (!function_exists('alert')) {

    /**
     * Arrange for an alert message.
     *
     * @param string|null $message
     * @param string      $title
     *
     * @return \UxWeb\SweetAlert\SweetAlertNotifier
     */
    function alert(Array $messageBag = [])
    {
        $notifier = app('airo.alert');
        
        if (!is_null($messageBag)) {
            return $notifier->success($messageBag);
        }
        return $notifier;
    }
}