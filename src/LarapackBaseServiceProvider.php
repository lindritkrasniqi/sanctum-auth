<?php

namespace lindritkrasniqi\Larapack;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider class
 * 
 * @author Lindrit Krasniqi <linndritks@gmail.com>
 */
class LarapackBaseServiceProvider extends ServiceProvider
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
            // Console\TestCommand::class
        ]);
    }
}
