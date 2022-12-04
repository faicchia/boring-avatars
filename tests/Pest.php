<?php

declare(strict_types=1);

function getProtectedPropertyValue(object $obj, string $propertyName)
{
    $reflector = new \ReflectionObject($obj);
    $property = $reflector->getProperty($propertyName);
    $property ->setAccessible(true);

    return $property->getValue($obj);
}
