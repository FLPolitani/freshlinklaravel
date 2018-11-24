<?php

use App\Models\Biodata;
use App\Repositories\BiodataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BiodataRepositoryTest extends TestCase
{
    use MakeBiodataTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BiodataRepository
     */
    protected $biodataRepo;

    public function setUp()
    {
        parent::setUp();
        $this->biodataRepo = App::make(BiodataRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBiodata()
    {
        $biodata = $this->fakeBiodataData();
        $createdBiodata = $this->biodataRepo->create($biodata);
        $createdBiodata = $createdBiodata->toArray();
        $this->assertArrayHasKey('id', $createdBiodata);
        $this->assertNotNull($createdBiodata['id'], 'Created Biodata must have id specified');
        $this->assertNotNull(Biodata::find($createdBiodata['id']), 'Biodata with given id must be in DB');
        $this->assertModelData($biodata, $createdBiodata);
    }

    /**
     * @test read
     */
    public function testReadBiodata()
    {
        $biodata = $this->makeBiodata();
        $dbBiodata = $this->biodataRepo->find($biodata->id);
        $dbBiodata = $dbBiodata->toArray();
        $this->assertModelData($biodata->toArray(), $dbBiodata);
    }

    /**
     * @test update
     */
    public function testUpdateBiodata()
    {
        $biodata = $this->makeBiodata();
        $fakeBiodata = $this->fakeBiodataData();
        $updatedBiodata = $this->biodataRepo->update($fakeBiodata, $biodata->id);
        $this->assertModelData($fakeBiodata, $updatedBiodata->toArray());
        $dbBiodata = $this->biodataRepo->find($biodata->id);
        $this->assertModelData($fakeBiodata, $dbBiodata->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBiodata()
    {
        $biodata = $this->makeBiodata();
        $resp = $this->biodataRepo->delete($biodata->id);
        $this->assertTrue($resp);
        $this->assertNull(Biodata::find($biodata->id), 'Biodata should not exist in DB');
    }
}
