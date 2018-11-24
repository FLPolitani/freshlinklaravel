<?php

use App\Models\DetailPenjualan;
use App\Repositories\DetailPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailPenjualanRepositoryTest extends TestCase
{
    use MakeDetailPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetailPenjualanRepository
     */
    protected $detailPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->detailPenjualanRepo = App::make(DetailPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDetailPenjualan()
    {
        $detailPenjualan = $this->fakeDetailPenjualanData();
        $createdDetailPenjualan = $this->detailPenjualanRepo->create($detailPenjualan);
        $createdDetailPenjualan = $createdDetailPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdDetailPenjualan);
        $this->assertNotNull($createdDetailPenjualan['id'], 'Created DetailPenjualan must have id specified');
        $this->assertNotNull(DetailPenjualan::find($createdDetailPenjualan['id']), 'DetailPenjualan with given id must be in DB');
        $this->assertModelData($detailPenjualan, $createdDetailPenjualan);
    }

    /**
     * @test read
     */
    public function testReadDetailPenjualan()
    {
        $detailPenjualan = $this->makeDetailPenjualan();
        $dbDetailPenjualan = $this->detailPenjualanRepo->find($detailPenjualan->id);
        $dbDetailPenjualan = $dbDetailPenjualan->toArray();
        $this->assertModelData($detailPenjualan->toArray(), $dbDetailPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateDetailPenjualan()
    {
        $detailPenjualan = $this->makeDetailPenjualan();
        $fakeDetailPenjualan = $this->fakeDetailPenjualanData();
        $updatedDetailPenjualan = $this->detailPenjualanRepo->update($fakeDetailPenjualan, $detailPenjualan->id);
        $this->assertModelData($fakeDetailPenjualan, $updatedDetailPenjualan->toArray());
        $dbDetailPenjualan = $this->detailPenjualanRepo->find($detailPenjualan->id);
        $this->assertModelData($fakeDetailPenjualan, $dbDetailPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDetailPenjualan()
    {
        $detailPenjualan = $this->makeDetailPenjualan();
        $resp = $this->detailPenjualanRepo->delete($detailPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(DetailPenjualan::find($detailPenjualan->id), 'DetailPenjualan should not exist in DB');
    }
}
