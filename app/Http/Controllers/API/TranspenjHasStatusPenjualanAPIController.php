<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTranspenjHasStatusPenjualanAPIRequest;
use App\Http\Requests\API\UpdateTranspenjHasStatusPenjualanAPIRequest;
use App\Models\TranspenjHasStatusPenjualan;
use App\Repositories\TranspenjHasStatusPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TranspenjHasStatusPenjualanController
 * @package App\Http\Controllers\API
 */

class TranspenjHasStatusPenjualanAPIController extends AppBaseController
{
    /** @var  TranspenjHasStatusPenjualanRepository */
    private $transpenjHasStatusPenjualanRepository;

    public function __construct(TranspenjHasStatusPenjualanRepository $transpenjHasStatusPenjualanRepo)
    {
        $this->transpenjHasStatusPenjualanRepository = $transpenjHasStatusPenjualanRepo;
    }

    /**
     * Display a listing of the TranspenjHasStatusPenjualan.
     * GET|HEAD /transpenjHasStatusPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transpenjHasStatusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->transpenjHasStatusPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transpenjHasStatusPenjualans = $this->transpenjHasStatusPenjualanRepository->all();

        return $this->sendResponse($transpenjHasStatusPenjualans->toArray(), 'Transpenj Has Status Penjualans retrieved successfully');
    }

    /**
     * Store a newly created TranspenjHasStatusPenjualan in storage.
     * POST /transpenjHasStatusPenjualans
     *
     * @param CreateTranspenjHasStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTranspenjHasStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $transpenjHasStatusPenjualans = $this->transpenjHasStatusPenjualanRepository->create($input);

        return $this->sendResponse($transpenjHasStatusPenjualans->toArray(), 'Transpenj Has Status Penjualan saved successfully');
    }

    /**
     * Display the specified TranspenjHasStatusPenjualan.
     * GET|HEAD /transpenjHasStatusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TranspenjHasStatusPenjualan $transpenjHasStatusPenjualan */
        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transpenjHasStatusPenjualan)) {
            return $this->sendError('Transpenj Has Status Penjualan not found');
        }

        return $this->sendResponse($transpenjHasStatusPenjualan->toArray(), 'Transpenj Has Status Penjualan retrieved successfully');
    }

    /**
     * Update the specified TranspenjHasStatusPenjualan in storage.
     * PUT/PATCH /transpenjHasStatusPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateTranspenjHasStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranspenjHasStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var TranspenjHasStatusPenjualan $transpenjHasStatusPenjualan */
        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transpenjHasStatusPenjualan)) {
            return $this->sendError('Transpenj Has Status Penjualan not found');
        }

        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->update($input, $id);

        return $this->sendResponse($transpenjHasStatusPenjualan->toArray(), 'TranspenjHasStatusPenjualan updated successfully');
    }

    /**
     * Remove the specified TranspenjHasStatusPenjualan from storage.
     * DELETE /transpenjHasStatusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TranspenjHasStatusPenjualan $transpenjHasStatusPenjualan */
        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transpenjHasStatusPenjualan)) {
            return $this->sendError('Transpenj Has Status Penjualan not found');
        }

        $transpenjHasStatusPenjualan->delete();

        return $this->sendResponse($id, 'Transpenj Has Status Penjualan deleted successfully');
    }
}
