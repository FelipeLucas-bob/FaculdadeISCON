<?php

namespace App\Services;

use App\Models\ModuleModel;
use App\Models\ModuleSectorProfileModel;
use App\Models\Traits\ExcludedControllersTrait;
use App\Models\User;
use App\Repositories\ModuleRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Route;
use Auth;

class ModuleService
{

    use ExcludedControllersTrait;

    public function __construct(protected ModuleRepository $repository, protected UserRepository $userRepository)
    {
    }

    public function userHasAccessToController(User $user, string $controller): bool
    {
        $this->getSideBarItems();

        if ($this->isSuperAdmin($user) || $this->isExcludedController($controller)) {
            return true;
        }

        $module = $this->getModuleByController($controller);

        if (!$module) {
            return false;
        }

        return $this->hasAccessToModule($user, $module->id);
    }

    protected function isSettingsRoute()
    {
        return Route::currentRouteNamed('users.settings');
    }

    protected function isSuperAdmin(User $user): bool
    {
        return $user->isSuperAdmin();
    }

    protected function isExcludedController(string $controller): bool
    {
        return in_array($controller, $this->excludedControllers);
    }

    protected function hasAccessToModule(User $user, int $moduleId): bool
    {
        if ($this->isSettingsRoute() && !$this->isSuperAdmin($user)) {
            return false;
        }

        $profileIds = $this->userRepository->getProfileIds($user);
        $sectorIds = $this->userRepository->getSectorIds($user);

        return $this->repository->hasAccess($moduleId, $profileIds, $sectorIds);
    }


    public function createModuleAccess(int $moduleId, int $profileId, int $sectorId): ModuleSectorProfileModel|null
    {

        $moduleExists = $this->repository->getModuleAccessByProfileAndSector($moduleId, $profileId, $sectorId);

        if ($moduleExists) {
            return $moduleExists;
        }

        $moduleAccess = new ModuleSectorProfileModel();
        $moduleAccess->module_id = $moduleId;
        $moduleAccess->profile_id = $profileId;
        $moduleAccess->sector_id = $sectorId;

        return $this->repository->saveModuleAccess($moduleAccess);
    }

    public function removeModuleAccess(int $moduleId, int $profileId, int $sectorId): bool
    {

        $moduleExists = $this->repository->getModuleAccessByProfileAndSector($moduleId, $profileId, $sectorId);

        if (!$moduleExists) {
            return false;
        }

        return $this->repository->delete($moduleExists);
    }
    public function getAllModules(): ?Collection
    {
        return $this->repository->getAll();
    }

    public function getAllModuleAcesses(): ?Collection
    {
        return $this->repository->getAllModuleAccesses();
    }

    public function getModuleByController(string $controller): ?ModuleModel
    {
        return $this->repository->findByController($controller);
    }

    public function getSideBarItems()
    {
        $user = Auth::user();
        $userProfiles = $user->profiles->pluck('id')->toArray();
        $sideBar = collect(config('sidebar'));

        if ($user->isSuperAdmin()) {
            return $sideBar;
        }

        $userAccessNested = array_map(function ($profileId) {
            return $this->repository->getModuleAccessByProfile($profileId)->toArray();
        }, $userProfiles);

        $moduleAccessNames = collect($userAccessNested)
            ->flatten(1)
            ->pluck('module')
            ->pluck('name')
            ->toArray();

        $filteredSideBar = $sideBar->filter(function ($item) use ($moduleAccessNames) {
            if (!empty($item['default'])) {
                return true;
            }
            return in_array($item['name'], $moduleAccessNames);
        });

        return $filteredSideBar->values();
    }


}
