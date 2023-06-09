<?php
declare(strict_types=1);

namespace PHPOpenSourceSaver\JWTAuth;

use Illuminate\Config\Repository;
use Illuminate\Pipeline\Pipeline;

class JWTToken
{
    protected array $claims = [];

    public function addClaim($key, $value): void
    {
        $this->claims[$key] = $value;
    }

    public function claims(): array
    {
        return $this->claims;
    }
}
