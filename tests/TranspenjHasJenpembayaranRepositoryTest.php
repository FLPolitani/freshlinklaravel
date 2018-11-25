<?php

use App\Models\TranspenjHasJenpembayaran;
use App\Repositories\TranspenjHasJenpembayaranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TranspenjHasJenpembayaranRepositoryTest extends TestCase
{
    use MakeTranspenjHasJenpembayaranTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TranspenjHasJenpembayaranRepository
     */
    protected $transpenjHasJenpembayaranRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transpenjHasJenpembayaranRepo = App::make(TranspenjHasJenpembayaranRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->fakeTranspenjHasJenpembayaranData();
        $createdTranspenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepo->create($transpenjHasJenpembayaran);
        $createdTranspenjHasJenpembayaran = $createdTranspenjHasJenpembayaran->toArray();
        $this->assertArrayHasKey('id', $createdTranspenjHasJenpembayaran);
        $this->assertNotNull($createdTranspenjHasJenpembayaran['id'], 'Created TranspenjHasJenpembayaran must have id specified');
        $this->assertNotNull(TranspenjHasJenpembayaran::find($createdTranspenjHasJenpembayaran['id']), 'TranspenjHasJenpembayaran with given id must be in DB');
        $this->assertModelData($transpenjHasJenpembayaran, $createdTranspenjHasJenpembayaran);
    }

    /**
     * @test read
     */
    public function testReadTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->makeTranspenjHasJenpembayaran();
        $dbTranspenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepo->find($transpenjHasJenpembayaran->id);
        $dbTranspenjHasJenpembayaran = $dbTranspenjHasJenpembayaran->toArray();
        $this->assertModelData($transpenjHasJenpembayaran->toArray(), $dbTranspenjHasJenpembayaran);
    }

    /**
     * @test update
     */
    public function testUpdateTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->makeTranspenjHasJenpembayaran();
        $fakeTranspenjHasJenpembayaran = $this->fakeTranspenjHasJenpembayaranData();
        $updatedTranspenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepo->update($fakeTranspenjHasJenpembayaran, $transpenjHasJenpembayaran->id);
        $this->assertModelData($fakeTranspenjHasJenpembayaran, $updatedTranspenjHasJenpembayaran->toArray());
        $dbTranspenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepo->find($transpenjHasJenpembayaran->id);
        $this->assertModelData($fakeTranspenjHasJenpembayaran, $dbTranspenjHasJenpembayaran->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->makeTranspenjHasJenpembayaran();
        $resp = $this->transpenjHasJenpembayaranRepo->delete($transpenjHasJenpembayaran->id);
        $this->assertTrue($resp);
        $this->assertNull(TranspenjHasJenpembayaran::find($transpenjHasJenpembayaran->id), 'TranspenjHasJenpembayaran should not exist in DB');
    }
}
