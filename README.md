# laravel-alert

composer required airoinfo/laravel-alert

php artisan vendor:publish --tag=views --force

php artisan vendor:publish --tag=component --force

@include('alert::notify')

use Airo/Alert;

Alert::success(['message1', 'message2', '...']);
Alert::errors(['message1', 'message2', '...']);
