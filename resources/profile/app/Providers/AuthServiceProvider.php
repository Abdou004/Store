<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Profile;
use App\Models\Publication;
use Illuminate\Auth\GenericUser;
use App\Policies\publicationPolicy;
use Illuminate\Support\Facades\Gate;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Publication::class => PublicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
    }
}
