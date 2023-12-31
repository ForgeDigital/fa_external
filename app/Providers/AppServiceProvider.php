<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use TiMacDonald\JsonApi\JsonApiResource;

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
        JsonApiResource::resolveIdUsing(fn (Model $model) => $model->resource_id);
        //        JsonApiResource::resolveIdUsing(function (mixed $resource, Request $request): string {
        //            return $resource->id = 'resource_id';
        //        });
    }
}
