<?php

namespace App\DataObject;

use ReflectionClass;
use ReflectionProperty;

abstract class DataObject
{
    public function __construct(array $parameters) {

        $class = new ReflectionClass(static::class);

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $reflectionProperty){
            $property = $reflectionProperty->getName();
            if ($reflectionProperty->getType() != null && !$reflectionProperty->getType()->isBuiltin()) {
                $ref = new ReflectionClass($reflectionProperty->getType()->getName());
                if ($ref->isSubclassOf(DataObject::class)) {
                    $this->{$property} = $ref->newInstance($parameters[$property]);
                } else if(isset($parameters[$property])) {
                    $this->{$property} = $parameters[$property];
                }
            }
            else if (isset($parameters[$property])) {
                $this->{$property} = $parameters[$property];
            }
        }

    }

    public function toArray() {
        return (array)$this;
    }
}