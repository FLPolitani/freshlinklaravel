<?php

use Faker\Factory as Faker;
use App\Models\Biodata;
use App\Repositories\BiodataRepository;

trait MakeBiodataTrait
{
    /**
     * Create fake instance of Biodata and save it in database
     *
     * @param array $biodataFields
     * @return Biodata
     */
    public function makeBiodata($biodataFields = [])
    {
        /** @var BiodataRepository $biodataRepo */
        $biodataRepo = App::make(BiodataRepository::class);
        $theme = $this->fakeBiodataData($biodataFields);
        return $biodataRepo->create($theme);
    }

    /**
     * Get fake instance of Biodata
     *
     * @param array $biodataFields
     * @return Biodata
     */
    public function fakeBiodata($biodataFields = [])
    {
        return new Biodata($this->fakeBiodataData($biodataFields));
    }

    /**
     * Get fake data of Biodata
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBiodataData($biodataFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'users_id' => $fake->randomDigitNotNull,
            'nik' => $fake->word,
            'tanggal_lahir' => $fake->word,
            'jenis_kelamin' => $fake->word,
            'status_perkawinan' => $fake->word,
            'pendidikan_terakhir' => $fake->word,
            'agama_id' => $fake->randomDigitNotNull,
            'foto' => $fake->word,
            'kontak' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'longitude' => $fake->randomDigitNotNull,
            'latitude' => $fake->randomDigitNotNull
        ], $biodataFields);
    }
}
