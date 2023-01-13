<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\Notification;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
//        $this->app->bind('path.public', function() {
//            return base_path().'/../public_html';
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
//        Auth::loginUsingId(1);


        // create @admin, @endadmin directives
        Blade::directive('admin', function () {
            return "<?php if(auth()->guard()->check() && auth()->user()->user_type == 1): ?>";
        });
        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        // view composer

        // admin header
        view()->composer('admin::layouts.header', function ($view) {
            $view->with('notifications', Notification::query()->whereNull('read_at')->get());
        });


    }
}
