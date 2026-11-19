<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // MATIKAN SEMENTARA DI LOKAL! 
        // Ini penyebab utama form action berubah jadi https:// dan membuat php artisan serve menolak koneksi (ERR_CONNECTION_CLOSED)
        /*
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        */

        View::composer('admin.*', function ($view) {
            $adminNotifs = collect();
            $adminNotifUnreadCount = 0;

            if (Auth::check() && Auth::user()->role === 'admin') {
                $adminNotifs = Notifikasi::where('user_id', Auth::id())
                                       ->latest()
                                       ->take(10)
                                       ->get();
                                       
                $adminNotifUnreadCount = Notifikasi::where('user_id', Auth::id())
                                                ->where('is_read', 0)
                                                ->count();
            }

            $view->with([
                'adminNotifs' => $adminNotifs,
                'adminNotifUnreadCount' => $adminNotifUnreadCount
            ]);
        });
    }
}