<?php

use App\Models\TransPenHasJenPembayaran;
use App\Repositories\TransPenHasJenPembayaranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransPenHasJenPembayaranRepositoryTest extends TestCase
{
    use MakeTransPenHasJenPembayaranTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransPenHasJenPembayaranRepository
     */
    protected $transPenHasJenPembayaranRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transPenHasJenPembayaranRepo = App::make(TransPenHasJenPembayaranRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->fakeTransPenHasJenPembayaranData();
        $createdTransPenHasJenPembayaran = $this->transPenHasJenPembayaranRepo->create($transPenHasJenPembayaran);
        $createdTransPenHasJenPembayaran = $createdTransPenHasJenPembayaran->toArray();
        $this->assertArrayHasKey('id', $createdTransPenHasJenPembayaran);
        $this->assertNotNull($createdTransPenHasJenPembayaran['id'], 'Created TransPenHasJenPembayaran must have id specified');
        $this->assertNotNull(TransPenHasJenPembayaran::find($createdTransPenHasJenPembayaran['id']), 'TransPenHasJenPembayaran with given id must be in DB');
        $this->assertModelData($transPenHasJenPembayaran, $createdTransPenHasJenPembayaran);
    }

    /**
     * @test read
     */
    public function testReadTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->makeTransPenHasJenPembayaran();
        $dbTransPenHasJenPembayaran = $this->transPenHasJenPembayaranRepo->find($transPenHasJenPembayaran->id);
        $dbTransPenHasJenPembayaran = $dbTransPenHasJenPembayaran->toArray();
        $this->assertModelData($transPenHasJenPembayaran->toArray(), $dbTransPenHasJenPembayaran);
    }

    /**
     * @test update
     */
    public function testUpdateTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->makeTransPenHasJenPembayaran();
        $fakeTransPenHasJenPembayaran = $this->fakeTransPenHasJenPembayaranData();
        $updatedTransPenHasJenPembayaran = $this->transPenHasJenPembayaranRepo->update($fakeTransPenHasJenPembayaran, $transPenHasJenPembayaran->id);
        $this->assertModelData($fakeTransPenHasJenPembayaran, $updatedTransPenHasJenPembayaran->toArray());
        $dbTransPenHasJenPembayaran = $this->transPenHasJenPembayaranRepo->find($transPenHasJenPembayaran->id);
        $this->assertModelData($fakeTransPenHasJenPembayaran, $dbTransPenHasJenPembayaran->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->makeTransPenHasJenPembayaran();
        $resp = $this->transPenHasJenPembayaranRepo->delete($transPenHasJenPembayaran->id);
        $this->assertTrue($resp);
        $this->assertNull(TransPenHasJenPembayaran::find($transPenHasJenPembayaran->id), 'TransPenHasJenPembayaran should not exist in DB');
    }
}
