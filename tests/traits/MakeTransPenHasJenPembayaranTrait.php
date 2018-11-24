<?php

use Faker\Factory as Faker;
use App\Models\TransPenHasJenPembayaran;
use App\Repositories\TransPenHasJenPembayaranRepository;

trait MakeTransPenHasJenPembayaranTrait
{
    /**
     * Create fake instance of TransPenHasJenPembayaran and save it in database
     *
     * @param array $transPenHasJenPembayaranFields
     * @return TransPenHasJenPembayaran
     */
    public function makeTransPenHasJenPembayaran($transPenHasJenPembayaranFields = [])
    {
        /** @var TransPenHasJenPembayaranRepository $transPenHasJenPembayaranRepo */
        $transPenHasJenPembayaranRepo = App::make(TransPenHasJenPembayaranRepository::class);
        $theme = $this->fakeTransPenHasJenPembayaranData($transPenHasJenPembayaranFields);
        return $transPenHasJenPembayaranRepo->create($theme);
    }

    /**
     * Get fake instance of TransPenHasJenPembayaran
     *
     * @param array $transPenHasJenPembayaranFields
     * @return TransPenHasJenPembayaran
     */
    public function fakeTransPenHasJenPembayaran($transPenHasJenPembayaranFields = [])
    {
        return new TransPenHasJenPembayaran($this->fakeTransPenHasJenPembayaranData($transPenHasJenPembayaranFields));
    }

    /**
     * Get fake data of TransPenHasJenPembayaran
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransPenHasJenPembayaranData($transPenHasJenPembayaranFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'transaksi_penjualans_id' => $fake->randomDigitNotNull,
            'jenis_pembayarans_id' => $fake->randomDigitNotNull
        ], $transPenHasJenPembayaranFields);
    }
}
