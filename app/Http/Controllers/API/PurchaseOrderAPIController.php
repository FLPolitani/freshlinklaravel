<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePurchaseOrderAPIRequest;
use App\Http\Requests\API\UpdatePurchaseOrderAPIRequest;
use App\Models\PurchaseOrder;
use App\Repositories\PurchaseOrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PurchaseOrderController
 * @package App\Http\Controllers\API
 */

class PurchaseOrderAPIController extends AppBaseController
{
    /** @var  PurchaseOrderRepository */
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepo)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepo;
    }

    /**
     * Display a listing of the PurchaseOrder.
     * GET|HEAD /purchaseOrders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchaseOrderRepository->pushCriteria(new RequestCriteria($request));
        $this->purchaseOrderRepository->pushCriteria(new LimitOffsetCriteria($request));
        $purchaseOrders = $this->purchaseOrderRepository->all();

        return $this->sendResponse($purchaseOrders->toArray(), 'Purchase Orders retrieved successfully');
    }

    /**
     * Store a newly created PurchaseOrder in storage.
     * POST /purchaseOrders
     *
     * @param CreatePurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        $purchaseOrders = $this->purchaseOrderRepository->create($input);

        return $this->sendResponse($purchaseOrders->toArray(), 'Purchase Order saved successfully');
    }

    /**
     * Display the specified PurchaseOrder.
     * GET|HEAD /purchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PurchaseOrder $purchaseOrder */
        $purchaseOrder = $this->purchaseOrderRepository->findWithoutFail($id);

        if (empty($purchaseOrder)) {
            return $this->sendError('Purchase Order not found');
        }

        return $this->sendResponse($purchaseOrder->toArray(), 'Purchase Order retrieved successfully');
    }

    /**
     * Update the specified PurchaseOrder in storage.
     * PUT/PATCH /purchaseOrders/{id}
     *
     * @param  int $id
     * @param UpdatePurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var PurchaseOrder $purchaseOrder */
        $purchaseOrder = $this->purchaseOrderRepository->findWithoutFail($id);

        if (empty($purchaseOrder)) {
            return $this->sendError('Purchase Order not found');
        }

        $purchaseOrder = $this->purchaseOrderRepository->update($input, $id);

        return $this->sendResponse($purchaseOrder->toArray(), 'PurchaseOrder updated successfully');
    }

    /**
     * Remove the specified PurchaseOrder from storage.
     * DELETE /purchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PurchaseOrder $purchaseOrder */
        $purchaseOrder = $this->purchaseOrderRepository->findWithoutFail($id);

        if (empty($purchaseOrder)) {
            return $this->sendError('Purchase Order not found');
        }

        $purchaseOrder->delete();

        return $this->sendResponse($id, 'Purchase Order deleted successfully');
    }
}
