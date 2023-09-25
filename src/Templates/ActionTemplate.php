<?php

namespace Ritaorion\LaravelActionsEnums\Templates;

use Spatie\StructureDiscoverer\Discover;

class ActionTemplate
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $globalName;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $className;

    /**
     * Actions Constructor
     */

    public function __construct(string $name, string $globalName, string $model = null)
    {
        $this->name = $name;
        $this->className = $this->createQualifiedClassName($name);
        $this->globalName = $globalName;
        $this->namespace = $this->createNamespace($globalName);
        $this->model = $model;
    }

    /**
     * @return string
     */
    private function createNamespace(string $globalName)
    {
        $ns = str_replace('/', '\\', $globalName);
        $lastBackslashPos = strrpos($ns, '\\');
        if ($lastBackslashPos !== false) {
            $result = substr($ns, 0, $lastBackslashPos);
            return 'App\Actions\\' . $result;
        }
        return 'App\Actions';
    }

    /**
     * @return string
     */
    private function createQualifiedClassName(string $name)
    {
        return $this->name . 'Actions';
    }


    /**
     * @return string
     */
    public function getTemplate(): string
    {
        if($this->model) {
            return $this->getModelTemplate();
        }
        return "<?php\n
namespace {$this->namespace};\n

class {$this->className}
{
    public function create(\$input): void
    {
        // Create a new object instance
    }
}";
    }

    public function getModelTemplate(): string
    {
        return "<?php\n
namespace {$this->namespace};\n
use App\Models\\{$this->model};

class {$this->className}
{
    public function index(): void
    {
        // Index listing
    }
    public function create(\$input): void
    {
        // Create a new object instance
    }
    public function show({$this->model} \$model): void
    {
        // Show a single object instance
    }
    public function update({$this->model} \$model, \$input): void
    {
        // Update an object instance
    }
    public function delete({$this->model} \$model): void
    {
        // Delete an object instance
    }
}";
    }

}
