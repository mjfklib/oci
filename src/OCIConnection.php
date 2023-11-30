<?php

declare(strict_types=1);

namespace mjfklib\OCI;

class OCIConnection
{
    /** @var resource $conn */
    public readonly mixed $conn;


    /**
     * @param OCIConfig $config
     * @return resource
     */
    public function __construct(OCIConfig $config)
    {
        $sessionMode = is_string($config->sessionMode) ? constant($config->sessionMode) : null;

        $conn = oci_connect(
            $config->username,
            $config->password,
            $config->connectionString,
            $config->encoding ?? 'UTF8',
            is_int($sessionMode) ? $sessionMode : OCI_DEFAULT
        );

        if ($conn === false) {
            $error = oci_error();
            $ex = is_array($error) ? new \RuntimeException($error['message'], $error['code']) : null;
            throw new \RuntimeException("Failed to create OCI connection", 0, $ex);
        }

        $this->conn = $conn;
    }


    public function __destruct()
    {
        oci_close($this->conn);
    }
}
