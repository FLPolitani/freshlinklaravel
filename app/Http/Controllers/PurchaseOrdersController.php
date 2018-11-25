<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchaseOrdersRequest;
use App\Http\Requests\UpdatePurchaseOrdersRequest;
use App\Repositories\PurchaseOrdersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PurchaseOrdersController extends AppBaseController
{
    /** @var  PurchaseOrdersRepository */
    private $purchaseOrdersRepository;

    public function __construct(PurchaseOrdersRepository $purchaseOrdersRepo)
    {
        $this->purchaseOrdersRepository = $purchaseOrdersRepo;
    }

    /**
     * Display a listing of the PurchaseOrders.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchaseOrdersRepository->pushCriteria(new RequestCriteria($request));
        $purchaseOrders = $this->purchaseOrdersRepository->all();

        return view('purchase_orders.index')
            ->with('purchaseOrders', $purchaseOrders);
    }

    /**
     * Show the form for creating a new PurchaseOrders.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchase_orders.create');
    }

    /**
     * Store a newly created PurchaseOrders in storage.
     *
     * @param CreatePurchaseOrdersRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOrdersRequest $request)
    {
        $input = $request->all();

        $purchaseOrders = $this->purchaseOrdersRepository->create($input);

        Flash::success('Purchase Orders saved successfully.');

        return redirect(route('purchaseOrders.index'));
    }

    /**
     * Display the specified PurchaseOrders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseOrders = $this->purchaseOrdersRepository->findWithoutFail($id);

        if (empty($purchaseOrders)) {
            Flash::error('Purchase Orders not found');

            return redirect(route('purchaseOrders.index'));
        }

        return view('purchase_orders.show')->with('purchaseOrders', $purchaseOrders);
    }

    /**
     * Show the form for editing the specified PurchaseOrders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseOrders = $this->purchaseOrdersRepository->findWithoutFail($id);

        if (empty($purchaseOrders)) {
            Flash::error('Purchase Orders not found');

            return redirect(route('purchaseOrders.index'));
        }

        return view('purchase_orders.edit')->with('purchaseOrders', $purchaseOrders);
    }

    /**
     * Update the specified PurchaseOrders in storage.
     *
     * @param  int              $id
     * @param UpdatePurchaseOrdersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOrdersRequest $request)
    {
        $purchaseOrders = $this->purchaseOrdersRepository->findWithoutFail($id);

        if (empty($purchaseOrders)) {
            Flash::error('Purchase Orders not found');

            return redirect(route('purchaseOrders.index'));
        }

        $purchaseOrders = $this->purchaseOrdersRepository->update($request->all(), $id);

        Flash::success('Purchase Orders updated successfully.');

        return redirect(route('purchaseOrders.index'));
    }

    /**
     * Remove the specified PurchaseOrders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseOrders = $this->purchaseOrdersRepository->findWithoutFail($id);

        if (empty($purchaseOrders)) {
            Flash::error('Purchase Orders not found');

            return redirect(route('purchaseOrders.index'));
        }

        $this->purchaseOrdersRepository->delete($id);

        Flash::success('Purchase Orders deleted successfully.');

        return redirect(route('purchaseOrders.index'));
    }
}
