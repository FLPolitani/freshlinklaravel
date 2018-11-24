<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetailPurchaseOrderAPIRequest;
use App\Http\Requests\API\UpdateDetailPurchaseOrderAPIRequest;
use App\Models\DetailPurchaseOrder;
use App\Repositories\DetailPurchaseOrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DetailPurchaseOrderController
 * @package App\Http\Controllers\API
 */

class DetailPurchaseOrderAPIController extends AppBaseController
{
    /** @var  DetailPurchaseOrderRepository */
    private $detailPurchaseOrderRepository;

    public function __construct(DetailPurchaseOrderRepository $detailPurchaseOrderRepo)
    {
        $this->detailPurchaseOrderRepository = $detailPurchaseOrderRepo;
    }

    /**
     * Display a listing of the DetailPurchaseOrder.
     * GET|HEAD /detailPurchaseOrders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailPurchaseOrderRepository->pushCriteria(new RequestCriteria($request));
        $this->detailPurchaseOrderRepository->pushCriteria(new LimitOffsetCriteria($request));
        $detailPurchaseOrders = $this->detailPurchaseOrderRepository->all();

        return $this->sendResponse($detailPurchaseOrders->toArray(), 'Detail Purchase Orders retrieved successfully');
    }

    /**
     * Store a newly created DetailPurchaseOrder in storage.
     * POST /detailPurchaseOrders
     *
     * @param CreateDetailPurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        $detailPurchaseOrders = $this->detailPurchaseOrderRepository->create($input);

        return $this->sendResponse($detailPurchaseOrders->toArray(), 'Detail Purchase Order saved successfully');
    }

    /**
     * Display the specified DetailPurchaseOrder.
     * GET|HEAD /detailPurchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DetailPurchaseOrder $detailPurchaseOrder */
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrder)) {
            return $this->sendError('Detail Purchase Order not found');
        }

        return $this->sendResponse($detailPurchaseOrder->toArray(), 'Detail Purchase Order retrieved successfully');
    }

    /**
     * Update the specified DetailPurchaseOrder in storage.
     * PUT/PATCH /detailPurchaseOrders/{id}
     *
     * @param  int $id
     * @param UpdateDetailPurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetailPurchaseOrder $detailPurchaseOrder */
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrder)) {
            return $this->sendError('Detail Purchase Order not found');
        }

        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->update($input, $id);

        return $this->sendResponse($detailPurchaseOrder->toArray(), 'DetailPurchaseOrder updated successfully');
    }

    /**
     * Remove the specified DetailPurchaseOrder from storage.
     * DELETE /detailPurchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DetailPurchaseOrder $detailPurchaseOrder */
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrder)) {
            return $this->sendError('Detail Purchase Order not found');
        }

        $detailPurchaseOrder->delete();

        return $this->sendResponse($id, 'Detail Purchase Order deleted successfully');
    }
}
