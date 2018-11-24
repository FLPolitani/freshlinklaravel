<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BiodataApiTest extends TestCase
{
    use MakeBiodataTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBiodata()
    {
        $biodata = $this->fakeBiodataData();
        $this->json('POST', '/api/v1/biodatas', $biodata);

        $this->assertApiResponse($biodata);
    }

    /**
     * @test
     */
    public function testReadBiodata()
    {
        $biodata = $this->makeBiodata();
        $this->json('GET', '/api/v1/biodatas/'.$biodata->id);

        $this->assertApiResponse($biodata->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBiodata()
    {
        $biodata = $this->makeBiodata();
        $editedBiodata = $this->fakeBiodataData();

        $this->json('PUT', '/api/v1/biodatas/'.$biodata->id, $editedBiodata);

        $this->assertApiResponse($editedBiodata);
    }

    /**
     * @test
     */
    public function testDeleteBiodata()
    {
        $biodata = $this->makeBiodata();
        $this->json('DELETE', '/api/v1/biodatas/'.$biodata->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/biodatas/'.$biodata->id);

        $this->assertResponseStatus(404);
    }
}
