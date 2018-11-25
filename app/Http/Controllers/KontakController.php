<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKontakRequest;
use App\Http\Requests\UpdateKontakRequest;
use App\Models\Biodata;
use App\Repositories\KontakRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KontakController extends AppBaseController
{
    /** @var  KontakRepository */
    private $kontakRepository;

    public function __construct(KontakRepository $kontakRepo)
    {
        $this->kontakRepository = $kontakRepo;
    }

    /**
     * Display a listing of the Kontak.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kontakRepository->pushCriteria(new RequestCriteria($request));
        $kontaks = $this->kontakRepository->all();

        return view('kontaks.index')
            ->with('kontaks', $kontaks);
    }

    /**
     * Show the form for creating a new Kontak.
     *
     * @return Response
     */
    public function create()
    {
        return view('kontaks.create');
    }

    /**
     * Store a newly created Kontak in storage.
     *
     * @param CreateKontakRequest $request
     *
     * @return Response
     */
    public function store(CreateKontakRequest $request)
    {
        $input = $request->all();
        $biodata = Biodata::pluck('nik','biodata_id');

        $kontak = $this->kontakRepository->create($input);

        Flash::success('Kontak saved successfully.');

        return redirect(route('kontaks.index'),compact('biodata'));
    }

    /**
     * Display the specified Kontak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kontak = $this->kontakRepository->findWithoutFail($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        return view('kontaks.show')->with('kontak', $kontak);
    }

    /**
     * Show the form for editing the specified Kontak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kontak = $this->kontakRepository->findWithoutFail($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        return view('kontaks.edit')->with('kontak', $kontak);
    }

    /**
     * Update the specified Kontak in storage.
     *
     * @param  int              $id
     * @param UpdateKontakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKontakRequest $request)
    {
        $kontak = $this->kontakRepository->findWithoutFail($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        $kontak = $this->kontakRepository->update($request->all(), $id);

        Flash::success('Kontak updated successfully.');

        return redirect(route('kontaks.index'));
    }

    /**
     * Remove the specified Kontak from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kontak = $this->kontakRepository->findWithoutFail($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        $this->kontakRepository->delete($id);

        Flash::success('Kontak deleted successfully.');

        return redirect(route('kontaks.index'));
    }
}
