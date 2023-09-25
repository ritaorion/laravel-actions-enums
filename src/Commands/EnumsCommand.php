<?php

namespace Ritaorion\LaravelActionsEnums\Commands;

use Illuminate\Console\Command;
use Spatie\StructureDiscoverer\Discover;
use Ritaorion\LaravelActionsEnums\Templates\EnumTemplate;

class EnumsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {name} {--case=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Enum class. Pass in the Enum name and values as arguments.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $gn = $this->argument('name');
        $values = $this->option('case');
        $rootPath = app_path('Enums');

        if (!is_dir($rootPath)) {
            mkdir($rootPath);
        }

        if (strpos($name, '/') !== false) {
            $nameParts = explode('/', $name);
            $name = array_pop($nameParts);
            $rootPath .= '/' . implode('/', $nameParts);

            if (!is_dir($rootPath)) {
                mkdir($rootPath, 0777, true);
            }
        }

        $file = fopen("$rootPath/$name.php", 'w');
        $template = new EnumTemplate($name, $gn, $values);
        $write = fwrite($file, $template->getTemplate());
        fclose($file);
        if($write) {
            $message = "Enum $gn created successfully.";
            $this->info($message);
        } else {
            $this->error('There was an error creating the Enum.');
        }
    }
}
