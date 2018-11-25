<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusPenjualanRequest;
use App\Http\Requests\UpdateStatusPenjualanRequest;
use App\Repositories\StatusPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusPenjualanController extends AppBaseController
{
    /** @var  StatusPenjualanRepository */
    private $statusPenjualanRepository;

    public function __construct(StatusPenjualanRepository $statusPenjualanRepo)
    {
        $this->statusPenjualanRepository = $statusPenjualanRepo;
    }

    /**
     * Display a listing of the StatusPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $statusPenjualans = $this->statusPenjualanRepository->all();

        return view('status_penjualans.index')
            ->with('statusPenjualans', $statusPenjualans);
    }

    /**
     * Show the form for creating a new StatusPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_penjualans.create');
    }

    /**
     * Store a newly created StatusPenjualan in storage.
     *
     * @param CreateStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusPenjualanRequest $request)
    {
        $input = $request->all();

        $statusPenjualan = $this->statusPenjualanRepository->create($input);

        Flash::success('Status Penjualan saved successfully.');

        return redirect(route('statusPenjualans.index'));
    }

    /**
     * Display the specified StatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusPenjualan = $this->statusPenjualanRepository->findWithoutFail($id);

        if (empty($statusPenjualan)) {
            Flash::error('Status Penjualan not found');

            return redirect(route('statusPenjualans.index'));
        }

        return view('status_penjualans.show')->with('statusPenjualan', $statusPenjualan);
    }

    /**
     * Show the form for editing the specified StatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusPenjualan = $this->statusPenjualanRepository->findWithoutFail($id);

        if (empty($statusPenjualan)) {
            Flash::error('Status Penjualan not found');

            return redirect(route('statusPenjualans.index'));
        }

        return view('status_penjualans.edit')->with('statusPenjualan', $statusPenjualan);
    }

    /**
     * Update the specified StatusPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusPenjualanRequest $request)
    {
        $statusPenjualan = $this->statusPenjualanRepository->findWithoutFail($id);

        if (empty($statusPenjualan)) {
            Flash::error('Status Penjualan not found');

            return redirect(route('statusPenjualans.index'));
        }

        $statusPenjualan = $this->statusPenjualanRepository->update($request->all(), $id);

        Flash::success('Status Penjualan updated successfully.');

        return redirect(route('statusPenjualans.index'));
    }

    /**
     * Remove the specified StatusPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusPenjualan = $this->statusPenjualanRepository->findWithoutFail($id);

        if (empty($statusPenjualan)) {
            Flash::error('Status Penjualan not found');

            return redirect(route('statusPenjualans.index'));
        }

        $this->statusPenjualanRepository->delete($id);

        Flash::success('Status Penjualan deleted successfully.');

        return redirect(route('statusPenjualans.index'));
    }
}
