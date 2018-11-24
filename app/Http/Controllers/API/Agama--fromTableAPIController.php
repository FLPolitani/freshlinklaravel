<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgama--fromTableAPIRequest;
use App\Http\Requests\API\UpdateAgama--fromTableAPIRequest;
use App\Models\Agama--fromTable;
use App\Repositories\Agama--fromTableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class Agama--fromTableController
 * @package App\Http\Controllers\API
 */

class Agama--fromTableAPIController extends AppBaseController
{
    /** @var  Agama--fromTableRepository */
    private $agamaFromTableRepository;

    public function __construct(Agama--fromTableRepository $agamaFromTableRepo)
    {
        $this->agamaFromTableRepository = $agamaFromTableRepo;
    }

    /**
     * Display a listing of the Agama--fromTable.
     * GET|HEAD /agamaFromTables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agamaFromTableRepository->pushCriteria(new RequestCriteria($request));
        $this->agamaFromTableRepository->pushCriteria(new LimitOffsetCriteria($request));
        $agamaFromTables = $this->agamaFromTableRepository->all();

        return $this->sendResponse($agamaFromTables->toArray(), 'Agama--From Tables retrieved successfully');
    }

    /**
     * Store a newly created Agama--fromTable in storage.
     * POST /agamaFromTables
     *
     * @param CreateAgama--fromTableAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAgama--fromTableAPIRequest $request)
    {
        $input = $request->all();

        $agamaFromTables = $this->agamaFromTableRepository->create($input);

        return $this->sendResponse($agamaFromTables->toArray(), 'Agama--From Table saved successfully');
    }

    /**
     * Display the specified Agama--fromTable.
     * GET|HEAD /agamaFromTables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Agama--fromTable $agamaFromTable */
        $agamaFromTable = $this->agamaFromTableRepository->findWithoutFail($id);

        if (empty($agamaFromTable)) {
            return $this->sendError('Agama--From Table not found');
        }

        return $this->sendResponse($agamaFromTable->toArray(), 'Agama--From Table retrieved successfully');
    }

    /**
     * Update the specified Agama--fromTable in storage.
     * PUT/PATCH /agamaFromTables/{id}
     *
     * @param  int $id
     * @param UpdateAgama--fromTableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgama--fromTableAPIRequest $request)
    {
        $input = $request->all();

        /** @var Agama--fromTable $agamaFromTable */
        $agamaFromTable = $this->agamaFromTableRepository->findWithoutFail($id);

        if (empty($agamaFromTable)) {
            return $this->sendError('Agama--From Table not found');
        }

        $agamaFromTable = $this->agamaFromTableRepository->update($input, $id);

        return $this->sendResponse($agamaFromTable->toArray(), 'Agama--fromTable updated successfully');
    }

    /**
     * Remove the specified Agama--fromTable from storage.
     * DELETE /agamaFromTables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Agama--fromTable $agamaFromTable */
        $agamaFromTable = $this->agamaFromTableRepository->findWithoutFail($id);

        if (empty($agamaFromTable)) {
            return $this->sendError('Agama--From Table not found');
        }

        $agamaFromTable->delete();

        return $this->sendResponse($id, 'Agama--From Table deleted successfully');
    }
}
