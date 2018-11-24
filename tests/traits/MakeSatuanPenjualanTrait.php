<?php

use Faker\Factory as Faker;
use App\Models\SatuanPenjualan;
use App\Repositories\SatuanPenjualanRepository;

trait MakeSatuanPenjualanTrait
{
    /**
     * Create fake instance of SatuanPenjualan and save it in database
     *
     * @param array $satuanPenjualanFields
     * @return SatuanPenjualan
     */
    public function makeSatuanPenjualan($satuanPenjualanFields = [])
    {
        /** @var SatuanPenjualanRepository $satuanPenjualanRepo */
        $satuanPenjualanRepo = App::make(SatuanPenjualanRepository::class);
        $theme = $this->fakeSatuanPenjualanData($satuanPenjualanFields);
        return $satuanPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of SatuanPenjualan
     *
     * @param array $satuanPenjualanFields
     * @return SatuanPenjualan
     */
    public function fakeSatuanPenjualan($satuanPenjualanFields = [])
    {
        return new SatuanPenjualan($this->fakeSatuanPenjualanData($satuanPenjualanFields));
    }

    /**
     * Get fake data of SatuanPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSatuanPenjualanData($satuanPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_status' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $satuanPenjualanFields);
    }
}
