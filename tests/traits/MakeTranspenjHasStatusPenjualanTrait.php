<?php

use Faker\Factory as Faker;
use App\Models\TranspenjHasStatusPenjualan;
use App\Repositories\TranspenjHasStatusPenjualanRepository;

trait MakeTranspenjHasStatusPenjualanTrait
{
    /**
     * Create fake instance of TranspenjHasStatusPenjualan and save it in database
     *
     * @param array $transpenjHasStatusPenjualanFields
     * @return TranspenjHasStatusPenjualan
     */
    public function makeTranspenjHasStatusPenjualan($transpenjHasStatusPenjualanFields = [])
    {
        /** @var TranspenjHasStatusPenjualanRepository $transpenjHasStatusPenjualanRepo */
        $transpenjHasStatusPenjualanRepo = App::make(TranspenjHasStatusPenjualanRepository::class);
        $theme = $this->fakeTranspenjHasStatusPenjualanData($transpenjHasStatusPenjualanFields);
        return $transpenjHasStatusPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of TranspenjHasStatusPenjualan
     *
     * @param array $transpenjHasStatusPenjualanFields
     * @return TranspenjHasStatusPenjualan
     */
    public function fakeTranspenjHasStatusPenjualan($transpenjHasStatusPenjualanFields = [])
    {
        return new TranspenjHasStatusPenjualan($this->fakeTranspenjHasStatusPenjualanData($transpenjHasStatusPenjualanFields));
    }

    /**
     * Get fake data of TranspenjHasStatusPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTranspenjHasStatusPenjualanData($transpenjHasStatusPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'transaksi_penjualans_id' => $fake->randomDigitNotNull,
            'status_penjualans_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull
        ], $transpenjHasStatusPenjualanFields);
    }
}
