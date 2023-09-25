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
     * @var array
     */
    private $values;


    /**
     * EnumTemplate constructor.
     * @param string $name
     */
    public function __construct(string $name, string $globalName, array $values = null)
    {
        $this->name = $name;
        $this->globalName = $globalName;
        $this->namespace = $this->createNamespace($globalName);
        $this->values = $values;
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
        if($this->values) {
            return $this->getValuesTemplate();
        }
        return "<?php\n
namespace {$this->namespace};\n

enum {$this->name}: string
{
    case Example = 'example';
}";
    }

    public function getValuesTemplate(): string
    {
        return "<?php\n
namespace {$this->namespace};\n

enum {$this->name}: string
{
    " . $this->getValues() . "
}";
    }

    public function getValues(): string
    {
        $values = '';
        foreach($this->values as $value) {
            $values .= "case $value = '$value';\n    ";
        }
        return $values;
    }
}
