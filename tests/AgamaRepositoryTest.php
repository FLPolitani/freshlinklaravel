<?php

use App\Models\Agama;
use App\Repositories\AgamaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AgamaRepositoryTest extends TestCase
{
    use MakeAgamaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AgamaRepository
     */
    protected $agamaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->agamaRepo = App::make(AgamaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAgama()
    {
        $agama = $this->fakeAgamaData();
        $createdAgama = $this->agamaRepo->create($agama);
        $createdAgama = $createdAgama->toArray();
        $this->assertArrayHasKey('id', $createdAgama);
        $this->assertNotNull($createdAgama['id'], 'Created Agama must have id specified');
        $this->assertNotNull(Agama::find($createdAgama['id']), 'Agama with given id must be in DB');
        $this->assertModelData($agama, $createdAgama);
    }

    /**
     * @test read
     */
    public function testReadAgama()
    {
        $agama = $this->makeAgama();
        $dbAgama = $this->agamaRepo->find($agama->id);
        $dbAgama = $dbAgama->toArray();
        $this->assertModelData($agama->toArray(), $dbAgama);
    }

    /**
     * @test update
     */
    public function testUpdateAgama()
    {
        $agama = $this->makeAgama();
        $fakeAgama = $this->fakeAgamaData();
        $updatedAgama = $this->agamaRepo->update($fakeAgama, $agama->id);
        $this->assertModelData($fakeAgama, $updatedAgama->toArray());
        $dbAgama = $this->agamaRepo->find($agama->id);
        $this->assertModelData($fakeAgama, $dbAgama->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAgama()
    {
        $agama = $this->makeAgama();
        $resp = $this->agamaRepo->delete($agama->id);
        $this->assertTrue($resp);
        $this->assertNull(Agama::find($agama->id), 'Agama should not exist in DB');
    }
}
