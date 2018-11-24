<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Repositories\PurchaseOrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PurchaseOrderController extends AppBaseController
{
    /** @var  PurchaseOrderRepository */
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepo)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepo;
    }

    /**
     * Display a listing of the PurchaseOrder.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchaseOrderRepository->pushCriteria(new RequestCriteria($request));
        $purchaseOrders = $this->purchaseOrderRepository->all();

        return view('purchase_orders.index')
            ->with('purchaseOrders', $purchaseOrders);
    }

    /**
     * Show the form for creating a new PurchaseOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchase_orders.create');
    }

    /**
     * Store a newly created PurchaseOrder in storage.
     *
     * @param CreatePurchaseOrderRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOrderRequest $request)
    {
        $input = $request->all();

        $purchaseOrder = $this->purchaseOrderRepository->create($input);

        Flash::success('Purchase Order saved successfully.');

        return redirect(route('purchaseOrders.index'));
    }

    /**
     * Display the specified PurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->findWithoutFail($id);

        if (empty($purchaseOrder)) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrders.index'));
        }

        return view('purchase_orders.show')->with('purchaseOrder', $purchaseOrder);
    }

    /**
     * Show the form for editing the specified PurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->findWithoutFail($id);

        if (empty($purchaseOrder)) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrders.index'));
        }

        return view('purchase_orders.edit')->with('purchaseOrder', $purchaseOrder);
    }

    /**
     * Update the specified PurchaseOrder in storage.
     *
     * @param  int              $id
     * @param UpdatePurchaseOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOrderRequest $request)
    {
        $purchaseOrder = $this->purchaseOrderRepository->findWithoutFail($id);

        if (empty($purchaseOrder)) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrders.index'));
        }

        $purchaseOrder = $this->purchaseOrderRepository->update($request->all(), $id);

        Flash::success('Purchase Order updated successfully.');

        return redirect(route('purchaseOrders.index'));
    }

    /**
     * Remove the specified PurchaseOrder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->findWithoutFail($id);

        if (empty($purchaseOrder)) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrders.index'));
        }

        $this->purchaseOrderRepository->delete($id);

        Flash::success('Purchase Order deleted successfully.');

        return redirect(route('purchaseOrders.index'));
    }
}
