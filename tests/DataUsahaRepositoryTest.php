<?php

use App\Models\DataUsaha;
use App\Repositories\DataUsahaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataUsahaRepositoryTest extends TestCase
{
    use MakeDataUsahaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DataUsahaRepository
     */
    protected $dataUsahaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dataUsahaRepo = App::make(DataUsahaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDataUsaha()
    {
        $dataUsaha = $this->fakeDataUsahaData();
        $createdDataUsaha = $this->dataUsahaRepo->create($dataUsaha);
        $createdDataUsaha = $createdDataUsaha->toArray();
        $this->assertArrayHasKey('id', $createdDataUsaha);
        $this->assertNotNull($createdDataUsaha['id'], 'Created DataUsaha must have id specified');
        $this->assertNotNull(DataUsaha::find($createdDataUsaha['id']), 'DataUsaha with given id must be in DB');
        $this->assertModelData($dataUsaha, $createdDataUsaha);
    }

    /**
     * @test read
     */
    public function testReadDataUsaha()
    {
        $dataUsaha = $this->makeDataUsaha();
        $dbDataUsaha = $this->dataUsahaRepo->find($dataUsaha->id);
        $dbDataUsaha = $dbDataUsaha->toArray();
        $this->assertModelData($dataUsaha->toArray(), $dbDataUsaha);
    }

    /**
     * @test update
     */
    public function testUpdateDataUsaha()
    {
        $dataUsaha = $this->makeDataUsaha();
        $fakeDataUsaha = $this->fakeDataUsahaData();
        $updatedDataUsaha = $this->dataUsahaRepo->update($fakeDataUsaha, $dataUsaha->id);
        $this->assertModelData($fakeDataUsaha, $updatedDataUsaha->toArray());
        $dbDataUsaha = $this->dataUsahaRepo->find($dataUsaha->id);
        $this->assertModelData($fakeDataUsaha, $dbDataUsaha->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDataUsaha()
    {
        $dataUsaha = $this->makeDataUsaha();
        $resp = $this->dataUsahaRepo->delete($dataUsaha->id);
        $this->assertTrue($resp);
        $this->assertNull(DataUsaha::find($dataUsaha->id), 'DataUsaha should not exist in DB');
    }
}
