<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisPembayaranRequest;
use App\Http\Requests\UpdateJenisPembayaranRequest;
use App\Repositories\JenisPembayaranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JenisPembayaranController extends AppBaseController
{
    /** @var  JenisPembayaranRepository */
    private $jenisPembayaranRepository;

    public function __construct(JenisPembayaranRepository $jenisPembayaranRepo)
    {
        $this->jenisPembayaranRepository = $jenisPembayaranRepo;
    }

    /**
     * Display a listing of the JenisPembayaran.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisPembayaranRepository->pushCriteria(new RequestCriteria($request));
        $jenisPembayarans = $this->jenisPembayaranRepository->all();

        return view('jenis_pembayarans.index')
            ->with('jenisPembayarans', $jenisPembayarans);
    }

    /**
     * Show the form for creating a new JenisPembayaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_pembayarans.create');
    }

    /**
     * Store a newly created JenisPembayaran in storage.
     *
     * @param CreateJenisPembayaranRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisPembayaranRequest $request)
    {
        $input = $request->all();

        $jenisPembayaran = $this->jenisPembayaranRepository->create($input);

        Flash::success('Jenis Pembayaran saved successfully.');

        return redirect(route('jenisPembayarans.index'));
    }

    /**
     * Display the specified JenisPembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisPembayaran = $this->jenisPembayaranRepository->findWithoutFail($id);

        if (empty($jenisPembayaran)) {
            Flash::error('Jenis Pembayaran not found');

            return redirect(route('jenisPembayarans.index'));
        }

        return view('jenis_pembayarans.show')->with('jenisPembayaran', $jenisPembayaran);
    }

    /**
     * Show the form for editing the specified JenisPembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisPembayaran = $this->jenisPembayaranRepository->findWithoutFail($id);

        if (empty($jenisPembayaran)) {
            Flash::error('Jenis Pembayaran not found');

            return redirect(route('jenisPembayarans.index'));
        }

        return view('jenis_pembayarans.edit')->with('jenisPembayaran', $jenisPembayaran);
    }

    /**
     * Update the specified JenisPembayaran in storage.
     *
     * @param  int              $id
     * @param UpdateJenisPembayaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisPembayaranRequest $request)
    {
        $jenisPembayaran = $this->jenisPembayaranRepository->findWithoutFail($id);

        if (empty($jenisPembayaran)) {
            Flash::error('Jenis Pembayaran not found');

            return redirect(route('jenisPembayarans.index'));
        }

        $jenisPembayaran = $this->jenisPembayaranRepository->update($request->all(), $id);

        Flash::success('Jenis Pembayaran updated successfully.');

        return redirect(route('jenisPembayarans.index'));
    }

    /**
     * Remove the specified JenisPembayaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisPembayaran = $this->jenisPembayaranRepository->findWithoutFail($id);

        if (empty($jenisPembayaran)) {
            Flash::error('Jenis Pembayaran not found');

            return redirect(route('jenisPembayarans.index'));
        }

        $this->jenisPembayaranRepository->delete($id);

        Flash::success('Jenis Pembayaran deleted successfully.');

        return redirect(route('jenisPembayarans.index'));
    }
}
