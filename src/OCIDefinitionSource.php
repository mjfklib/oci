<?php

declare(strict_types=1);

namespace mjfklib\OCI;

use mjfklib\Container\DefinitionSource;
use mjfklib\Container\Env;

class OCIDefinitionSource extends DefinitionSource
{
    /**
     * @inheritdoc
     */
    protected function createDefinitions(Env $env): array
    {
        return [
            OCIConfig::class => static::factory([OCIConfig::class, 'create'])
        ];
    }
}
