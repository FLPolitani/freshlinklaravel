<?php

use App\Models\JenisPembayaran;
use App\Repositories\JenisPembayaranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisPembayaranRepositoryTest extends TestCase
{
    use MakeJenisPembayaranTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JenisPembayaranRepository
     */
    protected $jenisPembayaranRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jenisPembayaranRepo = App::make(JenisPembayaranRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJenisPembayaran()
    {
        $jenisPembayaran = $this->fakeJenisPembayaranData();
        $createdJenisPembayaran = $this->jenisPembayaranRepo->create($jenisPembayaran);
        $createdJenisPembayaran = $createdJenisPembayaran->toArray();
        $this->assertArrayHasKey('id', $createdJenisPembayaran);
        $this->assertNotNull($createdJenisPembayaran['id'], 'Created JenisPembayaran must have id specified');
        $this->assertNotNull(JenisPembayaran::find($createdJenisPembayaran['id']), 'JenisPembayaran with given id must be in DB');
        $this->assertModelData($jenisPembayaran, $createdJenisPembayaran);
    }

    /**
     * @test read
     */
    public function testReadJenisPembayaran()
    {
        $jenisPembayaran = $this->makeJenisPembayaran();
        $dbJenisPembayaran = $this->jenisPembayaranRepo->find($jenisPembayaran->id);
        $dbJenisPembayaran = $dbJenisPembayaran->toArray();
        $this->assertModelData($jenisPembayaran->toArray(), $dbJenisPembayaran);
    }

    /**
     * @test update
     */
    public function testUpdateJenisPembayaran()
    {
        $jenisPembayaran = $this->makeJenisPembayaran();
        $fakeJenisPembayaran = $this->fakeJenisPembayaranData();
        $updatedJenisPembayaran = $this->jenisPembayaranRepo->update($fakeJenisPembayaran, $jenisPembayaran->id);
        $this->assertModelData($fakeJenisPembayaran, $updatedJenisPembayaran->toArray());
        $dbJenisPembayaran = $this->jenisPembayaranRepo->find($jenisPembayaran->id);
        $this->assertModelData($fakeJenisPembayaran, $dbJenisPembayaran->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJenisPembayaran()
    {
        $jenisPembayaran = $this->makeJenisPembayaran();
        $resp = $this->jenisPembayaranRepo->delete($jenisPembayaran->id);
        $this->assertTrue($resp);
        $this->assertNull(JenisPembayaran::find($jenisPembayaran->id), 'JenisPembayaran should not exist in DB');
    }
}
