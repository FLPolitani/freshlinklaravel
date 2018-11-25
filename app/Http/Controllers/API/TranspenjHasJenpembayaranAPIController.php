<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTranspenjHasJenpembayaranAPIRequest;
use App\Http\Requests\API\UpdateTranspenjHasJenpembayaranAPIRequest;
use App\Models\TranspenjHasJenpembayaran;
use App\Repositories\TranspenjHasJenpembayaranRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TranspenjHasJenpembayaranController
 * @package App\Http\Controllers\API
 */

class TranspenjHasJenpembayaranAPIController extends AppBaseController
{
    /** @var  TranspenjHasJenpembayaranRepository */
    private $transpenjHasJenpembayaranRepository;

    public function __construct(TranspenjHasJenpembayaranRepository $transpenjHasJenpembayaranRepo)
    {
        $this->transpenjHasJenpembayaranRepository = $transpenjHasJenpembayaranRepo;
    }

    /**
     * Display a listing of the TranspenjHasJenpembayaran.
     * GET|HEAD /transpenjHasJenpembayarans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transpenjHasJenpembayaranRepository->pushCriteria(new RequestCriteria($request));
        $this->transpenjHasJenpembayaranRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transpenjHasJenpembayarans = $this->transpenjHasJenpembayaranRepository->all();

        return $this->sendResponse($transpenjHasJenpembayarans->toArray(), 'Transpenj Has Jenpembayarans retrieved successfully');
    }

    /**
     * Store a newly created TranspenjHasJenpembayaran in storage.
     * POST /transpenjHasJenpembayarans
     *
     * @param CreateTranspenjHasJenpembayaranAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTranspenjHasJenpembayaranAPIRequest $request)
    {
        $input = $request->all();

        $transpenjHasJenpembayarans = $this->transpenjHasJenpembayaranRepository->create($input);

        return $this->sendResponse($transpenjHasJenpembayarans->toArray(), 'Transpenj Has Jenpembayaran saved successfully');
    }

    /**
     * Display the specified TranspenjHasJenpembayaran.
     * GET|HEAD /transpenjHasJenpembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TranspenjHasJenpembayaran $transpenjHasJenpembayaran */
        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->findWithoutFail($id);

        if (empty($transpenjHasJenpembayaran)) {
            return $this->sendError('Transpenj Has Jenpembayaran not found');
        }

        return $this->sendResponse($transpenjHasJenpembayaran->toArray(), 'Transpenj Has Jenpembayaran retrieved successfully');
    }

    /**
     * Update the specified TranspenjHasJenpembayaran in storage.
     * PUT/PATCH /transpenjHasJenpembayarans/{id}
     *
     * @param  int $id
     * @param UpdateTranspenjHasJenpembayaranAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranspenjHasJenpembayaranAPIRequest $request)
    {
        $input = $request->all();

        /** @var TranspenjHasJenpembayaran $transpenjHasJenpembayaran */
        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->findWithoutFail($id);

        if (empty($transpenjHasJenpembayaran)) {
            return $this->sendError('Transpenj Has Jenpembayaran not found');
        }

        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->update($input, $id);

        return $this->sendResponse($transpenjHasJenpembayaran->toArray(), 'TranspenjHasJenpembayaran updated successfully');
    }

    /**
     * Remove the specified TranspenjHasJenpembayaran from storage.
     * DELETE /transpenjHasJenpembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TranspenjHasJenpembayaran $transpenjHasJenpembayaran */
        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->findWithoutFail($id);

        if (empty($transpenjHasJenpembayaran)) {
            return $this->sendError('Transpenj Has Jenpembayaran not found');
        }

        $transpenjHasJenpembayaran->delete();

        return $this->sendResponse($id, 'Transpenj Has Jenpembayaran deleted successfully');
    }
}
