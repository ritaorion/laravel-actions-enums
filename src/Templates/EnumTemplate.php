<?php

namespace RitaOrion\LaravelActionsEnums\Templates;

use Spatie\StructureDiscoverer\Discover;

class EnumTemplate
{
    /**
     * @var string
     */
    private $name;


    /**
     * EnumTemplate constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return "<?php\n
namespace App\Enums;\n

enum {$this->name} : string
{

/**
* Define cases, constants, methods, or properties here. Enums are very flexible.
* https://www.php.net/manual/en/language.enumerations.basics.php
*/


}";
    }
}
