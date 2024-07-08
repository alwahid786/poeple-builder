<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;

class DynamicConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = [];
        if (Schema::hasTable('categories')) {
            $categories = Category::all()->pluck('name')->toArray();
        }
        config([
            'constants.VIDEO_TYPES_ARRAY' => $categories,
            'constants.DAILY_VIDEO_TYPES' => array_map(function($category) {
                return ['label' => $category];
            }, $categories)
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
