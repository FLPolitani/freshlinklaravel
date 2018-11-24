<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataUsahaApiTest extends TestCase
{
    use MakeDataUsahaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDataUsaha()
    {
        $dataUsaha = $this->fakeDataUsahaData();
        $this->json('POST', '/api/v1/dataUsahas', $dataUsaha);

        $this->assertApiResponse($dataUsaha);
    }

    /**
     * @test
     */
    public function testReadDataUsaha()
    {
        $dataUsaha = $this->makeDataUsaha();
        $this->json('GET', '/api/v1/dataUsahas/'.$dataUsaha->id);

        $this->assertApiResponse($dataUsaha->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDataUsaha()
    {
        $dataUsaha = $this->makeDataUsaha();
        $editedDataUsaha = $this->fakeDataUsahaData();

        $this->json('PUT', '/api/v1/dataUsahas/'.$dataUsaha->id, $editedDataUsaha);

        $this->assertApiResponse($editedDataUsaha);
    }

    /**
     * @test
     */
    public function testDeleteDataUsaha()
    {
        $dataUsaha = $this->makeDataUsaha();
        $this->json('DELETE', '/api/v1/dataUsahas/'.$dataUsaha->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dataUsahas/'.$dataUsaha->id);

        $this->assertResponseStatus(404);
    }
}
