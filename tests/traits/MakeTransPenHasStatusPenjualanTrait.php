<?php

use Faker\Factory as Faker;
use App\Models\TransPenHasStatusPenjualan;
use App\Repositories\TransPenHasStatusPenjualanRepository;

trait MakeTransPenHasStatusPenjualanTrait
{
    /**
     * Create fake instance of TransPenHasStatusPenjualan and save it in database
     *
     * @param array $transPenHasStatusPenjualanFields
     * @return TransPenHasStatusPenjualan
     */
    public function makeTransPenHasStatusPenjualan($transPenHasStatusPenjualanFields = [])
    {
        /** @var TransPenHasStatusPenjualanRepository $transPenHasStatusPenjualanRepo */
        $transPenHasStatusPenjualanRepo = App::make(TransPenHasStatusPenjualanRepository::class);
        $theme = $this->fakeTransPenHasStatusPenjualanData($transPenHasStatusPenjualanFields);
        return $transPenHasStatusPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of TransPenHasStatusPenjualan
     *
     * @param array $transPenHasStatusPenjualanFields
     * @return TransPenHasStatusPenjualan
     */
    public function fakeTransPenHasStatusPenjualan($transPenHasStatusPenjualanFields = [])
    {
        return new TransPenHasStatusPenjualan($this->fakeTransPenHasStatusPenjualanData($transPenHasStatusPenjualanFields));
    }

    /**
     * Get fake data of TransPenHasStatusPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransPenHasStatusPenjualanData($transPenHasStatusPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'transaksi_penjualans_id' => $fake->randomDigitNotNull,
            'status_penjualans_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull
        ], $transPenHasStatusPenjualanFields);
    }
}
