<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSatuanPenjualanRequest;
use App\Http\Requests\UpdateSatuanPenjualanRequest;
use App\Repositories\SatuanPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SatuanPenjualanController extends AppBaseController
{
    /** @var  SatuanPenjualanRepository */
    private $satuanPenjualanRepository;

    public function __construct(SatuanPenjualanRepository $satuanPenjualanRepo)
    {
        $this->satuanPenjualanRepository = $satuanPenjualanRepo;
    }

    /**
     * Display a listing of the SatuanPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->satuanPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $satuanPenjualans = $this->satuanPenjualanRepository->all();

        return view('satuan_penjualans.index')
            ->with('satuanPenjualans', $satuanPenjualans);
    }

    /**
     * Show the form for creating a new SatuanPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('satuan_penjualans.create');
    }

    /**
     * Store a newly created SatuanPenjualan in storage.
     *
     * @param CreateSatuanPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateSatuanPenjualanRequest $request)
    {
        $input = $request->all();

        $satuanPenjualan = $this->satuanPenjualanRepository->create($input);

        Flash::success('Satuan Penjualan saved successfully.');

        return redirect(route('satuanPenjualans.index'));
    }

    /**
     * Display the specified SatuanPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $satuanPenjualan = $this->satuanPenjualanRepository->findWithoutFail($id);

        if (empty($satuanPenjualan)) {
            Flash::error('Satuan Penjualan not found');

            return redirect(route('satuanPenjualans.index'));
        }

        return view('satuan_penjualans.show')->with('satuanPenjualan', $satuanPenjualan);
    }

    /**
     * Show the form for editing the specified SatuanPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $satuanPenjualan = $this->satuanPenjualanRepository->findWithoutFail($id);

        if (empty($satuanPenjualan)) {
            Flash::error('Satuan Penjualan not found');

            return redirect(route('satuanPenjualans.index'));
        }

        return view('satuan_penjualans.edit')->with('satuanPenjualan', $satuanPenjualan);
    }

    /**
     * Update the specified SatuanPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateSatuanPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSatuanPenjualanRequest $request)
    {
        $satuanPenjualan = $this->satuanPenjualanRepository->findWithoutFail($id);

        if (empty($satuanPenjualan)) {
            Flash::error('Satuan Penjualan not found');

            return redirect(route('satuanPenjualans.index'));
        }

        $satuanPenjualan = $this->satuanPenjualanRepository->update($request->all(), $id);

        Flash::success('Satuan Penjualan updated successfully.');

        return redirect(route('satuanPenjualans.index'));
    }

    /**
     * Remove the specified SatuanPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $satuanPenjualan = $this->satuanPenjualanRepository->findWithoutFail($id);

        if (empty($satuanPenjualan)) {
            Flash::error('Satuan Penjualan not found');

            return redirect(route('satuanPenjualans.index'));
        }

        $this->satuanPenjualanRepository->delete($id);

        Flash::success('Satuan Penjualan deleted successfully.');

        return redirect(route('satuanPenjualans.index'));
    }
}
