<?php

use Faker\Factory as Faker;
use App\Models\DetailPurchaseOrder;
use App\Repositories\DetailPurchaseOrderRepository;

trait MakeDetailPurchaseOrderTrait
{
    /**
     * Create fake instance of DetailPurchaseOrder and save it in database
     *
     * @param array $detailPurchaseOrderFields
     * @return DetailPurchaseOrder
     */
    public function makeDetailPurchaseOrder($detailPurchaseOrderFields = [])
    {
        /** @var DetailPurchaseOrderRepository $detailPurchaseOrderRepo */
        $detailPurchaseOrderRepo = App::make(DetailPurchaseOrderRepository::class);
        $theme = $this->fakeDetailPurchaseOrderData($detailPurchaseOrderFields);
        return $detailPurchaseOrderRepo->create($theme);
    }

    /**
     * Get fake instance of DetailPurchaseOrder
     *
     * @param array $detailPurchaseOrderFields
     * @return DetailPurchaseOrder
     */
    public function fakeDetailPurchaseOrder($detailPurchaseOrderFields = [])
    {
        return new DetailPurchaseOrder($this->fakeDetailPurchaseOrderData($detailPurchaseOrderFields));
    }

    /**
     * Get fake data of DetailPurchaseOrder
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDetailPurchaseOrderData($detailPurchaseOrderFields = [])
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
        ], $detailPurchaseOrderFields);
    }
}
