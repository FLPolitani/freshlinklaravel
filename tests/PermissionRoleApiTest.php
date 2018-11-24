<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoleApiTest extends TestCase
{
    use MakePermissionRoleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePermissionRole()
    {
        $permissionRole = $this->fakePermissionRoleData();
        $this->json('POST', '/api/v1/permissionRoles', $permissionRole);

        $this->assertApiResponse($permissionRole);
    }

    /**
     * @test
     */
    public function testReadPermissionRole()
    {
        $permissionRole = $this->makePermissionRole();
        $this->json('GET', '/api/v1/permissionRoles/'.$permissionRole->id);

        $this->assertApiResponse($permissionRole->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePermissionRole()
    {
        $permissionRole = $this->makePermissionRole();
        $editedPermissionRole = $this->fakePermissionRoleData();

        $this->json('PUT', '/api/v1/permissionRoles/'.$permissionRole->id, $editedPermissionRole);

        $this->assertApiResponse($editedPermissionRole);
    }

    /**
     * @test
     */
    public function testDeletePermissionRole()
    {
        $permissionRole = $this->makePermissionRole();
        $this->json('DELETE', '/api/v1/permissionRoles/'.$permissionRole->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/permissionRoles/'.$permissionRole->id);

        $this->assertResponseStatus(404);
    }
}
