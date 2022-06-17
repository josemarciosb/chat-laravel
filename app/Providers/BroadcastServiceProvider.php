<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
        // Broadcast::routes(['middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified']]);



        require base_path('routes/channels.php');
    }
}
