<?php declare(strict_types=1);

namespace App\Twig;

use App\Service\PathUtilsService;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RouteExtension extends AbstractExtension
{
    private RequestStack $requestStack;
    private PathUtilsService $pathUtilsService;

    public function __construct(RequestStack $requestStack, PathUtilsService $pathUtilsService)
    {
        $this->requestStack = $requestStack;
        $this->pathUtilsService = $pathUtilsService;
    }

    public function getFunctions(): array
    {
        return [new TwigFunction('is_route', [$this, 'isRoute'])];
    }

    public function isRoute(string $route): bool
    {
        return $this->pathUtilsService->requestIsRoute($this->requestStack->getMainRequest(), $route);
    }
}
