<?php

use App\Models\TransPenHasStatusPenjualan;
use App\Repositories\TransPenHasStatusPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransPenHasStatusPenjualanRepositoryTest extends TestCase
{
    use MakeTransPenHasStatusPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransPenHasStatusPenjualanRepository
     */
    protected $transPenHasStatusPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transPenHasStatusPenjualanRepo = App::make(TransPenHasStatusPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->fakeTransPenHasStatusPenjualanData();
        $createdTransPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepo->create($transPenHasStatusPenjualan);
        $createdTransPenHasStatusPenjualan = $createdTransPenHasStatusPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdTransPenHasStatusPenjualan);
        $this->assertNotNull($createdTransPenHasStatusPenjualan['id'], 'Created TransPenHasStatusPenjualan must have id specified');
        $this->assertNotNull(TransPenHasStatusPenjualan::find($createdTransPenHasStatusPenjualan['id']), 'TransPenHasStatusPenjualan with given id must be in DB');
        $this->assertModelData($transPenHasStatusPenjualan, $createdTransPenHasStatusPenjualan);
    }

    /**
     * @test read
     */
    public function testReadTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->makeTransPenHasStatusPenjualan();
        $dbTransPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepo->find($transPenHasStatusPenjualan->id);
        $dbTransPenHasStatusPenjualan = $dbTransPenHasStatusPenjualan->toArray();
        $this->assertModelData($transPenHasStatusPenjualan->toArray(), $dbTransPenHasStatusPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->makeTransPenHasStatusPenjualan();
        $fakeTransPenHasStatusPenjualan = $this->fakeTransPenHasStatusPenjualanData();
        $updatedTransPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepo->update($fakeTransPenHasStatusPenjualan, $transPenHasStatusPenjualan->id);
        $this->assertModelData($fakeTransPenHasStatusPenjualan, $updatedTransPenHasStatusPenjualan->toArray());
        $dbTransPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepo->find($transPenHasStatusPenjualan->id);
        $this->assertModelData($fakeTransPenHasStatusPenjualan, $dbTransPenHasStatusPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->makeTransPenHasStatusPenjualan();
        $resp = $this->transPenHasStatusPenjualanRepo->delete($transPenHasStatusPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(TransPenHasStatusPenjualan::find($transPenHasStatusPenjualan->id), 'TransPenHasStatusPenjualan should not exist in DB');
    }
}
