<?php

namespace lindritkrasniqi\SanctumAuth\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use SplFileInfo;

class InstallCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = "sanctum-auth:install";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Install sanctum-auth package.";

    /**
     * Handle console command function.
     *
     * @return void
     */
    public function handle(): void
    {
        $filesystem = new Filesystem;

        $this->transfer($filesystem, "stubs/Controllers/Auth", 'Http/Controllers/Auth');

        $this->info('Sanctum-auth Controllers are generated successfully.');

        $this->transfer($filesystem, "stubs/Requests", 'Http/Requests');

        $this->info('Sanctum-auth Requests are generated successfully.');

        $this->exportRoutes();

        $this->info('Sanctum authentication scaffolding generated successfully.');
    }

    /**
     * Append routes into api routes file.
     *
     * @return void
     */
    private function exportRoutes()
    {
        $basePath = base_path('routes/api.php');

        $content = file_get_contents(dirname(__DIR__) . '/../stubs/routes/api.stub');

        if (!Str::contains(file_get_contents($basePath), $content)) {
            file_put_contents($basePath, $content, FILE_APPEND);

            $this->info('Sanctum-auth routes are generated successfully.');
        }
    }

    /**
     * Transfer stubs file into project
     *
     * @param  Filesystem $filesystem
     * @param  string     $from
     * @param  string     $to
     * @return void
     */
    private function transfer(Filesystem $filesystem, string $from, string $to)
    {
        if (!is_dir($directory = app_path($to))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(dirname(__DIR__) . '/../' . $from))
            ->each(function (SplFileInfo $file) use ($filesystem, $to) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path($to . '/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
    }
}
