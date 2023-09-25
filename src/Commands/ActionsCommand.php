<?php

namespace Ritaorion\LaravelActionsEnums\Commands;

use Illuminate\Console\Command;
use Spatie\StructureDiscoverer\Discover;
use Ritaorion\LaravelActionsEnums\Templates\ActionTemplate;

class ActionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actions:create {name} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new Action class. Pass in the Action name as an argument.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->argument('name');
        $gn = $this->argument('name');
        $model = $this->option('model');
        if($model) {
            if (!class_exists("App\\Models\\" . $model)) {
                $this->error('The model you provided does not exist.');
                return;
            }
        }

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
        $template = new ActionTemplate($name, $gn, $model);
        $write = fwrite($file, $template->getTemplate());
        fclose($file);
        if($write) {
            $message = "Action $gn created successfully.";
            $this->info($message);
        } else {
            $this->error('Something went horribly wrong. Check your syntax and try again.');
        }
    }
}
