<?php

use Faker\Factory as Faker;
use App\Models\DataUsaha;
use App\Repositories\DataUsahaRepository;

trait MakeDataUsahaTrait
{
    /**
     * Create fake instance of DataUsaha and save it in database
     *
     * @param array $dataUsahaFields
     * @return DataUsaha
     */
    public function makeDataUsaha($dataUsahaFields = [])
    {
        /** @var DataUsahaRepository $dataUsahaRepo */
        $dataUsahaRepo = App::make(DataUsahaRepository::class);
        $theme = $this->fakeDataUsahaData($dataUsahaFields);
        return $dataUsahaRepo->create($theme);
    }

    /**
     * Get fake instance of DataUsaha
     *
     * @param array $dataUsahaFields
     * @return DataUsaha
     */
    public function fakeDataUsaha($dataUsahaFields = [])
    {
        return new DataUsaha($this->fakeDataUsahaData($dataUsahaFields));
    }

    /**
     * Get fake data of DataUsaha
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDataUsahaData($dataUsahaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'jenis' => $fake->word,
            'kontak' => $fake->word,
            'alamat' => $fake->word,
            'npwp_usaha' => $fake->word,
            'scan_npwp' => $fake->word,
            'nomor_siup' => $fake->word,
            'scan_siup' => $fake->word,
            'nomor_situ' => $fake->word,
            'scan_situ' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $dataUsahaFields);
    }
}
