<?php

use Faker\Factory as Faker;
use App\Models\DetailPenjualan;
use App\Repositories\DetailPenjualanRepository;

trait MakeDetailPenjualanTrait
{
    /**
     * Create fake instance of DetailPenjualan and save it in database
     *
     * @param array $detailPenjualanFields
     * @return DetailPenjualan
     */
    public function makeDetailPenjualan($detailPenjualanFields = [])
    {
        /** @var DetailPenjualanRepository $detailPenjualanRepo */
        $detailPenjualanRepo = App::make(DetailPenjualanRepository::class);
        $theme = $this->fakeDetailPenjualanData($detailPenjualanFields);
        return $detailPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of DetailPenjualan
     *
     * @param array $detailPenjualanFields
     * @return DetailPenjualan
     */
    public function fakeDetailPenjualan($detailPenjualanFields = [])
    {
        return new DetailPenjualan($this->fakeDetailPenjualanData($detailPenjualanFields));
    }

    /**
     * Get fake data of DetailPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDetailPenjualanData($detailPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'produk_id' => $fake->randomDigitNotNull,
            'jumlah' => $fake->randomDigitNotNull,
            'satuan_id' => $fake->randomDigitNotNull,
            'transaksi_penjualans_id' => $fake->randomDigitNotNull,
            'harga_petani' => $fake->randomDigitNotNull,
            'harga_jual' => $fake->randomDigitNotNull,
            'petani_id' => $fake->randomDigitNotNull
        ], $detailPenjualanFields);
    }
}
