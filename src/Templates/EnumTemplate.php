<?php

namespace Ritaorion\LaravelActionsEnums\Templates;

use Spatie\StructureDiscoverer\Discover;

class EnumTemplate
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
     * EnumTemplate constructor.
     * @param string $name
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
        return 'App\Enums\\' . $ns;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return "<?php\n
namespace {$this->namespace};\n

enum {$this->name}: string
{
    case Example = 'example';
}";
    }
}
