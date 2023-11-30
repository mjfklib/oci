<?php

declare(strict_types=1);

namespace mjfklib\OCI;

use mjfklib\Container\Env;

class OCIConfig
{
    public const OCI_USERNAME = 'OCI_USERNAME';
    public const OCI_PASS = 'OCI_PASS';
    public const OCI_CONN = 'OCI_CONN';
    public const OCI_ENCODING = 'OCI_ENCODING';
    public const OCI_SESSION_MODE = 'OCI_SESSION_MODE';


    /**
     * @param Env $env
     * @return self
     */
    public static function create(Env $env): self
    {
        return new self(
            $env[static::OCI_USERNAME] ?? '',
            $env[static::OCI_PASS] ?? '',
            $env[static::OCI_CONN] ?? null,
            $env[static::OCI_ENCODING] ?? null,
            $env[static::OCI_SESSION_MODE] ?? null
        );
    }


    /**
     * @param string $username
     * @param string $password
     * @param string|null $connectionString
     * @param string|null $encoding
     * @param string|null $sessionMode
     */
    public function __construct(
        public string $username,
        public string $password,
        public string|null $connectionString,
        public string|null $encoding,
        public string|null $sessionMode,
    ) {
    }
}
