<?php

namespace App\Providers;

use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $tags = Tag::getMostUsedTags();
//
//        if (Auth::user()){
//            $user = Auth::user();
//            view()->share('user',$user);
//        }
//
//        view()->share('tags',$tags);

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
