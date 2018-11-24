<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransPenHasJenPembayaranAPIRequest;
use App\Http\Requests\API\UpdateTransPenHasJenPembayaranAPIRequest;
use App\Models\TransPenHasJenPembayaran;
use App\Repositories\TransPenHasJenPembayaranRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransPenHasJenPembayaranController
 * @package App\Http\Controllers\API
 */

class TransPenHasJenPembayaranAPIController extends AppBaseController
{
    /** @var  TransPenHasJenPembayaranRepository */
    private $transPenHasJenPembayaranRepository;

    public function __construct(TransPenHasJenPembayaranRepository $transPenHasJenPembayaranRepo)
    {
        $this->transPenHasJenPembayaranRepository = $transPenHasJenPembayaranRepo;
    }

    /**
     * Display a listing of the TransPenHasJenPembayaran.
     * GET|HEAD /transPenHasJenPembayarans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transPenHasJenPembayaranRepository->pushCriteria(new RequestCriteria($request));
        $this->transPenHasJenPembayaranRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transPenHasJenPembayarans = $this->transPenHasJenPembayaranRepository->all();

        return $this->sendResponse($transPenHasJenPembayarans->toArray(), 'Trans Pen Has Jen Pembayarans retrieved successfully');
    }

    /**
     * Store a newly created TransPenHasJenPembayaran in storage.
     * POST /transPenHasJenPembayarans
     *
     * @param CreateTransPenHasJenPembayaranAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransPenHasJenPembayaranAPIRequest $request)
    {
        $input = $request->all();

        $transPenHasJenPembayarans = $this->transPenHasJenPembayaranRepository->create($input);

        return $this->sendResponse($transPenHasJenPembayarans->toArray(), 'Trans Pen Has Jen Pembayaran saved successfully');
    }

    /**
     * Display the specified TransPenHasJenPembayaran.
     * GET|HEAD /transPenHasJenPembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransPenHasJenPembayaran $transPenHasJenPembayaran */
        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->findWithoutFail($id);

        if (empty($transPenHasJenPembayaran)) {
            return $this->sendError('Trans Pen Has Jen Pembayaran not found');
        }

        return $this->sendResponse($transPenHasJenPembayaran->toArray(), 'Trans Pen Has Jen Pembayaran retrieved successfully');
    }

    /**
     * Update the specified TransPenHasJenPembayaran in storage.
     * PUT/PATCH /transPenHasJenPembayarans/{id}
     *
     * @param  int $id
     * @param UpdateTransPenHasJenPembayaranAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransPenHasJenPembayaranAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransPenHasJenPembayaran $transPenHasJenPembayaran */
        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->findWithoutFail($id);

        if (empty($transPenHasJenPembayaran)) {
            return $this->sendError('Trans Pen Has Jen Pembayaran not found');
        }

        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->update($input, $id);

        return $this->sendResponse($transPenHasJenPembayaran->toArray(), 'TransPenHasJenPembayaran updated successfully');
    }

    /**
     * Remove the specified TransPenHasJenPembayaran from storage.
     * DELETE /transPenHasJenPembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransPenHasJenPembayaran $transPenHasJenPembayaran */
        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->findWithoutFail($id);

        if (empty($transPenHasJenPembayaran)) {
            return $this->sendError('Trans Pen Has Jen Pembayaran not found');
        }

        $transPenHasJenPembayaran->delete();

        return $this->sendResponse($id, 'Trans Pen Has Jen Pembayaran deleted successfully');
    }
}
