<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDataUsahaAPIRequest;
use App\Http\Requests\API\UpdateDataUsahaAPIRequest;
use App\Models\DataUsaha;
use App\Repositories\DataUsahaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DataUsahaController
 * @package App\Http\Controllers\API
 */

class DataUsahaAPIController extends AppBaseController
{
    /** @var  DataUsahaRepository */
    private $dataUsahaRepository;

    public function __construct(DataUsahaRepository $dataUsahaRepo)
    {
        $this->dataUsahaRepository = $dataUsahaRepo;
    }

    /**
     * Display a listing of the DataUsaha.
     * GET|HEAD /dataUsahas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataUsahaRepository->pushCriteria(new RequestCriteria($request));
        $this->dataUsahaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataUsahas = $this->dataUsahaRepository->all();

        return $this->sendResponse($dataUsahas->toArray(), 'Data Usahas retrieved successfully');
    }

    /**
     * Store a newly created DataUsaha in storage.
     * POST /dataUsahas
     *
     * @param CreateDataUsahaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDataUsahaAPIRequest $request)
    {
        $input = $request->all();

        $dataUsahas = $this->dataUsahaRepository->create($input);

        return $this->sendResponse($dataUsahas->toArray(), 'Data Usaha saved successfully');
    }

    /**
     * Display the specified DataUsaha.
     * GET|HEAD /dataUsahas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataUsaha $dataUsaha */
        $dataUsaha = $this->dataUsahaRepository->findWithoutFail($id);

        if (empty($dataUsaha)) {
            return $this->sendError('Data Usaha not found');
        }

        return $this->sendResponse($dataUsaha->toArray(), 'Data Usaha retrieved successfully');
    }

    /**
     * Update the specified DataUsaha in storage.
     * PUT/PATCH /dataUsahas/{id}
     *
     * @param  int $id
     * @param UpdateDataUsahaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataUsahaAPIRequest $request)
    {
        $input = $request->all();

        /** @var DataUsaha $dataUsaha */
        $dataUsaha = $this->dataUsahaRepository->findWithoutFail($id);

        if (empty($dataUsaha)) {
            return $this->sendError('Data Usaha not found');
        }

        $dataUsaha = $this->dataUsahaRepository->update($input, $id);

        return $this->sendResponse($dataUsaha->toArray(), 'DataUsaha updated successfully');
    }

    /**
     * Remove the specified DataUsaha from storage.
     * DELETE /dataUsahas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataUsaha $dataUsaha */
        $dataUsaha = $this->dataUsahaRepository->findWithoutFail($id);

        if (empty($dataUsaha)) {
            return $this->sendError('Data Usaha not found');
        }

        $dataUsaha->delete();

        return $this->sendResponse($id, 'Data Usaha deleted successfully');
    }
}
