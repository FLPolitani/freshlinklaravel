<?php

use App\Models\Kategori;
use App\Repositories\KategoriRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KategoriRepositoryTest extends TestCase
{
    use MakeKategoriTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KategoriRepository
     */
    protected $kategoriRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kategoriRepo = App::make(KategoriRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKategori()
    {
        $kategori = $this->fakeKategoriData();
        $createdKategori = $this->kategoriRepo->create($kategori);
        $createdKategori = $createdKategori->toArray();
        $this->assertArrayHasKey('id', $createdKategori);
        $this->assertNotNull($createdKategori['id'], 'Created Kategori must have id specified');
        $this->assertNotNull(Kategori::find($createdKategori['id']), 'Kategori with given id must be in DB');
        $this->assertModelData($kategori, $createdKategori);
    }

    /**
     * @test read
     */
    public function testReadKategori()
    {
        $kategori = $this->makeKategori();
        $dbKategori = $this->kategoriRepo->find($kategori->id);
        $dbKategori = $dbKategori->toArray();
        $this->assertModelData($kategori->toArray(), $dbKategori);
    }

    /**
     * @test update
     */
    public function testUpdateKategori()
    {
        $kategori = $this->makeKategori();
        $fakeKategori = $this->fakeKategoriData();
        $updatedKategori = $this->kategoriRepo->update($fakeKategori, $kategori->id);
        $this->assertModelData($fakeKategori, $updatedKategori->toArray());
        $dbKategori = $this->kategoriRepo->find($kategori->id);
        $this->assertModelData($fakeKategori, $dbKategori->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKategori()
    {
        $kategori = $this->makeKategori();
        $resp = $this->kategoriRepo->delete($kategori->id);
        $this->assertTrue($resp);
        $this->assertNull(Kategori::find($kategori->id), 'Kategori should not exist in DB');
    }
}
