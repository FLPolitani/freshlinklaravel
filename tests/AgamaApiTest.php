<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AgamaApiTest extends TestCase
{
    use MakeAgamaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAgama()
    {
        $agama = $this->fakeAgamaData();
        $this->json('POST', '/api/v1/agamas', $agama);

        $this->assertApiResponse($agama);
    }

    /**
     * @test
     */
    public function testReadAgama()
    {
        $agama = $this->makeAgama();
        $this->json('GET', '/api/v1/agamas/'.$agama->id);

        $this->assertApiResponse($agama->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAgama()
    {
        $agama = $this->makeAgama();
        $editedAgama = $this->fakeAgamaData();

        $this->json('PUT', '/api/v1/agamas/'.$agama->id, $editedAgama);

        $this->assertApiResponse($editedAgama);
    }

    /**
     * @test
     */
    public function testDeleteAgama()
    {
        $agama = $this->makeAgama();
        $this->json('DELETE', '/api/v1/agamas/'.$agama->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/agamas/'.$agama->id);

        $this->assertResponseStatus(404);
    }
}
