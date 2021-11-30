<?php

namespace lindritkrasniqi\SanctumAuth\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class UninstallCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = "sanctum-auth:uninstall";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Removes all included content from sanctum-auth package.";

    /**
     * Handle console command function.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->removeFiles(app_path('Http/Controllers/Auth'), 'stubs/Controllers/Auth');

        $this->info('Sanctum-auth Controllers are removed successfully.');

        $this->removeFiles(app_path('Http/Requests'), 'stubs/Requests');

        $this->info('Sanctum-auth Requests are removed successfully.');

        $this->removeRoutes();

        $this->info('Sanctum authentication scaffolding is uninstalled successfully.');
    }

    private function removeFiles(string $path, string $dir)
    {
        $directories = scandir($dir = dirname(__DIR__) . "/../{$dir}");

        foreach ($directories as $value) {
            if ($value == '.' || $value == '..') {
                continue;
            }

            if (file_exists($filename = $path . '/' . Str::replaceLast('.stub', '.php', $value))) {
                unlink($filename);
            }
        }

        if (is_dir($path) && count(scandir($path)) == 2) {
            rmdir($path);
        }
    }

    private function removeRoutes()
    {
        $content  = file_get_contents(dirname(__DIR__) . '/../stubs/routes/api.stub');

        $file = base_path('routes/api.php');

        $content = Str::replace($content, '', file_get_contents($file));

        if (is_writable($file)) {
            if (!$handle = fopen($file, 'w')) {
                $this->error('Cannot open the route/api.php file!');
            }

            if (fwrite($handle, $content) === FALSE) {
                $this->error('Cannot write the route/api.php file! Please remove the routes manually.');
            }

            fclose($handle);
        }

        $this->info('The sanctum-auth api routes are removed successfully.');
    }
}
