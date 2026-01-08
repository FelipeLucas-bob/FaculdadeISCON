<?php

namespace App\Console\Commands;

use App\Models\ModuleModel;
use App\Models\Traits\ExcludedControllersTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class ScanControllers extends Command
{
    use ExcludedControllersTrait;
    protected $signature = 'modules:scan';
    protected $description = 'Registra automaticamente os Controllers como módulos no sistema';

    public function handle()
    {
        $path = app_path('Http/Controllers');
        $files = File::allFiles($path);

        $count = 0;

        foreach ($files as $file) {
            $className = $file->getFilenameWithoutExtension();
            $relativePath = $file->getRelativePathname();

            $completeClassName = 'App\\Http\\Controllers\\' . str_replace(
                ['/', '.php'],
                ['\\', ''],
                $relativePath
            );

            if (in_array($className, $this->excludedControllers)) {
                continue;
            }

            if (!class_exists($completeClassName)) {
                $this->info("Total de novos módulos registrados: {$count}");
                continue;
            }

            $name = $completeClassName::$name ?? $this->humanizeController($className);

            $exists = ModuleModel::where('controller', $className)->exists();

            if (!$exists) {
                ModuleModel::create([
                    'name' => $name,
                    'controller' => $className,
                ]);
                $this->info("Módulo registrado: {$name} ({$className})");
                $count++;
            }
        }

        $this->info("Total de novos módulos registrados: {$count}");
    }

    private function humanizeController($className)
    {
        return ucfirst(
            preg_replace('/Controller$/', '', $className)
        );
    }
}
