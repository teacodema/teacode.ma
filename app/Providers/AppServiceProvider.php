<?php

namespace App\Providers;

use App\Models\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        view()->composer('*', function ($view) {
            $mode = \Cookie::get('mode');
            if ($mode != 'dark' && $mode != 'light') {
                $mode = 'dark';
            }
            if (!$view->data) {
                $view->data = new \stdClass;
            }
            if (!\Str::contains($view->name(), 'addons.banner')) {
                $view->data->banner = getNextEvent(true);
                if ($view->data->banner) {
                    $view->data->banner->_title = strlen($view->data->banner->title) > 40 ? \Str::substr($view->data->banner->title, 0, 40).'...' : $view->data->banner->title;
                }
            }
            $view->data->socialLinks = getSocialLinks(true);
            $view->data->footerMenu = getFooterMenu(true);
            $view->with(['mode' => $mode]);
        });
    }
}
