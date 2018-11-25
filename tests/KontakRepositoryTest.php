<?php

use App\Models\Kontak;
use App\Repositories\KontakRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KontakRepositoryTest extends TestCase
{
    use MakeKontakTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KontakRepository
     */
    protected $kontakRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kontakRepo = App::make(KontakRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKontak()
    {
        $kontak = $this->fakeKontakData();
        $createdKontak = $this->kontakRepo->create($kontak);
        $createdKontak = $createdKontak->toArray();
        $this->assertArrayHasKey('id', $createdKontak);
        $this->assertNotNull($createdKontak['id'], 'Created Kontak must have id specified');
        $this->assertNotNull(Kontak::find($createdKontak['id']), 'Kontak with given id must be in DB');
        $this->assertModelData($kontak, $createdKontak);
    }

    /**
     * @test read
     */
    public function testReadKontak()
    {
        $kontak = $this->makeKontak();
        $dbKontak = $this->kontakRepo->find($kontak->id);
        $dbKontak = $dbKontak->toArray();
        $this->assertModelData($kontak->toArray(), $dbKontak);
    }

    /**
     * @test update
     */
    public function testUpdateKontak()
    {
        $kontak = $this->makeKontak();
        $fakeKontak = $this->fakeKontakData();
        $updatedKontak = $this->kontakRepo->update($fakeKontak, $kontak->id);
        $this->assertModelData($fakeKontak, $updatedKontak->toArray());
        $dbKontak = $this->kontakRepo->find($kontak->id);
        $this->assertModelData($fakeKontak, $dbKontak->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKontak()
    {
        $kontak = $this->makeKontak();
        $resp = $this->kontakRepo->delete($kontak->id);
        $this->assertTrue($resp);
        $this->assertNull(Kontak::find($kontak->id), 'Kontak should not exist in DB');
    }
}
