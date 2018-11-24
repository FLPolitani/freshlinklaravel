<?php

use App\Models\Satuan;
use App\Repositories\SatuanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SatuanRepositoryTest extends TestCase
{
    use MakeSatuanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SatuanRepository
     */
    protected $satuanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->satuanRepo = App::make(SatuanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSatuan()
    {
        $satuan = $this->fakeSatuanData();
        $createdSatuan = $this->satuanRepo->create($satuan);
        $createdSatuan = $createdSatuan->toArray();
        $this->assertArrayHasKey('id', $createdSatuan);
        $this->assertNotNull($createdSatuan['id'], 'Created Satuan must have id specified');
        $this->assertNotNull(Satuan::find($createdSatuan['id']), 'Satuan with given id must be in DB');
        $this->assertModelData($satuan, $createdSatuan);
    }

    /**
     * @test read
     */
    public function testReadSatuan()
    {
        $satuan = $this->makeSatuan();
        $dbSatuan = $this->satuanRepo->find($satuan->id);
        $dbSatuan = $dbSatuan->toArray();
        $this->assertModelData($satuan->toArray(), $dbSatuan);
    }

    /**
     * @test update
     */
    public function testUpdateSatuan()
    {
        $satuan = $this->makeSatuan();
        $fakeSatuan = $this->fakeSatuanData();
        $updatedSatuan = $this->satuanRepo->update($fakeSatuan, $satuan->id);
        $this->assertModelData($fakeSatuan, $updatedSatuan->toArray());
        $dbSatuan = $this->satuanRepo->find($satuan->id);
        $this->assertModelData($fakeSatuan, $dbSatuan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSatuan()
    {
        $satuan = $this->makeSatuan();
        $resp = $this->satuanRepo->delete($satuan->id);
        $this->assertTrue($resp);
        $this->assertNull(Satuan::find($satuan->id), 'Satuan should not exist in DB');
    }
}
