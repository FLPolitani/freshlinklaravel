<?php

namespace App\Repositories;

use App\Models\DetailPurchaseOrder;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailPurchaseOrderRepository
 * @package App\Repositories
 * @version April 4, 2018, 7:54 am UTC
 *
 * @method DetailPurchaseOrder findWithoutFail($id, $columns = ['*'])
 * @method DetailPurchaseOrder find($id, $columns = ['*'])
 * @method DetailPurchaseOrder first($columns = ['*'])
*/
class DetailPurchaseOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'purchase_orders_id',
        'produk_id',
        'jumlah',
        'satuan_id',
        'harga_jual'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailPurchaseOrder::class;
    }
}
