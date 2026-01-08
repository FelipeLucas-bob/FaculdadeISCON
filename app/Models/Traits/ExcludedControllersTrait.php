<?php

namespace App\Models\Traits;

trait ExcludedControllersTrait
{
    protected array $excludedControllers = [
        'SiteController',
        'HomeController',
        'Controller',
        'ModuleController',
    ];
}
