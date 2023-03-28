<?php declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

class PathUtilsService
{
    public function fragments(string $path, int $count = 1): string
    {
        $exp = explode('/', $path);
        if (count($exp) == 0) {
            return '';
        }

        return implode('/', array_slice($exp, 0, $count + 1));
    }

    public function requestIsActivePath(?Request $currentRequest, string $cmpPath, int $depth): bool
    {
        if ($currentRequest === null) {
            return false;
        }

        $fragmentsCmpPath = $this->fragments($cmpPath, $depth);
        $fragmentsCurrent = $this->fragments($currentRequest->getPathInfo(), $depth);
        
        return $fragmentsCmpPath === $fragmentsCurrent;
    }

    public function requestPathContains(?Request $request, string $path): bool
    {
        if ($request === null) {
            return false;
        }

        return str_contains($request->getPathInfo(), $path);
    }

    public function requestIsRoute(?Request $request, string $route): bool
    {
        if ($request === null) {
            return false;
        }

        return $request->attributes->get('_route') === $route;
    }

    public function externalLink(?string $url, string $target): string
    {
        if (!$url) {
            return '';
        }
        if (str_starts_with($url, 'http://')) {
            $withoutProtocol = substr($url, 7);
            $withProtocol = $url;
        } elseif (str_starts_with($url, 'https://')) {
            $withoutProtocol = substr($url, 8);
            $withProtocol = $url;
        } else {
            $withoutProtocol = $url;
            $withProtocol = 'http://' . $url;
        }
        if (str_ends_with($withoutProtocol, '/')) {
            $withoutProtocol = substr($withoutProtocol, 0, -1);
        }

        return '<a href="' . $withProtocol . '" target="' . $target . '" rel="noreferrer">' . $withoutProtocol . '</a>';
    }
}
