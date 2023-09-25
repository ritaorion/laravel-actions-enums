<?php

namespace RitaOrion\LaravelActionsEnums\Commands;

use Illuminate\Console\Command;
use Spatie\StructureDiscoverer\Discover;
use App\Templates\ActionTemplate;

class ActionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actions:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new Action class. Pass in the Action name as an argument.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $rootPath = app_path('Actions');

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
        $template = new ActionTemplate($name, $name);
        fwrite($file, $template->getTemplate());
        fclose($file);
    }
}
