<?php

namespace lindritkrasniqi\SanctumAuth;

use Illuminate\Support\ServiceProvider;

class SanctumAuthBaseServiceProvider extends ServiceProvider
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function boot()
    {
        # code...
    }

    /**
     * Register any application services.
     * 
     * @return void
     */
    public function register()
    {
        $this->commands([
             Console\InstallCommand::class,
             Console\UninstallCommand::class
        ]);
    }
}
