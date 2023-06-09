<?php
declare(strict_types=1);

namespace PHPOpenSourceSaver\JWTAuth;

use Illuminate\Pipeline\Pipeline;

class JWTTokenClaim
{
    protected array $pipes = [];

    public function __construct()
    {
        $this->pipes = config('jwt.claim_pipes', []);
    }

    public function all(): array
    {
        return app(Pipeline::class)
            ->send(resolve(JWTToken::class))
            ->through($this->pipes)
            ->thenReturn()
            ->claims();
    }

    public function addPipes(array $pipes): static
    {
        foreach ($pipes as $pipe) {
            $this->pipes[] = $pipe;
        }
        return $this;
    }
    public function resetPipes(): static
    {
        $this->pipes = config('jwt.claim_pipes', []);
        return $this;
    }
}
