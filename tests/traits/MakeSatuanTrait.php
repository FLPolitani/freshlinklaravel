<?php

use Faker\Factory as Faker;
use App\Models\Satuan;
use App\Repositories\SatuanRepository;

trait MakeSatuanTrait
{
    /**
     * Create fake instance of Satuan and save it in database
     *
     * @param array $satuanFields
     * @return Satuan
     */
    public function makeSatuan($satuanFields = [])
    {
        /** @var SatuanRepository $satuanRepo */
        $satuanRepo = App::make(SatuanRepository::class);
        $theme = $this->fakeSatuanData($satuanFields);
        return $satuanRepo->create($theme);
    }

    /**
     * Get fake instance of Satuan
     *
     * @param array $satuanFields
     * @return Satuan
     */
    public function fakeSatuan($satuanFields = [])
    {
        return new Satuan($this->fakeSatuanData($satuanFields));
    }

    /**
     * Get fake data of Satuan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSatuanData($satuanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $satuanFields);
    }
}
