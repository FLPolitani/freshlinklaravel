<?php

use App\Models\TranspenjHasStatusPenjualan;
use App\Repositories\TranspenjHasStatusPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TranspenjHasStatusPenjualanRepositoryTest extends TestCase
{
    use MakeTranspenjHasStatusPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TranspenjHasStatusPenjualanRepository
     */
    protected $transpenjHasStatusPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transpenjHasStatusPenjualanRepo = App::make(TranspenjHasStatusPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->fakeTranspenjHasStatusPenjualanData();
        $createdTranspenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepo->create($transpenjHasStatusPenjualan);
        $createdTranspenjHasStatusPenjualan = $createdTranspenjHasStatusPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdTranspenjHasStatusPenjualan);
        $this->assertNotNull($createdTranspenjHasStatusPenjualan['id'], 'Created TranspenjHasStatusPenjualan must have id specified');
        $this->assertNotNull(TranspenjHasStatusPenjualan::find($createdTranspenjHasStatusPenjualan['id']), 'TranspenjHasStatusPenjualan with given id must be in DB');
        $this->assertModelData($transpenjHasStatusPenjualan, $createdTranspenjHasStatusPenjualan);
    }

    /**
     * @test read
     */
    public function testReadTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->makeTranspenjHasStatusPenjualan();
        $dbTranspenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepo->find($transpenjHasStatusPenjualan->id);
        $dbTranspenjHasStatusPenjualan = $dbTranspenjHasStatusPenjualan->toArray();
        $this->assertModelData($transpenjHasStatusPenjualan->toArray(), $dbTranspenjHasStatusPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->makeTranspenjHasStatusPenjualan();
        $fakeTranspenjHasStatusPenjualan = $this->fakeTranspenjHasStatusPenjualanData();
        $updatedTranspenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepo->update($fakeTranspenjHasStatusPenjualan, $transpenjHasStatusPenjualan->id);
        $this->assertModelData($fakeTranspenjHasStatusPenjualan, $updatedTranspenjHasStatusPenjualan->toArray());
        $dbTranspenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepo->find($transpenjHasStatusPenjualan->id);
        $this->assertModelData($fakeTranspenjHasStatusPenjualan, $dbTranspenjHasStatusPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->makeTranspenjHasStatusPenjualan();
        $resp = $this->transpenjHasStatusPenjualanRepo->delete($transpenjHasStatusPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(TranspenjHasStatusPenjualan::find($transpenjHasStatusPenjualan->id), 'TranspenjHasStatusPenjualan should not exist in DB');
    }
}
