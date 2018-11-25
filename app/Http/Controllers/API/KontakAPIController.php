<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKontakAPIRequest;
use App\Http\Requests\API\UpdateKontakAPIRequest;
use App\Models\Kontak;
use App\Repositories\KontakRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KontakController
 * @package App\Http\Controllers\API
 */

class KontakAPIController extends AppBaseController
{
    /** @var  KontakRepository */
    private $kontakRepository;

    public function __construct(KontakRepository $kontakRepo)
    {
        $this->kontakRepository = $kontakRepo;
    }

    /**
     * Display a listing of the Kontak.
     * GET|HEAD /kontaks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kontakRepository->pushCriteria(new RequestCriteria($request));
        $this->kontakRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kontaks = $this->kontakRepository->all();

        return $this->sendResponse($kontaks->toArray(), 'Kontaks retrieved successfully');
    }

    /**
     * Store a newly created Kontak in storage.
     * POST /kontaks
     *
     * @param CreateKontakAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKontakAPIRequest $request)
    {
        $input = $request->all();

        $kontaks = $this->kontakRepository->create($input);

        return $this->sendResponse($kontaks->toArray(), 'Kontak saved successfully');
    }

    /**
     * Display the specified Kontak.
     * GET|HEAD /kontaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kontak $kontak */
        $kontak = $this->kontakRepository->findWithoutFail($id);

        if (empty($kontak)) {
            return $this->sendError('Kontak not found');
        }

        return $this->sendResponse($kontak->toArray(), 'Kontak retrieved successfully');
    }

    /**
     * Update the specified Kontak in storage.
     * PUT/PATCH /kontaks/{id}
     *
     * @param  int $id
     * @param UpdateKontakAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKontakAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kontak $kontak */
        $kontak = $this->kontakRepository->findWithoutFail($id);

        if (empty($kontak)) {
            return $this->sendError('Kontak not found');
        }

        $kontak = $this->kontakRepository->update($input, $id);

        return $this->sendResponse($kontak->toArray(), 'Kontak updated successfully');
    }

    /**
     * Remove the specified Kontak from storage.
     * DELETE /kontaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kontak $kontak */
        $kontak = $this->kontakRepository->findWithoutFail($id);

        if (empty($kontak)) {
            return $this->sendError('Kontak not found');
        }

        $kontak->delete();

        return $this->sendResponse($id, 'Kontak deleted successfully');
    }
}
