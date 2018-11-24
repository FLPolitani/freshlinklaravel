<?php

use App\Models\JenisProduk;
use App\Repositories\JenisProdukRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisProdukRepositoryTest extends TestCase
{
    use MakeJenisProdukTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JenisProdukRepository
     */
    protected $jenisProdukRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jenisProdukRepo = App::make(JenisProdukRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJenisProduk()
    {
        $jenisProduk = $this->fakeJenisProdukData();
        $createdJenisProduk = $this->jenisProdukRepo->create($jenisProduk);
        $createdJenisProduk = $createdJenisProduk->toArray();
        $this->assertArrayHasKey('id', $createdJenisProduk);
        $this->assertNotNull($createdJenisProduk['id'], 'Created JenisProduk must have id specified');
        $this->assertNotNull(JenisProduk::find($createdJenisProduk['id']), 'JenisProduk with given id must be in DB');
        $this->assertModelData($jenisProduk, $createdJenisProduk);
    }

    /**
     * @test read
     */
    public function testReadJenisProduk()
    {
        $jenisProduk = $this->makeJenisProduk();
        $dbJenisProduk = $this->jenisProdukRepo->find($jenisProduk->id);
        $dbJenisProduk = $dbJenisProduk->toArray();
        $this->assertModelData($jenisProduk->toArray(), $dbJenisProduk);
    }

    /**
     * @test update
     */
    public function testUpdateJenisProduk()
    {
        $jenisProduk = $this->makeJenisProduk();
        $fakeJenisProduk = $this->fakeJenisProdukData();
        $updatedJenisProduk = $this->jenisProdukRepo->update($fakeJenisProduk, $jenisProduk->id);
        $this->assertModelData($fakeJenisProduk, $updatedJenisProduk->toArray());
        $dbJenisProduk = $this->jenisProdukRepo->find($jenisProduk->id);
        $this->assertModelData($fakeJenisProduk, $dbJenisProduk->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJenisProduk()
    {
        $jenisProduk = $this->makeJenisProduk();
        $resp = $this->jenisProdukRepo->delete($jenisProduk->id);
        $this->assertTrue($resp);
        $this->assertNull(JenisProduk::find($jenisProduk->id), 'JenisProduk should not exist in DB');
    }
}
