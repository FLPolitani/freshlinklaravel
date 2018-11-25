<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisProdukRequest;
use App\Http\Requests\UpdateJenisProdukRequest;
use App\Repositories\JenisProdukRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JenisProdukController extends AppBaseController
{
    /** @var  JenisProdukRepository */
    private $jenisProdukRepository;

    public function __construct(JenisProdukRepository $jenisProdukRepo)
    {
        $this->jenisProdukRepository = $jenisProdukRepo;
    }

    /**
     * Display a listing of the JenisProduk.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisProdukRepository->pushCriteria(new RequestCriteria($request));
        $jenisProduks = $this->jenisProdukRepository->all();

        return view('jenis_produks.index')
            ->with('jenisProduks', $jenisProduks);
    }

    /**
     * Show the form for creating a new JenisProduk.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_produks.create');
    }

    /**
     * Store a newly created JenisProduk in storage.
     *
     * @param CreateJenisProdukRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisProdukRequest $request)
    {
        $input = $request->all();

        $jenisProduk = $this->jenisProdukRepository->create($input);

        Flash::success('Jenis Produk saved successfully.');

        return redirect(route('jenisProduks.index'));
    }

    /**
     * Display the specified JenisProduk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisProduk = $this->jenisProdukRepository->findWithoutFail($id);

        if (empty($jenisProduk)) {
            Flash::error('Jenis Produk not found');

            return redirect(route('jenisProduks.index'));
        }

        return view('jenis_produks.show')->with('jenisProduk', $jenisProduk);
    }

    /**
     * Show the form for editing the specified JenisProduk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisProduk = $this->jenisProdukRepository->findWithoutFail($id);

        if (empty($jenisProduk)) {
            Flash::error('Jenis Produk not found');

            return redirect(route('jenisProduks.index'));
        }

        return view('jenis_produks.edit')->with('jenisProduk', $jenisProduk);
    }

    /**
     * Update the specified JenisProduk in storage.
     *
     * @param  int              $id
     * @param UpdateJenisProdukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisProdukRequest $request)
    {
        $jenisProduk = $this->jenisProdukRepository->findWithoutFail($id);

        if (empty($jenisProduk)) {
            Flash::error('Jenis Produk not found');

            return redirect(route('jenisProduks.index'));
        }

        $jenisProduk = $this->jenisProdukRepository->update($request->all(), $id);

        Flash::success('Jenis Produk updated successfully.');

        return redirect(route('jenisProduks.index'));
    }

    /**
     * Remove the specified JenisProduk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisProduk = $this->jenisProdukRepository->findWithoutFail($id);

        if (empty($jenisProduk)) {
            Flash::error('Jenis Produk not found');

            return redirect(route('jenisProduks.index'));
        }

        $this->jenisProdukRepository->delete($id);

        Flash::success('Jenis Produk deleted successfully.');

        return redirect(route('jenisProduks.index'));
    }
}
