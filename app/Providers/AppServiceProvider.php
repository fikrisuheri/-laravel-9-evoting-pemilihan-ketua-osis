<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        if (Schema::hasTable('configs')) {
            view()->share([
                'app_name' => Config::where(['name' => 'app_name'])->first()['value'] ?? '-',
                'app_logo' => Config::where(['name' => 'app_logo'])->first()['file_path'] ?? '-',
                'vote_date' => Config::where(['name' => 'vote_date'])->first()['value'] ?? '-',
                'vote_open' => Config::where(['name' => 'vote_open'])->first()['value'] ?? '-',
                'vote_closed' => Config::where(['name' => 'vote_closed'])->first()['value'] ?? '-',
            ]);
        }
    }
}
