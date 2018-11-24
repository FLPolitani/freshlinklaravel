<?php

use App\Models\Kontaks;
use App\Repositories\KontaksRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KontaksRepositoryTest extends TestCase
{
    use MakeKontaksTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KontaksRepository
     */
    protected $kontaksRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kontaksRepo = App::make(KontaksRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKontaks()
    {
        $kontaks = $this->fakeKontaksData();
        $createdKontaks = $this->kontaksRepo->create($kontaks);
        $createdKontaks = $createdKontaks->toArray();
        $this->assertArrayHasKey('id', $createdKontaks);
        $this->assertNotNull($createdKontaks['id'], 'Created Kontaks must have id specified');
        $this->assertNotNull(Kontaks::find($createdKontaks['id']), 'Kontaks with given id must be in DB');
        $this->assertModelData($kontaks, $createdKontaks);
    }

    /**
     * @test read
     */
    public function testReadKontaks()
    {
        $kontaks = $this->makeKontaks();
        $dbKontaks = $this->kontaksRepo->find($kontaks->id);
        $dbKontaks = $dbKontaks->toArray();
        $this->assertModelData($kontaks->toArray(), $dbKontaks);
    }

    /**
     * @test update
     */
    public function testUpdateKontaks()
    {
        $kontaks = $this->makeKontaks();
        $fakeKontaks = $this->fakeKontaksData();
        $updatedKontaks = $this->kontaksRepo->update($fakeKontaks, $kontaks->id);
        $this->assertModelData($fakeKontaks, $updatedKontaks->toArray());
        $dbKontaks = $this->kontaksRepo->find($kontaks->id);
        $this->assertModelData($fakeKontaks, $dbKontaks->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKontaks()
    {
        $kontaks = $this->makeKontaks();
        $resp = $this->kontaksRepo->delete($kontaks->id);
        $this->assertTrue($resp);
        $this->assertNull(Kontaks::find($kontaks->id), 'Kontaks should not exist in DB');
    }
}
