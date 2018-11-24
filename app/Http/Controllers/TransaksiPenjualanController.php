<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaksiPenjualanRequest;
use App\Http\Requests\UpdateTransaksiPenjualanRequest;
use App\Repositories\TransaksiPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransaksiPenjualanController extends AppBaseController
{
    /** @var  TransaksiPenjualanRepository */
    private $transaksiPenjualanRepository;

    public function __construct(TransaksiPenjualanRepository $transaksiPenjualanRepo)
    {
        $this->transaksiPenjualanRepository = $transaksiPenjualanRepo;
    }

    /**
     * Display a listing of the TransaksiPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaksiPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $transaksiPenjualans = $this->transaksiPenjualanRepository->all();

        return view('transaksi_penjualans.index')
            ->with('transaksiPenjualans', $transaksiPenjualans);
    }

    /**
     * Show the form for creating a new TransaksiPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('transaksi_penjualans.create');
    }

    /**
     * Store a newly created TransaksiPenjualan in storage.
     *
     * @param CreateTransaksiPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiPenjualanRequest $request)
    {
        $input = $request->all();

        $transaksiPenjualan = $this->transaksiPenjualanRepository->create($input);

        Flash::success('Transaksi Penjualan saved successfully.');

        return redirect(route('transaksiPenjualans.index'));
    }

    /**
     * Display the specified TransaksiPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaksiPenjualan = $this->transaksiPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualan)) {
            Flash::error('Transaksi Penjualan not found');

            return redirect(route('transaksiPenjualans.index'));
        }

        return view('transaksi_penjualans.show')->with('transaksiPenjualan', $transaksiPenjualan);
    }

    /**
     * Show the form for editing the specified TransaksiPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaksiPenjualan = $this->transaksiPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualan)) {
            Flash::error('Transaksi Penjualan not found');

            return redirect(route('transaksiPenjualans.index'));
        }

        return view('transaksi_penjualans.edit')->with('transaksiPenjualan', $transaksiPenjualan);
    }

    /**
     * Update the specified TransaksiPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateTransaksiPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiPenjualanRequest $request)
    {
        $transaksiPenjualan = $this->transaksiPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualan)) {
            Flash::error('Transaksi Penjualan not found');

            return redirect(route('transaksiPenjualans.index'));
        }

        $transaksiPenjualan = $this->transaksiPenjualanRepository->update($request->all(), $id);

        Flash::success('Transaksi Penjualan updated successfully.');

        return redirect(route('transaksiPenjualans.index'));
    }

    /**
     * Remove the specified TransaksiPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaksiPenjualan = $this->transaksiPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualan)) {
            Flash::error('Transaksi Penjualan not found');

            return redirect(route('transaksiPenjualans.index'));
        }

        $this->transaksiPenjualanRepository->delete($id);

        Flash::success('Transaksi Penjualan deleted successfully.');

        return redirect(route('transaksiPenjualans.index'));
    }
}
