<?php

use Faker\Factory as Faker;
use App\Models\TranspenjHasJenpembayaran;
use App\Repositories\TranspenjHasJenpembayaranRepository;

trait MakeTranspenjHasJenpembayaranTrait
{
    /**
     * Create fake instance of TranspenjHasJenpembayaran and save it in database
     *
     * @param array $transpenjHasJenpembayaranFields
     * @return TranspenjHasJenpembayaran
     */
    public function makeTranspenjHasJenpembayaran($transpenjHasJenpembayaranFields = [])
    {
        /** @var TranspenjHasJenpembayaranRepository $transpenjHasJenpembayaranRepo */
        $transpenjHasJenpembayaranRepo = App::make(TranspenjHasJenpembayaranRepository::class);
        $theme = $this->fakeTranspenjHasJenpembayaranData($transpenjHasJenpembayaranFields);
        return $transpenjHasJenpembayaranRepo->create($theme);
    }

    /**
     * Get fake instance of TranspenjHasJenpembayaran
     *
     * @param array $transpenjHasJenpembayaranFields
     * @return TranspenjHasJenpembayaran
     */
    public function fakeTranspenjHasJenpembayaran($transpenjHasJenpembayaranFields = [])
    {
        return new TranspenjHasJenpembayaran($this->fakeTranspenjHasJenpembayaranData($transpenjHasJenpembayaranFields));
    }

    /**
     * Get fake data of TranspenjHasJenpembayaran
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTranspenjHasJenpembayaranData($transpenjHasJenpembayaranFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'transaksi_penjualans_id' => $fake->randomDigitNotNull,
            'jenis_pembayarans_id' => $fake->randomDigitNotNull
        ], $transpenjHasJenpembayaranFields);
    }
}
