<?php

namespace App\Repositories;

use App\Models\PurchaseOrder;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PurchaseOrderRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:52 am UTC
 *
 * @method PurchaseOrder findWithoutFail($id, $columns = ['*'])
 * @method PurchaseOrder find($id, $columns = ['*'])
 * @method PurchaseOrder first($columns = ['*'])
*/
class PurchaseOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pembeli_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PurchaseOrder::class;
    }
}
