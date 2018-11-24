<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SatuanApiTest extends TestCase
{
    use MakeSatuanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSatuan()
    {
        $satuan = $this->fakeSatuanData();
        $this->json('POST', '/api/v1/satuans', $satuan);

        $this->assertApiResponse($satuan);
    }

    /**
     * @test
     */
    public function testReadSatuan()
    {
        $satuan = $this->makeSatuan();
        $this->json('GET', '/api/v1/satuans/'.$satuan->id);

        $this->assertApiResponse($satuan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSatuan()
    {
        $satuan = $this->makeSatuan();
        $editedSatuan = $this->fakeSatuanData();

        $this->json('PUT', '/api/v1/satuans/'.$satuan->id, $editedSatuan);

        $this->assertApiResponse($editedSatuan);
    }

    /**
     * @test
     */
    public function testDeleteSatuan()
    {
        $satuan = $this->makeSatuan();
        $this->json('DELETE', '/api/v1/satuans/'.$satuan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/satuans/'.$satuan->id);

        $this->assertResponseStatus(404);
    }
}
