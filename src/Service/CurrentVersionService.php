<?php declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpKernel\KernelInterface;

class CurrentVersionService
{
    private KernelInterface $kernel;
    private string $gitCommit;
    private string $deploymentDate;

    public function __construct(KernelInterface $kernel, string $gitCommit, string $deploymentDate)
    {
        $this->kernel = $kernel;
        $this->gitCommit = $gitCommit;
        $this->deploymentDate = $deploymentDate;
    }

    public function get(): string
    {
        return $this->deploymentDate . '-' . $this->gitCommit . '-' . $this->kernel->getEnvironment();
    }
}
