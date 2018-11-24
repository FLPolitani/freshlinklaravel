<?php

use App\Models\TransaksiPenjualan;
use App\Repositories\TransaksiPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiPenjualanRepositoryTest extends TestCase
{
    use MakeTransaksiPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransaksiPenjualanRepository
     */
    protected $transaksiPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transaksiPenjualanRepo = App::make(TransaksiPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->fakeTransaksiPenjualanData();
        $createdTransaksiPenjualan = $this->transaksiPenjualanRepo->create($transaksiPenjualan);
        $createdTransaksiPenjualan = $createdTransaksiPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdTransaksiPenjualan);
        $this->assertNotNull($createdTransaksiPenjualan['id'], 'Created TransaksiPenjualan must have id specified');
        $this->assertNotNull(TransaksiPenjualan::find($createdTransaksiPenjualan['id']), 'TransaksiPenjualan with given id must be in DB');
        $this->assertModelData($transaksiPenjualan, $createdTransaksiPenjualan);
    }

    /**
     * @test read
     */
    public function testReadTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->makeTransaksiPenjualan();
        $dbTransaksiPenjualan = $this->transaksiPenjualanRepo->find($transaksiPenjualan->id);
        $dbTransaksiPenjualan = $dbTransaksiPenjualan->toArray();
        $this->assertModelData($transaksiPenjualan->toArray(), $dbTransaksiPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->makeTransaksiPenjualan();
        $fakeTransaksiPenjualan = $this->fakeTransaksiPenjualanData();
        $updatedTransaksiPenjualan = $this->transaksiPenjualanRepo->update($fakeTransaksiPenjualan, $transaksiPenjualan->id);
        $this->assertModelData($fakeTransaksiPenjualan, $updatedTransaksiPenjualan->toArray());
        $dbTransaksiPenjualan = $this->transaksiPenjualanRepo->find($transaksiPenjualan->id);
        $this->assertModelData($fakeTransaksiPenjualan, $dbTransaksiPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->makeTransaksiPenjualan();
        $resp = $this->transaksiPenjualanRepo->delete($transaksiPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(TransaksiPenjualan::find($transaksiPenjualan->id), 'TransaksiPenjualan should not exist in DB');
    }
}
