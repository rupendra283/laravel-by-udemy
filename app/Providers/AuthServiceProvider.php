<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\BlogPost' => 'App\Policies\BlogPost\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('update-post', function($user,$post){
        //     return $user->id ==$post->created_by;
        // });
        // //
        // Gate::define('delete-post', function($user,$post){
        //     return $user->id ==$post->created_by;
        // });

        Gate::define('post.update','App\Policies\BlogPolicy@update');
        Gate::define('post.delete','App\Policies\BlogPolicy@delete');
        // Gate::resource('post','App\Policies\BlogPolicy');
        Gate::before(function($user,$ability,$result){
            if($user->is_admin == 1 && in_array($ability,['post.update','post.delete'])){
                return true;
            }
        });
    }
}
