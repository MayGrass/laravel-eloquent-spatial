<?php

declare(strict_types=1);

namespace MatanYadaev\EloquentSpatial\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/** @codeCoverageIgnore */
class MultiPointType extends Type
{
  public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
  {
    return 'multipoint';
  }

  public function getName(): string
  {
    return 'multipoint';
  }
}
