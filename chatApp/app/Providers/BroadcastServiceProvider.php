<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

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

        Broadcast::channel('chatroom', function ($user) {
            if (true) { // Replace with real authorization
                return [
                    'id' => $user->id,
                    'name' => $user->name
                ];
            }
        });

        require base_path('routes/channels.php');
    }
}
