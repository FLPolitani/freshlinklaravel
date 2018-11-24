<?php

use Faker\Factory as Faker;
use App\Models\TransaksiPenjualan;
use App\Repositories\TransaksiPenjualanRepository;

trait MakeTransaksiPenjualanTrait
{
    /**
     * Create fake instance of TransaksiPenjualan and save it in database
     *
     * @param array $transaksiPenjualanFields
     * @return TransaksiPenjualan
     */
    public function makeTransaksiPenjualan($transaksiPenjualanFields = [])
    {
        /** @var TransaksiPenjualanRepository $transaksiPenjualanRepo */
        $transaksiPenjualanRepo = App::make(TransaksiPenjualanRepository::class);
        $theme = $this->fakeTransaksiPenjualanData($transaksiPenjualanFields);
        return $transaksiPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of TransaksiPenjualan
     *
     * @param array $transaksiPenjualanFields
     * @return TransaksiPenjualan
     */
    public function fakeTransaksiPenjualan($transaksiPenjualanFields = [])
    {
        return new TransaksiPenjualan($this->fakeTransaksiPenjualanData($transaksiPenjualanFields));
    }

    /**
     * Get fake data of TransaksiPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransaksiPenjualanData($transaksiPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'purchase_orders_id' => $fake->randomDigitNotNull
        ], $transaksiPenjualanFields);
    }
}
