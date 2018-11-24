<?php

use App\Models\PermissionRole;
use App\Repositories\PermissionRoleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionRoleRepositoryTest extends TestCase
{
    use MakePermissionRoleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PermissionRoleRepository
     */
    protected $permissionRoleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->permissionRoleRepo = App::make(PermissionRoleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePermissionRole()
    {
        $permissionRole = $this->fakePermissionRoleData();
        $createdPermissionRole = $this->permissionRoleRepo->create($permissionRole);
        $createdPermissionRole = $createdPermissionRole->toArray();
        $this->assertArrayHasKey('id', $createdPermissionRole);
        $this->assertNotNull($createdPermissionRole['id'], 'Created PermissionRole must have id specified');
        $this->assertNotNull(PermissionRole::find($createdPermissionRole['id']), 'PermissionRole with given id must be in DB');
        $this->assertModelData($permissionRole, $createdPermissionRole);
    }

    /**
     * @test read
     */
    public function testReadPermissionRole()
    {
        $permissionRole = $this->makePermissionRole();
        $dbPermissionRole = $this->permissionRoleRepo->find($permissionRole->id);
        $dbPermissionRole = $dbPermissionRole->toArray();
        $this->assertModelData($permissionRole->toArray(), $dbPermissionRole);
    }

    /**
     * @test update
     */
    public function testUpdatePermissionRole()
    {
        $permissionRole = $this->makePermissionRole();
        $fakePermissionRole = $this->fakePermissionRoleData();
        $updatedPermissionRole = $this->permissionRoleRepo->update($fakePermissionRole, $permissionRole->id);
        $this->assertModelData($fakePermissionRole, $updatedPermissionRole->toArray());
        $dbPermissionRole = $this->permissionRoleRepo->find($permissionRole->id);
        $this->assertModelData($fakePermissionRole, $dbPermissionRole->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePermissionRole()
    {
        $permissionRole = $this->makePermissionRole();
        $resp = $this->permissionRoleRepo->delete($permissionRole->id);
        $this->assertTrue($resp);
        $this->assertNull(PermissionRole::find($permissionRole->id), 'PermissionRole should not exist in DB');
    }
}
