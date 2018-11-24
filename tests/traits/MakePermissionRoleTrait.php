<?php

use Faker\Factory as Faker;
use App\Models\PermissionRole;
use App\Repositories\PermissionRoleRepository;

trait MakePermissionRoleTrait
{
    /**
     * Create fake instance of PermissionRole and save it in database
     *
     * @param array $permissionRoleFields
     * @return PermissionRole
     */
    public function makePermissionRole($permissionRoleFields = [])
    {
        /** @var PermissionRoleRepository $permissionRoleRepo */
        $permissionRoleRepo = App::make(PermissionRoleRepository::class);
        $theme = $this->fakePermissionRoleData($permissionRoleFields);
        return $permissionRoleRepo->create($theme);
    }

    /**
     * Get fake instance of PermissionRole
     *
     * @param array $permissionRoleFields
     * @return PermissionRole
     */
    public function fakePermissionRole($permissionRoleFields = [])
    {
        return new PermissionRole($this->fakePermissionRoleData($permissionRoleFields));
    }

    /**
     * Get fake data of PermissionRole
     *
     * @param array $postFields
     * @return array
     */
    public function fakePermissionRoleData($permissionRoleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'role_id' => $fake->randomDigitNotNull
        ], $permissionRoleFields);
    }
}
