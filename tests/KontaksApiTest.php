<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KontaksApiTest extends TestCase
{
    use MakeKontaksTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKontaks()
    {
        $kontaks = $this->fakeKontaksData();
        $this->json('POST', '/api/v1/kontaks', $kontaks);

        $this->assertApiResponse($kontaks);
    }

    /**
     * @test
     */
    public function testReadKontaks()
    {
        $kontaks = $this->makeKontaks();
        $this->json('GET', '/api/v1/kontaks/'.$kontaks->id);

        $this->assertApiResponse($kontaks->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKontaks()
    {
        $kontaks = $this->makeKontaks();
        $editedKontaks = $this->fakeKontaksData();

        $this->json('PUT', '/api/v1/kontaks/'.$kontaks->id, $editedKontaks);

        $this->assertApiResponse($editedKontaks);
    }

    /**
     * @test
     */
    public function testDeleteKontaks()
    {
        $kontaks = $this->makeKontaks();
        $this->json('DELETE', '/api/v1/kontaks/'.$kontaks->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kontaks/'.$kontaks->id);

        $this->assertResponseStatus(404);
    }
}
