<?php

use App\Models\SatuanPenjualan;
use App\Repositories\SatuanPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SatuanPenjualanRepositoryTest extends TestCase
{
    use MakeSatuanPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SatuanPenjualanRepository
     */
    protected $satuanPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->satuanPenjualanRepo = App::make(SatuanPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSatuanPenjualan()
    {
        $satuanPenjualan = $this->fakeSatuanPenjualanData();
        $createdSatuanPenjualan = $this->satuanPenjualanRepo->create($satuanPenjualan);
        $createdSatuanPenjualan = $createdSatuanPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdSatuanPenjualan);
        $this->assertNotNull($createdSatuanPenjualan['id'], 'Created SatuanPenjualan must have id specified');
        $this->assertNotNull(SatuanPenjualan::find($createdSatuanPenjualan['id']), 'SatuanPenjualan with given id must be in DB');
        $this->assertModelData($satuanPenjualan, $createdSatuanPenjualan);
    }

    /**
     * @test read
     */
    public function testReadSatuanPenjualan()
    {
        $satuanPenjualan = $this->makeSatuanPenjualan();
        $dbSatuanPenjualan = $this->satuanPenjualanRepo->find($satuanPenjualan->id);
        $dbSatuanPenjualan = $dbSatuanPenjualan->toArray();
        $this->assertModelData($satuanPenjualan->toArray(), $dbSatuanPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateSatuanPenjualan()
    {
        $satuanPenjualan = $this->makeSatuanPenjualan();
        $fakeSatuanPenjualan = $this->fakeSatuanPenjualanData();
        $updatedSatuanPenjualan = $this->satuanPenjualanRepo->update($fakeSatuanPenjualan, $satuanPenjualan->id);
        $this->assertModelData($fakeSatuanPenjualan, $updatedSatuanPenjualan->toArray());
        $dbSatuanPenjualan = $this->satuanPenjualanRepo->find($satuanPenjualan->id);
        $this->assertModelData($fakeSatuanPenjualan, $dbSatuanPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSatuanPenjualan()
    {
        $satuanPenjualan = $this->makeSatuanPenjualan();
        $resp = $this->satuanPenjualanRepo->delete($satuanPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(SatuanPenjualan::find($satuanPenjualan->id), 'SatuanPenjualan should not exist in DB');
    }
}
