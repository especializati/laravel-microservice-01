<?php

namespace App\Providers;

use App\Models\{
    Category,
    Company
};
use App\Observers\{
    CategoryObserver,
    CompanyObserve
};
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
        /**
         * Observers
         */
        Category::observe(CategoryObserver::class);
        Company::observe(CompanyObserve::class);
    }
}
