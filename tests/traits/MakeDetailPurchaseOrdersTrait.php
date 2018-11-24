<?php

use Faker\Factory as Faker;
use App\Models\DetailPurchaseOrders;
use App\Repositories\DetailPurchaseOrdersRepository;

trait MakeDetailPurchaseOrdersTrait
{
    /**
     * Create fake instance of DetailPurchaseOrders and save it in database
     *
     * @param array $detailPurchaseOrdersFields
     * @return DetailPurchaseOrders
     */
    public function makeDetailPurchaseOrders($detailPurchaseOrdersFields = [])
    {
        /** @var DetailPurchaseOrdersRepository $detailPurchaseOrdersRepo */
        $detailPurchaseOrdersRepo = App::make(DetailPurchaseOrdersRepository::class);
        $theme = $this->fakeDetailPurchaseOrdersData($detailPurchaseOrdersFields);
        return $detailPurchaseOrdersRepo->create($theme);
    }

    /**
     * Get fake instance of DetailPurchaseOrders
     *
     * @param array $detailPurchaseOrdersFields
     * @return DetailPurchaseOrders
     */
    public function fakeDetailPurchaseOrders($detailPurchaseOrdersFields = [])
    {
        return new DetailPurchaseOrders($this->fakeDetailPurchaseOrdersData($detailPurchaseOrdersFields));
    }

    /**
     * Get fake data of DetailPurchaseOrders
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDetailPurchaseOrdersData($detailPurchaseOrdersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'purchase_orders_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'produk_id' => $fake->randomDigitNotNull,
            'jumlah' => $fake->randomDigitNotNull,
            'satuan_id' => $fake->randomDigitNotNull,
            'harga_jual' => $fake->randomDigitNotNull
        ], $detailPurchaseOrdersFields);
    }
}
