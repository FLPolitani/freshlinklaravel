<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailPurchaseOrderRequest;
use App\Http\Requests\UpdateDetailPurchaseOrderRequest;
use App\Repositories\DetailPurchaseOrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DetailPurchaseOrderController extends AppBaseController
{
    /** @var  DetailPurchaseOrderRepository */
    private $detailPurchaseOrderRepository;

    public function __construct(DetailPurchaseOrderRepository $detailPurchaseOrderRepo)
    {
        $this->detailPurchaseOrderRepository = $detailPurchaseOrderRepo;
    }

    /**
     * Display a listing of the DetailPurchaseOrder.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailPurchaseOrderRepository->pushCriteria(new RequestCriteria($request));
        $detailPurchaseOrders = $this->detailPurchaseOrderRepository->all();

        return view('detail_purchase_orders.index')
            ->with('detailPurchaseOrders', $detailPurchaseOrders);
    }

    /**
     * Show the form for creating a new DetailPurchaseOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_purchase_orders.create');
    }

    /**
     * Store a newly created DetailPurchaseOrder in storage.
     *
     * @param CreateDetailPurchaseOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPurchaseOrderRequest $request)
    {
        $input = $request->all();

        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->create($input);

        Flash::success('Detail Purchase Order saved successfully.');

        return redirect(route('detailPurchaseOrders.index'));
    }

    /**
     * Display the specified DetailPurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOrders.index'));
        }

        return view('detail_purchase_orders.show')->with('detailPurchaseOrder', $detailPurchaseOrder);
    }

    /**
     * Show the form for editing the specified DetailPurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOrders.index'));
        }

        return view('detail_purchase_orders.edit')->with('detailPurchaseOrder', $detailPurchaseOrder);
    }

    /**
     * Update the specified DetailPurchaseOrder in storage.
     *
     * @param  int              $id
     * @param UpdateDetailPurchaseOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPurchaseOrderRequest $request)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOrders.index'));
        }

        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->update($request->all(), $id);

        Flash::success('Detail Purchase Order updated successfully.');

        return redirect(route('detailPurchaseOrders.index'));
    }

    /**
     * Remove the specified DetailPurchaseOrder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOrders.index'));
        }

        $this->detailPurchaseOrderRepository->delete($id);

        Flash::success('Detail Purchase Order deleted successfully.');

        return redirect(route('detailPurchaseOrders.index'));
    }
}
