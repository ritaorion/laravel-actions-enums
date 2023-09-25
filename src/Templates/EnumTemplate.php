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
        $lastBackslashPos = strrpos($ns, '\\');
        if ($lastBackslashPos !== false) {
            $result = substr($ns, 0, $lastBackslashPos);
            return 'App\Enums\\' . $result;
        }
        return 'App\Actions\\' . $ns;
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
    /**
     * @throws \Exception
     */
    public function getLabel(): string
    {
        return match (\$this->value) {
            " . $this->getMatches() . "
            default => throw new \Exception('Unexpected match value'),
        };
    }
}";
    }

    public function getValues(): string
    {
        $values = '';
        foreach($this->values as $value) {
            if (strpos($value, ' ') !== false) {
                $pascal_value = str_replace(' ', '', ucwords($value));
                $values .= "case $pascal_value = '$value';\n    ";
            } else {
                $values .= "case $value = '$value';\n    ";
            }
        }
        return $values;
    }

    public function getMatches(): string
    {
        $matches = '';
        foreach($this->values as $value) {
            if (strpos($value, ' ') !== false) {
                $pascal_value = str_replace(' ', '', ucwords($value));
                $matches .= "self::$pascal_value => '$value',\n            ";
            } else {
                $matches .= "self::$value => '$value',\n            ";
            }
        }
        return $matches;
    }
}
