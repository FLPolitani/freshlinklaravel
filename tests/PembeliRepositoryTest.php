<?php

use App\Models\Pembeli;
use App\Repositories\PembeliRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PembeliRepositoryTest extends TestCase
{
    use MakePembeliTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PembeliRepository
     */
    protected $pembeliRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pembeliRepo = App::make(PembeliRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePembeli()
    {
        $pembeli = $this->fakePembeliData();
        $createdPembeli = $this->pembeliRepo->create($pembeli);
        $createdPembeli = $createdPembeli->toArray();
        $this->assertArrayHasKey('id', $createdPembeli);
        $this->assertNotNull($createdPembeli['id'], 'Created Pembeli must have id specified');
        $this->assertNotNull(Pembeli::find($createdPembeli['id']), 'Pembeli with given id must be in DB');
        $this->assertModelData($pembeli, $createdPembeli);
    }

    /**
     * @test read
     */
    public function testReadPembeli()
    {
        $pembeli = $this->makePembeli();
        $dbPembeli = $this->pembeliRepo->find($pembeli->id);
        $dbPembeli = $dbPembeli->toArray();
        $this->assertModelData($pembeli->toArray(), $dbPembeli);
    }

    /**
     * @test update
     */
    public function testUpdatePembeli()
    {
        $pembeli = $this->makePembeli();
        $fakePembeli = $this->fakePembeliData();
        $updatedPembeli = $this->pembeliRepo->update($fakePembeli, $pembeli->id);
        $this->assertModelData($fakePembeli, $updatedPembeli->toArray());
        $dbPembeli = $this->pembeliRepo->find($pembeli->id);
        $this->assertModelData($fakePembeli, $dbPembeli->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePembeli()
    {
        $pembeli = $this->makePembeli();
        $resp = $this->pembeliRepo->delete($pembeli->id);
        $this->assertTrue($resp);
        $this->assertNull(Pembeli::find($pembeli->id), 'Pembeli should not exist in DB');
    }
}
