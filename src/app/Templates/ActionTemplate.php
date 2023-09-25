<?php

namespace App\Templates;

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
     * Actions Constructor
     */

    public function __construct(string $name, string $globalName)
    {
        $this->name = $name;
        $this->globalName = $globalName;
        $this->namespace = $this->createNamespace($globalName);
    }

    /**
     * @return string
     */

    private function createNamespace(string $globalName)
    {
        $ns = str_replace('/', '\\', $globalName);
        return 'App\Actions\\' . $ns;
    }


    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return "<?php\n
namespace {$this->namespace};\n

class {$this->name}
{
    public function create(\$input): void
    {
        // Create a new object instance
    }
}";
    }

}
