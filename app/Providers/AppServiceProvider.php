<?php

namespace App\Providers;

use App\Models\Admin\Menu;
use App\Models\Admin\MenuGroup;
use App\Models\Admin\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

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
        // Search Query Builder
        Builder::macro('search', function(string $attribute, string $searchTerm) {
            return $this->where($attribute, 'LIKE', "%{$searchTerm}%");
         });
    }
}
