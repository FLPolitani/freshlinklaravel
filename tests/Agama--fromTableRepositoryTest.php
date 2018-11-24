<?php

use App\Models\Agama--fromTable;
use App\Repositories\Agama--fromTableRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Agama--fromTableRepositoryTest extends TestCase
{
    use MakeAgama--fromTableTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var Agama--fromTableRepository
     */
    protected $agamaFromTableRepo;

    public function setUp()
    {
        parent::setUp();
        $this->agamaFromTableRepo = App::make(Agama--fromTableRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAgama--fromTable()
    {
        $agamaFromTable = $this->fakeAgama--fromTableData();
        $createdAgama--fromTable = $this->agamaFromTableRepo->create($agamaFromTable);
        $createdAgama--fromTable = $createdAgama--fromTable->toArray();
        $this->assertArrayHasKey('id', $createdAgama--fromTable);
        $this->assertNotNull($createdAgama--fromTable['id'], 'Created Agama--fromTable must have id specified');
        $this->assertNotNull(Agama--fromTable::find($createdAgama--fromTable['id']), 'Agama--fromTable with given id must be in DB');
        $this->assertModelData($agamaFromTable, $createdAgama--fromTable);
    }

    /**
     * @test read
     */
    public function testReadAgama--fromTable()
    {
        $agamaFromTable = $this->makeAgama--fromTable();
        $dbAgama--fromTable = $this->agamaFromTableRepo->find($agamaFromTable->id);
        $dbAgama--fromTable = $dbAgama--fromTable->toArray();
        $this->assertModelData($agamaFromTable->toArray(), $dbAgama--fromTable);
    }

    /**
     * @test update
     */
    public function testUpdateAgama--fromTable()
    {
        $agamaFromTable = $this->makeAgama--fromTable();
        $fakeAgama--fromTable = $this->fakeAgama--fromTableData();
        $updatedAgama--fromTable = $this->agamaFromTableRepo->update($fakeAgama--fromTable, $agamaFromTable->id);
        $this->assertModelData($fakeAgama--fromTable, $updatedAgama--fromTable->toArray());
        $dbAgama--fromTable = $this->agamaFromTableRepo->find($agamaFromTable->id);
        $this->assertModelData($fakeAgama--fromTable, $dbAgama--fromTable->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAgama--fromTable()
    {
        $agamaFromTable = $this->makeAgama--fromTable();
        $resp = $this->agamaFromTableRepo->delete($agamaFromTable->id);
        $this->assertTrue($resp);
        $this->assertNull(Agama--fromTable::find($agamaFromTable->id), 'Agama--fromTable should not exist in DB');
    }
}
