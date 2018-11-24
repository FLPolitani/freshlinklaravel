<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSatuanAPIRequest;
use App\Http\Requests\API\UpdateSatuanAPIRequest;
use App\Models\Satuan;
use App\Repositories\SatuanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SatuanController
 * @package App\Http\Controllers\API
 */

class SatuanAPIController extends AppBaseController
{
    /** @var  SatuanRepository */
    private $satuanRepository;

    public function __construct(SatuanRepository $satuanRepo)
    {
        $this->satuanRepository = $satuanRepo;
    }

    /**
     * Display a listing of the Satuan.
     * GET|HEAD /satuans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->satuanRepository->pushCriteria(new RequestCriteria($request));
        $this->satuanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $satuans = $this->satuanRepository->all();

        return $this->sendResponse($satuans->toArray(), 'Satuans retrieved successfully');
    }

    /**
     * Store a newly created Satuan in storage.
     * POST /satuans
     *
     * @param CreateSatuanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSatuanAPIRequest $request)
    {
        $input = $request->all();

        $satuans = $this->satuanRepository->create($input);

        return $this->sendResponse($satuans->toArray(), 'Satuan saved successfully');
    }

    /**
     * Display the specified Satuan.
     * GET|HEAD /satuans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Satuan $satuan */
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            return $this->sendError('Satuan not found');
        }

        return $this->sendResponse($satuan->toArray(), 'Satuan retrieved successfully');
    }

    /**
     * Update the specified Satuan in storage.
     * PUT/PATCH /satuans/{id}
     *
     * @param  int $id
     * @param UpdateSatuanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSatuanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Satuan $satuan */
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            return $this->sendError('Satuan not found');
        }

        $satuan = $this->satuanRepository->update($input, $id);

        return $this->sendResponse($satuan->toArray(), 'Satuan updated successfully');
    }

    /**
     * Remove the specified Satuan from storage.
     * DELETE /satuans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Satuan $satuan */
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            return $this->sendError('Satuan not found');
        }

        $satuan->delete();

        return $this->sendResponse($id, 'Satuan deleted successfully');
    }
}
