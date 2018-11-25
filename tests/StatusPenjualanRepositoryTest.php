<?php

use App\Models\StatusPenjualan;
use App\Repositories\StatusPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusPenjualanRepositoryTest extends TestCase
{
    use MakeStatusPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatusPenjualanRepository
     */
    protected $statusPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statusPenjualanRepo = App::make(StatusPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStatusPenjualan()
    {
        $statusPenjualan = $this->fakeStatusPenjualanData();
        $createdStatusPenjualan = $this->statusPenjualanRepo->create($statusPenjualan);
        $createdStatusPenjualan = $createdStatusPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdStatusPenjualan);
        $this->assertNotNull($createdStatusPenjualan['id'], 'Created StatusPenjualan must have id specified');
        $this->assertNotNull(StatusPenjualan::find($createdStatusPenjualan['id']), 'StatusPenjualan with given id must be in DB');
        $this->assertModelData($statusPenjualan, $createdStatusPenjualan);
    }

    /**
     * @test read
     */
    public function testReadStatusPenjualan()
    {
        $statusPenjualan = $this->makeStatusPenjualan();
        $dbStatusPenjualan = $this->statusPenjualanRepo->find($statusPenjualan->id);
        $dbStatusPenjualan = $dbStatusPenjualan->toArray();
        $this->assertModelData($statusPenjualan->toArray(), $dbStatusPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateStatusPenjualan()
    {
        $statusPenjualan = $this->makeStatusPenjualan();
        $fakeStatusPenjualan = $this->fakeStatusPenjualanData();
        $updatedStatusPenjualan = $this->statusPenjualanRepo->update($fakeStatusPenjualan, $statusPenjualan->id);
        $this->assertModelData($fakeStatusPenjualan, $updatedStatusPenjualan->toArray());
        $dbStatusPenjualan = $this->statusPenjualanRepo->find($statusPenjualan->id);
        $this->assertModelData($fakeStatusPenjualan, $dbStatusPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStatusPenjualan()
    {
        $statusPenjualan = $this->makeStatusPenjualan();
        $resp = $this->statusPenjualanRepo->delete($statusPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(StatusPenjualan::find($statusPenjualan->id), 'StatusPenjualan should not exist in DB');
    }
}
